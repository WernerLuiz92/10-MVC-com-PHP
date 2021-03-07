<?php

namespace Werner\MVC\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Werner\MVC\Infra\EntityManagerCreator;
use Werner\MVC\Model\Entity\Course;

class Persist implements InterfaceRequestController
{
    private EntityManagerInterface $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function requestProcess(): void
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
        } else {
            $course = $this->updateCourse($id, $description);
        }

        $this->entityManager->persist($course);
        $this->entityManager->flush();

        header('Location: /listar-cursos', true, 302);
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
