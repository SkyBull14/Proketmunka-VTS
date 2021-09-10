<?php /** @var App $app */ ?>
<?php $app->render('layout/header'); ?>
<div class="container">

    <form method="post" action="/api.php?action=UserUpdate">

        <div class="card" id="form-margin">
            <div class="card-body">


                <h2 class="question1">Profil adatainak megváltoztatása</h2>

                <label class="InputEmail" for="email">E-mail cím</label><br>
                <input class="form-control" type="email" id="email" name="email" value="<?= $app->user->email ?>"
                       size="35"><br><br>

                <input class="" type="submit" name="submit" id="submit" value="Módosítás">

                <br>

                <label class="InputPassword1" for="password1">Jelszó</label><br>
                <input class="form-control" type="password" id="password1" name="password1" value="<?= $app->user->password ?>" size="35"><br>

                <label class="InputPassword1Again" for="password1Again">Jelszó újból</label><br>
                <input class="form-control" type="password" id="password1Again" name="password1Again" value="<?= $app->user->password ?>" size="35"><br><br>

                <input type="submit" name="submit" id="submit" value="Módosítás">


            </div>
        </div>

    </form>

</div>

<?php $app->render('layout/footer'); ?>
