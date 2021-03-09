<?php

namespace Werner\MVC\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Werner\MVC\Helper\FlashMessageTrait;
use Werner\MVC\Model\Entity\Course;

class DeleteCourse implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $queryParams = $request->getQueryParams();

        $id = filter_var($queryParams['id'], FILTER_VALIDATE_INT);

        $response = new Response(302, [
            'Location' => '/listar-cursos',
        ]);

        if (is_null($id) || $id === false) {
            $this->setFlashMessage('warning', 'Por favor verifique.', false, 'ID inválido ou em branco!');

            return $response;
        }

        $course = $this->entityManager->find(Course::class, $id);

        if (is_null($course)) {
            $this->setFlashMessage('danger', 'Por favor verifique.', false, 'ID não encontrado!');

            return $response;
        }

        $this->setFlashMessage('success', "Curso {$course->getDescription()} excluído!", true);

        $this->entityManager->remove($course);
        $this->entityManager->flush();

        return $response;
    }
}
