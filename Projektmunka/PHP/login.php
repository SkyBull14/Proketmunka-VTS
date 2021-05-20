<?php
	require_once "db_config.php";
	require_once "functions.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="login.css">
    <title>Bejelentkezés</title>
</head>
<div class="header">
</div>
<div class="container"
    <nav>
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
	<div class="formDiv2">
	<form method="post" action="elerhetosegek.php">		
		<label class="InputEmail" for="email-login">E-mail cím</label><br>
		<img class="star" src="star.png" alt="required" width="20">
		<input type="email" id="email-login" name="email"  size="35"><br>
		
		<label class="InputPassword" for="password-login">Jelszó</label><br>
		<img class="star" src="star.png" alt="required" width="20">
		<input type="password" id="password-login" name="password" size="35"><br>
		
		<input type="submit" name="submit" id="reset" value="Küldés">
		<input type="reset" name="reset" id="reset" value="Mégsem">
	</form>
	<br>
	<p>Még nincs fiókja<a href="registration.php"> regisztráljon most.<a></p>
	</div>
</biv>
</body>
</html>