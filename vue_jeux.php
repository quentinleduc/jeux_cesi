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
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Accueil</a></li>
				<li ><a href="liste_jeux.php">Tout les Jeux</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		</div>
	</div>
</nav>

<?php
//require_once __DIR__."/modele/DAO_jeuxVideo.php";

//$dao= new DAO_jeuxVideo();
//$id = $_GET["id"];
//echo $id;

//$jeu = $dao->get_jeu($id);
//echo = $jeu;
//$nom_jeux  = $jeu->get_nom();
//$text_film = $donnees["film_text"];
//$date_film = $donnees["film_date"];

//echo $nom_jeux;


?>

<div class="row">
	<div class="col-sm-4">
		<img src="img/fifa18.jpg" id="img-vue">
	</div>
	<div class="col-sm-8" id="info-jeu">
		<label class="control-label col-sm-2">Nom</label>
		<label class="control-label col-sm-2">Fifa 18</label>
		<br>
		<br>
		<label class="control-label col-sm-2">Tye de jeu</label>
		<label class="control-label col-sm-2">Simulation</label>
		<br>
		<br>
		<label class="control-label col-sm-2">Console</label>
		<label class="control-label col-sm-2">PS4 / Xbox / PC</label>
	</div>
</div>


<footer class="container-fluid text-center">
	
</footer>

</body>
</html>