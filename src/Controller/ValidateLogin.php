<?php

namespace Werner\MVC\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Werner\MVC\Helper\FlashMessageTrait;
use Werner\MVC\Model\Entity\User;

class ValidateLogin implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private $userRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->userRepository = $entityManager->getRepository(User::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
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
            $this->setFlashMessage('warning', 'Por favor verifique.', false, 'E-mail inválido!', 'login');

            return new Response(302, [
                'Location' => '/login',
            ]);
        }

        /** @var User $user */
        $user = $this->userRepository->findOneBy(['email' => $email]);

        if (is_null($user) || !$user->passwordMatch($password)) {
            $this->setFlashMessage('danger', 'Por favor verifique.', false, 'E-mail ou Senha incorretos!', 'login');

            return new Response(302, [
                'Location' => '/login',
            ]);
        }

        $_SESSION['logged_user'] = true;
        $_SESSION['logged_user_name'] = $user->getName();

        $this->setFlashMessage('info', "Usuário {$_SESSION['logged_user_name']} logado com sucesso!", true);

        return new Response(302, [
            'Location' => '/',
        ]);
    }
}
