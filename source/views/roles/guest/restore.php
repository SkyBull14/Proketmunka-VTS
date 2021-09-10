<?php /** @var App $app */ ?>
<?php $app->render('layout/header'); ?>
<div class="container">

    <div class="card">
        <div class="card-body">

            <?php $step = $_GET['step'] ?? 'request'; ?>
            <?php $app->render("reset/{$step}-header") ?>
            <?php $app->render("forms/reset-{$step}") ?>

        </div>

    </div>

</div>

<?php $app->render('layout/footer'); ?>