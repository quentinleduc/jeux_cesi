<!DOCTYPE html>
<html lang="en">
<head>
	<title>Site de référence pour le classement et la notation de Jeux-Vidéo</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
  
</head>
<body>

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			</button>
			<a class="navbar-brand" href="#">Notre Site</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php">Accueil</a></li>
				<li><a href="liste_jeux.php">Tout les Jeux</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		</div>
	</div>
</nav>

<dic id="Formulaire_login">
	<form action="login1.php" method="post">
	  <br>
	  <p> Login </p>
	  <input type="text" placeholder="login" name="login"> <br>
	  <br>
	  <p> Mot de passe </p>
	  <input type="password" placeholder="mdp" name="mdp"> <br>
	  <br>
	  <input type="submit" value="OK">
	  <a href="mdp_oublier.php">Mot de passe oublier</a>
	</form>
</dic>
<div id = "erreurmsg">
	<?php
		session_start();
		error_reporting(E_ALL & ~E_NOTICE);

		if ($_GET["error"] == "error"){
		  echo "Votre login et/ou votre mdp sont incorrects";
		}

		if ($_GET["log"] == "log"){
		  echo "Merci de vous identifier";
		}

		  ?>
</div>
<footer class="container-fluid text-center">
</footer>

</body>
</html>
