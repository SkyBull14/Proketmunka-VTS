<?php
	require_once "db_config.php";
	require_once "functions.php";

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../CSS/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Bejelentkezés</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
<nav class="col"> <!-- Bal hasáb -->
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
<?php
if(isset($_POST['submit2']))
{
    $email=$_POST['email-login'];
    $password=$_POST['password-login'];

    if(empty(preg_match("/^[a-z-A-ZáéíöőüűÁÉÍÖŐÜŰ]+@.+\.[a-z]{2,}$/u",$email)) || empty($password)) {

    } else {

    }
}
?>

<div class="col-8"> <!--Középső hasáb-->

    <div class="header">
        <img src="../Images/system/Header.png" class="img-fluid">
    </div>

    <div class="card">
        <div class="card-body">
<div class="form-group"
    <div class="formDiv2">
        <form method="post" action="elerhetosegek.php">
            <label class="InputEmail" for="email-login">E-mail cím</label><br>
            <img class="star" src="star.png" alt="required" width="20">
            <input type="email" class="form-control" id="email-login" name="email"  size="35"><br>

            <label class="InputPassword" for="password-login">Jelszó</label><br>
            <img class="star" src="star.png" alt="required" width="20">
            <input type="password" class="form-control" id="password-login" name="password" size="35"><br>

            <input type="submit" class="btn btn-success" name="submit" id="reset" value="Küldés">
            <input type="reset" name="reset" id="reset" value="Mégsem"><!--Ennek a gombnak nem látom használatát töröld ha nem kell!-->
        </form>
        <br>
        <p>Még nincs fiókja<a href="registration.php"> regisztráljon most.<a></p>
    </div>
        </div>
        </div>
    </div>
</div>
        <div class="col"> <!--Jobb hasáb. Valamilyen oknál fogva egy <a>-ba kerül a div ezért nem jelenik meg helyesen-->
            <!-- potenciális chat interfész és megjelenitett fiók adatok -->
        </div>
    </div>
</div>
</body>
</html>