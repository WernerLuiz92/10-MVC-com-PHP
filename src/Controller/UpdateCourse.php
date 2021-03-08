<?php

namespace Werner\MVC\Controller;

use Werner\MVC\Helper\HtmlRenderTrait;
use Werner\MVC\Infra\EntityManagerCreator;
use Werner\MVC\Model\Entity\Course;

class UpdateCourse implements InterfaceRequestController
{
    use HtmlRenderTrait;

    private $courseRepository;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->courseRepository = $entityManager
            ->getRepository(Course::class);
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

        $course = $this->courseRepository
            ->find($id);

        $description = $course->getDescription();

        echo $this->renderView('courses/formCourse.php', [
            'title' => "Alterar Curso: $description",
            'activePage' => '/listar-cursos',
            'id' => $id,
            'description' => $description,
        ]);
    }
}
