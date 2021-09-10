<?php /** @var App $app */ ?>
<?php $app->render('layout/header'); ?>

<main class="container">

    <div class="row align-items-center">
        <?php if ($app->user->info): ?>

            <div class="col-8">

                <!-- Még feldolgozásra váró séták / kérések -->

            </div>

            <div class="col-4">
                <div class="card">
                    <h2 class="card-title">Hello, <?= $app->user->info->first_name ?>!</h2>

                    <nav class="nav flex-column">
                        <a class="nav-link active" aria-current="page" href="/?path=profile">Áttekintés</a>
                        <a class="nav-link" aria-current="page" href="/?path=my-messages">Üzenetek</a>
                        <a class="nav-link" aria-current="page" href="/?path=my-dogs">Kutyák</a>
                        <a class="nav-link" aria-current="page" href="/?path=my-walks">Séták</a>
                    </nav>
                </div>
            </div>

        <?php else: ?>

            <div class="col"></div>

            <div class="col-6">

                <div id="empty-profile" class="alert alert-warning" role="alert">
                    <p>A Profilod nem tejles, kérjük töltsd ki ahhoz, hogy felvehess kutyákat vagy sétáltatást
                        vallalhass el!</p>
                    <a href="?path=profile-edit">Profil Szerkesztése</a>
                </div>

            </div>

            <div class="col"></div>

        <?php endif; ?>
    </div>

</main>

<?php $app->render('layout/footer'); ?>
