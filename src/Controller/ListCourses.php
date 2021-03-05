<?php

namespace Werner\MVC\Controller;

use Werner\MVC\Infra\EntityManagerCreator;
use Werner\MVC\Model\Entity\Course;

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
        require_once __DIR__.'/../View/courses/listCourses.php';
    }
}
