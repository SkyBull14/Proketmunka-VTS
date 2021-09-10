<?php /** @var App $app */ ?>
<?php $app->render('layout/header'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <?php $app->render('forms/user-registration'); ?>
        </div>
        <div class="col-4">
            <?php $app->render('forms/user-login'); ?>
        </div>
    </div>
</div>

<?php $app->render('layout/footer'); ?>
