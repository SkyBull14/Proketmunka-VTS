<?php $app->render('layout/header'); ?>
<div class="container">
<div class="toplist-col">
    <h3>Toplista</h3>

    <table class="table table-striped">
        <tr>
            <th>Név</th>
            <th>Értékelés</th>
            <th>Séták</th>
        </tr>

        <?php foreach ($app->walkerData->getTopList() as $walker): ?>

            <tr>
                <td><?= $walker->id; ?></td>
                <td>5/<?= $walker->rating; ?></td>
                <td><?= $walker->walk_count; ?></td>
            </tr>

        <?php endforeach; ?>
    </table>

</div>
</div>

<?php $app->render('layout/footer'); ?>
