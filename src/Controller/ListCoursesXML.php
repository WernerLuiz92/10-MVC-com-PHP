<?php

namespace Werner\MVC\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use SimpleXMLElement;
use Werner\MVC\Model\Entity\Course;

class ListCoursesXML implements RequestHandlerInterface
{
    private ObjectRepository $coursesRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->coursesRepository = $entityManager->getRepository(Course::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        /** @var Course[] $courses */
        $courses = $this->coursesRepository->findAll();

        $coursesXML = new SimpleXMLElement('<cursos/>');

        foreach ($courses as $course) {
            $courseXML = $coursesXML->addChild('curso');
            $courseXML->addChild('id', $course->getId());
            $courseXML->addChild('descricao', $course->getDescription());
        }

        return new Response(200, [
            'Content-Type' => 'application/xml',
        ], $coursesXML->asXML());
    }
}
