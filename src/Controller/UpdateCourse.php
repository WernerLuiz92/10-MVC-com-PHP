<?php

namespace Werner\MVC\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Werner\MVC\Helper\FlashMessageTrait;
use Werner\MVC\Helper\HtmlRenderTrait;
use Werner\MVC\Model\Entity\Course;

class UpdateCourse implements RequestHandlerInterface
{
    use HtmlRenderTrait;
    use FlashMessageTrait;

    private $courseRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->courseRepository = $entityManager->getRepository(Course::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $queryParams = $request->getQueryParams();

        $id = filter_var($queryParams['id'], FILTER_VALIDATE_INT);

        $response = new Response(302, [
            'Location' => '/listar-cursos',
        ]);

        if ($id === false) {
            $this->setFlashMessage('warning', 'Por favor verifique.', false, 'ID inválido ou em branco!');

            return $response;
        }

        $course = $this->courseRepository
            ->find($id);

        if (is_null($course)) {
            $this->setFlashMessage('danger', 'Por favor verifique.', false, 'ID não encontrado!');

            return $response;
        }

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
