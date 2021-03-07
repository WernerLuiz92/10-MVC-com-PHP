<?php require_once __DIR__.'/../header.php'; ?>
<form action="/salvar-curso" method="POST">
    <div class="form-group">
        <input type="text" id="id" name="id" value="<?= $id; ?>" style="display: none;">
        <label for="descricao">Descrição</label>
        <input 
            type="text" 
            id="descricao" 
            name="descricao" 
            class="form-control" 
            placeholder="Descrição do curso"
            value="<?= $description; ?>"
            autocomplete="off"
        >
    </div>
    <button class="btn btn-success">Salvar</button>
</form>
<?php require_once __DIR__.'/../footer.php'; ?>