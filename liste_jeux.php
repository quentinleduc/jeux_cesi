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
				<li class="active"><a href="liste_jeux.php">Tout les Jeux</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		</div>
	</div>
</nav>
 
<div class="container-fluid bg-3 text-center">    
	<h3>Jeux-Vidéo ajoutés récement</h3><br>
	<div class="row">
		<?php
		include('../include/session.inc.php');
		include('../include/header.tpl.php');
		$con = mysqli_connect("localhost","root","root","projet_web_jv");

		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

		// Perform queries 
		$result = mysqli_query($con,"SELECT * FROM jeuxvideo");
		while($row = mysqli_fetch_assoc($result)) {
			$id=$row["film_id"];
			$nom=$row["JV_Nom"]; 
			$img=$row["JV_Image"];
			?>
			<div class="col-sm-3">
			<p><?php echo $nom;?></p>
			<img src="img/<?php echo $img;?>" id="img-list" alt="Image">
			</div>
		<?php
		}
		?>
	</div>
</div><br>

<footer class="container-fluid text-center">
	<p>Footer Text</p>
</footer>

</body>
</html>
