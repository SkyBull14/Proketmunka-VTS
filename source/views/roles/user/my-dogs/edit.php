<?php /** @var App $app */ ?>
<?php $app->render('layout/header'); ?>
    <div class="container">
        <div class="card" id="form-margin">
            <div class="card-body">
                <form method="post" action="elerhetosegek.php">
                    <h2 class="question1">Új kutya hozzáadása</h2>

                    <label class="DogName" for="name">Kutyanév</label><br>
                    <input class="form-control" type="text" id="name" name="name" size="35"><br>

                    <label class="DogSpecies" for="species">Kutya fajta</label><br>
                    <input class="form-control" type="text" id="species" name="species"  size="35"><br>

                    <label class="DogAge" for="age">Kor</label><br>
                    <select class="form-control" id="age" name="age">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                    </select><br>

                    <label class="DogDescription" for="description">Leírás</label><br>
                    <textarea class="form-control" id="description" rows="4"></textarea><br>

                    <input type="submit" name="submit" id="submit" value="Hozzáadás">

                </form>
            </div>
        </div>
    </div>

<?php $app->render('layout/footer'); ?>