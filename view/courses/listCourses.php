<?php
    require_once __DIR__.'/../header.php';
?>
    <ul class="list-group">
        <?php foreach ($courses as $course): ?>
            <li class="list-group-item">
                <?= $course->getDescription(); ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php
    require_once __DIR__.'/../header.php';
?>