<?php require_once __DIR__.'/header.php'; ?>
    <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
        <strong><?= (isset($_SESSION['strong_message'])) ? $_SESSION['strong_message'] : ''; ?></strong> <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
            unset($_SESSION['message_type']);
            unset($_SESSION['message']);
            unset($_SESSION['strong_message']);
    ?>
<?php require_once __DIR__.'/footer.php'; ?>   

