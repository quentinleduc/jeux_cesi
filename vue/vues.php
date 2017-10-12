<?php
require_once __DIR__."/../modele/DAO_user.php";
require_once __DIR__."/../modele/DAO_jeuxVideo.php";

 class Vues{



	function __construct(){

		}
	


	public function entete(){
		echo '<!DOCTYPE html>
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
								<li class="active"><a href="routeur.php">Accueil</a></li>
								<li><a  href="testmvc.php?liste_jeux">Tout les Jeux</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="moncompte.php"><span class="glyphicon glyphicon-log-in"></span>Mon compte</a></li>
								<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> logout</a></li>
							</ul>
						</div>
					</div>
				</nav>';
	}

	public function afficherHome($user, $liste){
		$retour = '
		<div class="jumbotron">
			<div class="container text-center">
				<h1>Bienvenue sur le Site Référence du Jeux-Vidéo</h1>      
				<p></p>
			</div>
		</div>

		<div class="container-fluid bg-3 text-center">    
		<h3>Jeux-Vidéo ajoutés récement</h3><br>';
		if($user != null){

			$retour = $retour.'
		
		
					
			echo  "Bienvenue "'.$user.';
		

		$retour += 
		<div class="row">
					
		';}
		$retour = $retour.'

		<div class="row">

		';
		for($i=0;$i<count($liste);$i++){
			$id=$liste[$i]->get_id();
			$nom=$liste[$i]->get_nom(); 
			$img=$liste[$i]->get_img();
			$retour = $retour.'
			<div class="col-sm-3">
			<p>'. $nom.'</p>
			<img src="img/'. $img.'" id="img-list" alt="Image">
			</div>';
		
		}
		$retour = $retour.'
				</div>
</div><br>

<footer class="container-fluid text-center">
	<p>Footer Text</p>
</footer>

</body>
</html>
	';
	echo $retour;
	}



}

?>