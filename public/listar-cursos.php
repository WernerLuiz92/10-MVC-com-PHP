<?php

use Werner\MVC\Entity\Curso;
use Werner\MVC\Infra\EntityManagerCreator;

require __DIR__.'/../vendor/autoload.php';

$entityManager = (new EntityManagerCreator())->getEntityManager();
$repositorioDeCursos = $entityManager->getRepository(Curso::class);
$cursos = $repositorioDeCursos->findAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Werner - MVC</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h1>Curso MVC Werner</h1>
        <h3>Lista de Cursos</h3>
    </div>

    <a href="/" class="btn btn-primary mb-2">Início</a>
    <a href="/listar-cursos" class="btn btn-primary mb-2">Listar Cursos</a>
    <a href="/novo-curso" class="btn btn-primary mb-2">Cadastrar novo curso</a>

    <ul class="list-group">
        <?php foreach ($cursos as $curso): ?>
            <li class="list-group-item">
                <?= $curso->getDescricao(); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>
