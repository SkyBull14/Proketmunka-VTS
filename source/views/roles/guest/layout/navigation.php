<?php /** @var App $app */ ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">🐶</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <?php $app->render('layout/navigation-links'); ?>

            <form class="d-flex" action="/page/auth">
                <button class="btn btn-outline-success" type="submit">Bejelentkezés / Regisztráció</button>
            </form>
        </div>

    </div>
</nav>