<?php /** @var App $app */ ?>
<?php $app->render('layout/header'); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <?php $app->render('forms/user-activation'); ?>
        </div>
    </div>
</div>

<?php $app->render('layout/footer'); ?>
