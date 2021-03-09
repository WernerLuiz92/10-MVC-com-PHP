<?php

namespace Werner\MVC\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Werner\MVC\Helper\FlashMessageTrait;
use Werner\MVC\Model\Entity\Course;

class Persist implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $description = filter_input(
            INPUT_POST,
            'descricao',
            FILTER_SANITIZE_STRING
        );
        $id = filter_input(
            INPUT_POST,
            'id',
            FILTER_VALIDATE_INT
        );

        if (is_null($id) || $id === false) {
            $course = $this->newCourse($description);
            $message = "Curso {$course->getDescription()} cadastrado com sucesso!";
        } else {
            $course = $this->updateCourse($id, $description);
            $message = "Curso {$course->getDescription()} alterado com sucesso!";
        }

        $this->entityManager->persist($course);
        $this->entityManager->flush();

        $this->setFlashMessage('success', $message, true);

        return new Response(302, [
            'Location' => '/listar-cursos',
        ]);
    }

    private function newCourse(string $description): Course
    {
        $course = new Course($description);

        return $course;
    }

    private function updateCourse(int $id, string $description)
    {
        $course = $this->entityManager
            ->getReference(Course::class, $id);

        $course->setDescription($description);

        return $course;
    }
}
