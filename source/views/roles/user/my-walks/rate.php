<?php /** @var App $app */ ?>
<?php $app->render('layout/header'); ?>
<div class="container">
    <div class="card" id="form-margin">
        <div class="card-body">
            <form method="post" action="elerhetosegek.php">
                <h2 class="question1">Értékelje a szolgáltatást</h2>

                <label class="Service" for="age">A szolgáltatás...</label><br>
                <select class="form-control" id="age" name="age">
                    <option value="5">Kiváló</option>
                    <option value="4">Kielégitő</option>
                    <option value="3">Átlagos</option>
                    <option value="2">Elégséges</option>
                    <option value="1">Kielégitetlen</option>
                </select><br>

                <input type="submit" name="submit" id="submit" value="Hozzáadás">

            </form>
        </div>
    </div>
</div>
<?php $app->render('layout/footer'); ?>

