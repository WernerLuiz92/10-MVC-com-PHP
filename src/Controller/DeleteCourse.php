<?php

namespace Werner\MVC\Controller;

use Werner\MVC\Helper\FlashMessageTrait;
use Werner\MVC\Infra\EntityManagerCreator;
use Werner\MVC\Model\Entity\Course;

class DeleteCourse implements InterfaceRequestController
{
    use FlashMessageTrait;

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
            $this->setFlashMessage('danger', 'O ID informado não é válido!');
            header('Location: /listar-cursos');

            return;
        }

        $course = $this->entityManager->find(Course::class, $id);

        if (is_null($course)) {
            $this->setFlashMessage('danger', 'O ID informado não foi encontrado!');
            header('Location: /listar-cursos');

            return;
        }

        $this->setFlashMessage('danger', "Curso {$course->getDescription()} excluído!", true);

        $this->entityManager->remove($course);
        $this->entityManager->flush();

        header('Location: /listar-cursos');
    }
}
