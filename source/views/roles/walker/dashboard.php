<?php /** @var App $app */ ?>
<?php $app->render('layout/header'); ?>
<div class="container">
    <div class="d-grid gap-1 col-11 mx-auto justify-content-md-end">
    <a class="btn btn-primary" href="/?path=walker-post.php" role="button">Új poszt</a>
    <a class="btn btn-primary" href="/?path=walking-note.php" role="button">Napló</a>
    </div>
</div>
<?php $app->render('layout/footer'); ?>