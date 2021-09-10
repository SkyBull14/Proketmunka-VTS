<?php /** @var App $app */ ?>
<?php $app->render('layout/header'); ?>
<div class="container">

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Sétáltatások</h3>

            <table class="table table-striped">
                <tr>
                    <th>Név</th>
                    <th>Séta kezdés</th>
                    <th>Séta befejezés</th>
                </tr>

                <?php foreach ($app->walkerData->getScheduleList(5) as $schedule): ?>

                    <tr>
                        <td><?= $schedule->first_name; ?></td>
                        <td>5/<?= $schedule->schedule_begin; ?></td>
                        <td><?= $schedule->schedule_end; ?></td>
                    </tr>

                <?php endforeach; ?>
            </table>

            <!--<pre><?php print_r($app->walkerData->getScheduleList(30)); ?></pre>-->

        </div>
    </div>

</div>

<?php $app->render('layout/footer'); ?>
