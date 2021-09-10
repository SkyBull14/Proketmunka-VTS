<?php /** @var App $app */ ?>
<?php $app->render('layout/header'); ?>

<main class="container">
    <div class="row">
        <div class="col-6">

            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Toplista</h3>

                    <table class="table table-striped">
                        <tr>
                            <th>Név</th>
                            <th>Értékelés</th>
                            <th>Séták</th>
                        </tr>

                        <?php foreach ($app->walkerData->getTopList(5) as $walker): ?>

                            <tr>
                                <td><?= $walker->email; ?></td>
                                <td>5/<?= $walker->rating; ?></td>
                                <td><?= $walker->walk_count; ?></td>
                            </tr>

                        <?php endforeach; ?>
                    </table>

                    <!--<pre><?php print_r($app->walkerData->getTopList(5)) ?></pre>-->

                </div>
            </div>

        </div>

        <div class="col-6">

            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Legaktívabb</h3>

                    <table class="table table-striped">
                        <tr>
                            <th>Név</th>
                            <th>Értékelés</th>
                            <th>Séták</th>
                        </tr>

                        <?php foreach ($app->walkerData->getMostActiveList(5) as $walker): ?>

                            <tr>
                                <td><?= $walker->email; ?></td>
                                <td>5/<?= $walker->rating; ?></td>
                                <td><?= $walker->walk_count; ?></td>
                            </tr>

                        <?php endforeach; ?>
                    </table>

                    <!--<pre><?php print_r($app->walkerData->getMostActiveList(5)) ?></pre>-->
                </div>
            </div>

        </div>
    </div>

</main>

<?php $app->render('layout/footer'); ?>
