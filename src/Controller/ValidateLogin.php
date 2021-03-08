<?php

namespace Werner\MVC\Controller;

use Werner\MVC\Infra\EntityManagerCreator;
use Werner\MVC\Model\Entity\User;

class ValidateLogin extends ControllerViews implements InterfaceRequestController
{
    private $userRepository;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->userRepository = $entityManager->getRepository(User::class);
    }

    public function requestProcess(): void
    {
        $email = filter_input(
            INPUT_POST,
            'email',
            FILTER_VALIDATE_EMAIL
        );
        $password = filter_input(
            INPUT_POST,
            'password',
            FILTER_SANITIZE_STRING
        );

        if (is_null($email) || $email === false) {
            echo $this->renderView('login/loginForm.php', [
                'title' => 'Login',
                'isVisible' => true,
                'message' => 'E-mail inválido!',
            ]);

            return;
        }

        /** @var User $user */
        $user = $this->userRepository->findOneBy(['email' => $email]);

        if (is_null($user) || !$user->passwordMatch($password)) {
            echo $this->renderView('login/loginForm.php', [
                'title' => 'Login',
                'isVisible' => true,
                'message' => 'E-mail inexistente ou senha incorreta!',
            ]);

            return;
        }

        $_SESSION['logged_user'] = true;
        $_SESSION['logged_user_name'] = $user->getName();

        header('Location: /');
    }
}
