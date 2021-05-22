<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>... profilja</title>
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
<?php
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$password1=$_POST['password1'];
	$password1Again=$_POST['password1Again'];
	$registrationMethod;

	if(empty($fname) || empty($lname) || empty($email) || empty($password1) || empty($password1Again) || empty($registrationMethod))
	{
		echo "<b class='bold2'>Kérjük töltse ki a csillaggal jelölt mezőket!</b>";
	}
	else
	{
	echo "<b class='bold3'>Köszönjük regisztrálását!</b>";
	}
}	
?>
    <nav>
	   <ul class="menu">
		<li><a href="#"><i class="fas fa-user">Valami</i></a>
	   <ul class="sub-menu">
		<li><a href="#">Üzenetek</a></li>
		<li><a href="shared-data.php">Adatok frissítése</a></li>
	   </ul>
		</li>
  </nav>
	<div class="formDiv">
	<form method="post" action="elerhetosegek.php">
		<h2 class="question1">Profil adatainak megváltoztatása</h2>
		
		<label class="InputName" for="name">Felhasználónév</label><br>
		<img class="star" src="star.png" alt="required" width="20">
		<input type="text" id="name" name="name" size="35"><br>
		
		<label class="InputFname" for="fname">Keresztnév</label><br>
		<img class="star" src="star.png" alt="required" width="20">
		<input type="text" id="fname" name="fname" size="35"><br>
		
		<label class="InputLname" for="lname">Vezetéknév</label><br>
		<img class="star" src="star.png" alt="required" width="20">
		<input type="text" id="lname" name="lname" size="35"><br>
		
		<label class="InputEmail" for="email">E-mail cím</label><br>
		<img class="star" src="star.png" alt="required" width="20">
		<input type="email" id="email" name="email"  size="35"><br>
		
		<label class="InputPassword1" for="password1">Jelszó</label><br>
		<img class="star" src="star.png" alt="required" width="20">
		<input type="password" id="password1" name="password1" size="35"><br>
		
		<label class="InputPassword1Again" for="password1Again">Jelszó újból</label><br>
		<img class="star" src="star.png" alt="required" width="20">
		<input type="password" id="password1Again" name="password1Again" size="35"><br><br>
		
		<input type="submit" name="submit" id="submit" value="Küldés">
		<input type="reset" name="reset" id="reset" value="Mégsem">
	</form>
	</div>
</body>
</html>