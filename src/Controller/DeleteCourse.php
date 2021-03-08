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
            $_SESSION['message'] = 'O ID informado não é válido!';
            $_SESSION['message_type'] = 'danger';

            header('Location: /listar-cursos');

            return;
        }

        $course = $this->entityManager->find(Course::class, $id);

        if (is_null($course)) {
            $_SESSION['message'] = 'O ID informado não foi encontrado!';
            $_SESSION['message_type'] = 'danger';

            header('Location: /listar-cursos');

            return;
        }

        $_SESSION['message'] = "Curso {$course->getDescription()} excluído!";
        $_SESSION['message_type'] = 'danger auto-close';

        $this->entityManager->remove($course);
        $this->entityManager->flush();

        header('Location: /listar-cursos');
    }
}
