<?php require_once __DIR__.'/../header.php'; ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#Id</th>
                <th scope="col">Descrição</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($courses as $course): ?>
            <tr>
                <td scope="row"><?= $course->getId(); ?></td>
                <td class="d-flex justify-content-between">
                    <?= $course->getDescription(); ?>
                    <div>
                        <a href="/alterar-curso?id=<?= $course->getId(); ?>" class="btn btn-warning btn-sm">
                            <i class="far fa-edit mr-1"></i>
                            Alterar
                        </a>
                        <a href="/excluir-curso?id=<?= $course->getId(); ?>" class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt mr-1"></i>
                            Excluir
                        </a>
                    </div>
                    
                </td>    
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php require_once __DIR__.'/../footer.php'; ?>