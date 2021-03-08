<?php

namespace Werner\MVC\Controller;

use Werner\MVC\Infra\EntityManagerCreator;
use Werner\MVC\Model\Entity\Course;

class ListCourses extends ControllerViews implements InterfaceRequestController
{
    private $coursesRepository;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->coursesRepository = $entityManager
            ->getRepository(Course::class);
    }

    public function requestProcess(): void
    {
        $courses = $this->coursesRepository->findAll();

        echo $this->renderView('courses/listCourses.php', [
            'title' => 'Lista de Cursos',
            'activePage' => '/listar-cursos',
            'courses' => $courses,
        ]);
    }
}
