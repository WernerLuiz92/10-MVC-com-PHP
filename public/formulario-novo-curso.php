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
        <h3>Cadastrar Novo Curso</h3>
    </div>

    <a href="/" class="btn btn-primary mb-2">Início</a>
    <a href="/listar-cursos" class="btn btn-primary mb-2">Listar Cursos</a>
    <a href="/novo-curso" class="btn btn-primary mb-2">Cadastrar novo curso</a>

    <form action="">
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" id="descricao" name="descricao" class="form-control">
        </div>
        <button class="btn btn-success">Salvar</button>
    </form>
</div>
</body>
</html>
