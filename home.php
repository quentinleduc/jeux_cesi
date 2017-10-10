<!DOCTYPE html>
<html lang="en">
<head>
	<title>Site de référence pour le classement et la notation de Jeux-Vidéo</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
  
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
				<li><a href="moncompte.php"><span class="glyphicon glyphicon-log-in"></span>Mon compte</a></li>
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> logout</a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="jumbotron">
	<div class="container text-center">
		<h1>Bienvenue sur le Site Référence du Jeux-Vidéo</h1>      
		<p></p>
	</div>
</div>
  
<div class="container-fluid bg-3 text-center">    
	<h3>Jeux-Vidéo ajoutés récement</h3><br>
	<?php
				session_start();

				if($_SESSION["login"]){

				  echo "Bienvenue ".$_SESSION["login"];
				}

				else {
				  header("location:index.php?log=log");
				}
	?>
	<div class="row">
		<div class="col-sm-3">
			<p>Some text..</p>
			<img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
		</div>
		<div class="col-sm-3"> 
			<p>Some text..</p>
			<img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
		</div>
		<div class="col-sm-3"> 
			<p>Some text..</p>
			<img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
		</div>
		<div class="col-sm-3">
			<p>Some text..</p>
			<img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
		</div>
	</div>
</div><br>

<div class="container-fluid bg-3 text-center">    
	<div class="row">
		<div class="col-sm-3">
			<p>Some text..</p>
			<img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
		</div>
		<div class="col-sm-3"> 
			<p>Some text..</p>
			<img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
		</div>
		<div class="col-sm-3"> 
			<p>Some text..</p>
			<img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
		</div>
		<div class="col-sm-3">
			<p>Some text..</p>
			<img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
		</div>
	</div>
</div><br><br>

<footer class="container-fluid text-center">
	<p>Footer Text</p>
</footer>

</body>
</html>
