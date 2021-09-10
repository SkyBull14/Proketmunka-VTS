<?php /** @var App $app */ ?>
<?php $app->render('layout/header'); ?>

<main class="container">
    <?php $app->render('layout/profile-navigation'); ?>
    <?php $dogs = $app->dogData->getDogsByUser($app->user); ?>

    <?php if ($dogs): ?>

    <?php else: ?>


    <div class="card" style="margin: 20px 0">

        <div class="row justify-content-center card-body">
            <div class="col-6">

                <div class="alert alert-info">
                    <span class="alert-heading">Nincsenek kutyák felvéve!</span>
                </div>

            </div>
        </div>

    </div>

    <?php endif; ?>


</main>

<?php $app->render('layout/footer'); ?>
