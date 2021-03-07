<?php

namespace Werner\MVC\Controller;

use Werner\MVC\Infra\EntityManagerCreator;
use Werner\MVC\Model\Entity\Course;

class DeleteCourse implements InterfaceRequestController
{
    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())
            ->getEntityManager();
    }

    public function requestProcess(): void
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (is_null($id) || $id === false) {
            header('Location: /listar-cursos');

            return;
        }

        $course = $this->entityManager
            ->getReference(Course::class, $id);

        $this->entityManager->remove($course);
        $this->entityManager->flush();

        header('Location: /listar-cursos');
    }
}
