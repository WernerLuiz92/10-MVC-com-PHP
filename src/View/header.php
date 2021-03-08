<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Werner - MVC</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid d-flex">
            <a class="navbar-brand" href="/">Cruso MVC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">     
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?= ($activePage == '/') ? 'active' : ''; ?>" href="/">Página Inicial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($activePage == '/listar-cursos') ? 'active' : ''; ?> <?= (isset($_SESSION['logged_user'])) ? '' : 'disabled'; ?>" href="/listar-cursos">Listar Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($activePage == '/novo-curso') ? 'active' : ''; ?> <?= (isset($_SESSION['logged_user'])) ? '' : 'disabled'; ?>" href="/novo-curso">Cadastrar Curso</a>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav">
                <?php if (!isset($_SESSION['logged_user'])) {?>
                    <li class="nav-item ml-auto">
                        <a href="/login" class="nav-link <?= ($activePage == '/login') ? 'active' : ''; ?>">Login</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item ml-auto mt-2 me-2">
                        <span class="text-white">Olá <?= $_SESSION['logged_user_name']; ?>!</span>
                    </li>
                    <li class="nav-item ml-auto">
                        <a href="/logout" class="nav-link">Sair</a>
                    </li>
                <?php } ?>
                    
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><?= $title; ?></li>
        </ol>
        </nav>
    <?php if (isset($_SESSION['message']) && isset($_SESSION['logged_user'])) :?>
        <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
            <strong><?= (isset($_SESSION['strong_message'])) ? $_SESSION['strong_message'] : ''; ?></strong> <?= $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
            unset($_SESSION['message_type']);
            unset($_SESSION['message']);
            unset($_SESSION['strong_message']);
        endif; ?>