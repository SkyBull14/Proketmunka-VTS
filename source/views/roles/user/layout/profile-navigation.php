<?php /** @var App $app */ ?>
<?php /** @var AppData $data */ ?>
<div class="card navbar-card">
    <nav class="nav flex-row nav-pills">

        <a class="nav-link <?= $data->viewName == 'my-profile' ? 'active' : '' ?>" aria-current="page"
           href="/page/my-profile">Áttekintés</a>

        <a class="nav-link <?= $data->viewName == 'my-messages' ? 'active' : '' ?>" aria-current="page"
           href="/page/my-messages">Üzenetek</a>

        <?php if ($app->user->role == 'owner'): ?>

            <a class="nav-link <?= $data->viewName == 'my-dogs' ? 'active' : '' ?>" aria-current="page"
               href="/page/my-dogs">Kutyák</a>

            <a class="nav-link <?= $data->viewName == 'my-requests' ? 'active' : '' ?>" aria-current="page"
               href="/page/my-requests">Séták</a>

        <?php endif; ?>

        <?php if ($app->user->role == 'walker'): ?>

            <a class="nav-link <?= $data->viewName == 'my-walks' ? 'active' : '' ?>" aria-current="page"
               href="/page/my-walks">Séták</a>

        <?php endif; ?>

        <div clasS="flex-fill">&nbsp;</div>

        <a class="nav-link <?= $data->viewName == 'my-profile-edit' ? 'active' : '' ?>" aria-current="page"
           href="/page/my-profile/edit">Profil</a>

        <a class="nav-link" aria-current="page" href="/action/user/logout">Kijelentkezés</a>
    </nav>
</div>
