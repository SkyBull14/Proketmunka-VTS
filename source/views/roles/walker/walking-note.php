<?php /** @var App $app */ ?>
<?php $app->render('layout/header'); ?>
<div class="container">
    <div class="card" id="form-margin">
        <div class="card-body">
            <form method="post" action="/api.php?action=WalkerNote">
                <h2 class="question1">Jegyzet a jelenlegi sétárol</h2>

                <textarea class="form-control" id="description" rows="6"></textarea><br>

                <input type="submit" name="submit" id="submit" value="Hozzáadás">

            </form>
        </div>
    </div>
</div>
<?php $app->render('layout/footer'); ?>

