<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Jelszó megerősítése</title>
    <link rel="stylesheet" type="text/css" href="../CSS/password-confirmation.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
   <nav>
        <div class="navDiv">
            <ul class="navUl">
                <li class="navLi"><a class="navLinks" href="login.php">BEJELNTKEZÉS</a></li>
                <li class="navLi"><a class="navLinks-1" href="registration.php">REGISZTRÁCIÓ</a></li>
                <li class="navLi"><a class="navLinks" href="password-confirmation.php">JELSZÓ MEGERŐSÍTÉSE</a></li>
                <li class="navLi"><a class="navLinks" href="registered-user.php">REGISZTÁLT FELHASZNÁLÓ</a></li>
                <li class="navLi"><a class="navLinks" href="registered-dogWalker.php">REGISZTRÁLT KUTYASÉTÁLTATÓ</a></li>
            </ul>
        </div>
    </nav>
    <form>
        <h2>Adja meg az emailben elküldött kódot</h2>
        <input type="text" name="codeConfirm"><br><br>

        <input type="submit" name="submit" id="submit" value="Megerősítés"><br><br>
        <input type="submit" name="reSubmit" id="reSubmit" value="Kód ujraküldése">
    </form>
</body>
</html>