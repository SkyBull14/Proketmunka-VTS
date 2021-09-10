<?php /** @var App $app */ ?>
<?php $app->render('layout/header'); ?>
<div class="container">

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Toplista</h3>

            <table class="table table-striped">
                <tr>
                    <th>Név</th>
                    <th>Értékelés</th>
                    <th>Séták</th>
                </tr>

                <?php foreach ($app->walkerData->getTopList(30) as $walker): ?>

                    <tr>
                        <td><?= $walker->id; ?></td>
                        <td>5/<?= $walker->rating; ?></td>
                        <td><?= $walker->walk_count; ?></td>
                    </tr>

                <?php endforeach; ?>
            </table>

            <!--<pre><?php print_r($app->walkerData->getTopList(30)); ?></pre>-->

        </div>
    </div>

</div>

<?php $app->render('layout/footer'); ?>
