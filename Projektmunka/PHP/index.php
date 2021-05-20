<?php
 require_once "db_config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home-page</title>
    <link rel="stylesheet" type="text/css" href="../CSS/index.css">
</head>
<body>
<div class="container">
<nav class="header">
    <div class="navDiv">
        <ul class="navUl">
            <li class="navLi"><a class="navLinks" href="login.php">BEJELNTKEZÉS</a></li>
            <li class="navLi"><a class="navLinks-1" href="registration.php">REGISZTRÁCIÓ</a></li>
            <li class="navLi"><a class="navLinks" href="password-confirmation.php">JELSZÓ MEGERŐSÍTÉSE</a></li>
            <li class="navLi"><a class="navLinks" href="registered-user.php">FELHASZNÁLÓ</a></li>
            <li class="navLi"><a class="navLinks" href="registered-dogWalker.php">KUTYASÉTÁLTATÓ</a></li>
        </ul>
    </div>
</nav>

    <div class="toplist">
        <p class="topList">Toplista</p>
        <p class="topList">Legjobban telyesítő sétáltatóink</p>

        <table>
            <tr>
                <th>Név</th>
                <th>Össz értékelés</th>
                <th>Profil megjelenítése</th>
            </tr>

            <tr>
            <?php
            $result = $db->query("SELECT username, rate FROM users ORDER BY rate DESC LIMIT 5;");
            $length = $result->rowCount();
            
            if(isset($result))
                if($length) {
                   $table = $result->fetchAll(PDO::FETCH_NUM);    
                } else {
                    echo '<p>Nincs adat</p>';
                }
                for($i = 0; $i<$length; $i++) {
                    echo '<tr>';
                    for($j = 0; $j <$length; $j++) {
                        echo '<td>';
                        echo $table[$i][$j];
                        echo '</td>';
                    }
                    echo '</tr>';
                }
                
            ?>
        </table>

        <p class="topList">Leg aktívabb sétáltatók</p>
        <table>
            <tr>
                <th>Név</th>
                <th>Össz értékelés</th>
                <th>Profil megjelenítése</th>
            </tr>

            <tr>

            <?php
            $result = $db->query("SELECT username, activity FROM users ORDER BY rate DESC LIMIT 5;");
            $length = $result->rowCount();
            
            if(isset($result))
                if($length) {
                   $table = $result->fetchAll();     
                } else {
                    echo '<p>Nincs adat</p>';
                }
                for($i = 0; $i<$length; $i++) {
                    echo '<tr>';
                    for($j = 0; $j <$length; $j++) {
                        echo '<td>';
                        echo $table[$i][$j];
                        echo '</td>';
                    }
                }
                echo '</tr>';
            ?>
        </table>
    </div>
</div>
</body>
</html>

