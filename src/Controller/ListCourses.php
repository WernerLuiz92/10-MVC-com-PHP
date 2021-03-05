<?php

namespace Werner\MVC\Controller;

use Werner\MVC\Entity\Course;
use Werner\MVC\Infra\EntityManagerCreator;

class ListCourses implements InterfaceRequestController
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
        $titulo = 'Lista de Cursos';
        $courses = $this->coursesRepository->findAll();
        require_once __DIR__.'/../../view/courses/listCourses.php';
    }
}
