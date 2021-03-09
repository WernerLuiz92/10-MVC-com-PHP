<?php

namespace Werner\MVC\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Werner\MVC\Helper\HtmlRenderTrait;
use Werner\MVC\Model\Entity\Course;

class UpdateCourse implements RequestHandlerInterface
{
    use HtmlRenderTrait;

    private $courseRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->courseRepository = $entityManager->getRepository(Course::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (is_null($id) || $id === false) {
            return new Response(302, [
                'Location' => '/listar-cursos',
            ]);
        }

        $course = $this->courseRepository
            ->find($id);

        $description = $course->getDescription();

        $html = $this->renderView('courses/formCourse.php', [
            'title' => "Alterar Curso: $description",
            'activePage' => '/listar-cursos',
            'id' => $id,
            'description' => $description,
        ]);

        return new Response(200, [], $html);
    }
}
