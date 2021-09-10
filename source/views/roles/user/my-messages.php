<?php /** @var App $app */ ?>
<?php $app->render('layout/header'); ?>

<main class="container">
    <?php $app->render('layout/profile-navigation'); ?>

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <pre><?php print_r($app->userMessages->getMessagesByUser($this->user)) ?></pre>
                </div>
            </div>

        </div>
    </div>

</main>

<?php $app->render('layout/footer'); ?>
