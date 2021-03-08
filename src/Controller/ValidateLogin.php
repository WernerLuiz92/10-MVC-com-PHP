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
            $_SESSION['message_type'] = 'warning';
            $_SESSION['message'] = 'Por favor verifique.';
            $_SESSION['strong_message'] = 'E-mail inválido!';

            header('Location: /login');

            return;
        }

        /** @var User $user */
        $user = $this->userRepository->findOneBy(['email' => $email]);

        if (is_null($user) || !$user->passwordMatch($password)) {
            $_SESSION['message_type'] = 'danger';
            $_SESSION['message'] = 'Por favor verifique.';
            $_SESSION['strong_message'] = 'E-mail ou Senha incorretos!';

            header('Location: /login');

            return;
        }

        $_SESSION['logged_user'] = true;
        $_SESSION['logged_user_name'] = $user->getName();

        $_SESSION['message_type'] = 'info auto-close';
        $_SESSION['message'] = "Usuário {$_SESSION['logged_user_name']} logado com sucesso!";

        header('Location: /');
    }
}
