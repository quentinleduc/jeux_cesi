<?php
require_once __DIR__."/../modele/DAO_user.php";
require_once __DIR__."/../modele/DAO_jeuxVideo.php";

 class Vues{



	function __construct(){

		}
	


	public function entete($user,$grade){
		$retour = '<!DOCTYPE html>
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
								<li ><a href="testmvc.php">Accueil</a></li>
								<li><a  href="testmvc.php?liste_jeux">Tout les Jeux</a></li>
								';
								if($grade != null && $grade =='admin' )
								{
									
									$retour = $retour .'<li><a href="testmvc.php?nouveauJeu"> Nouveau Jeu </a></li>';
								}
								$retour = $retour .'
							</ul>
							<ul class="nav navbar-nav navbar-right">';
							if($user != null){
								$retour = $retour.'<li><a href="testmvc.php?monCompte"><span class="glyphicon glyphicon-log-in"></span>Mon compte</a></li>
								<li><a href="testmvc.php?logout"><span class="glyphicon glyphicon-log-in"></span> logout</a></li>';
							}
								else $retour = $retour.'<li><a href="testmvc.php?login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
								$retour = $retour.'
							</ul>
						</div>
					</div>
				</nav>';
				echo $retour;
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
		
		
					
			Bienvenue '.$user.'
		

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

	public function afficherListeJeux( $liste,$grade){
		$retour = '
		<div class="jumbotron">
			<div class="container text-center">
				<h1>Bienvenue sur le Site Référence du Jeux-Vidéo</h1>      
				<p></p>
			</div>
		</div>

		<div class="container-fluid bg-3 text-center">    
		<h3>Jeux-Vidéo ajoutés récement</h3><br>';
		
		$retour = $retour.'

		<div class="row">

		';
		for($i=0;$i<count($liste);$i++){
			$id=$liste[$i]->get_id();
			$nom=$liste[$i]->get_nom(); 
			$img=$liste[$i]->get_img();
			$retour = $retour.'
			<div class="col-sm-3">
			<p>'. $nom.'</p>';
			if($grade != null && $grade == 'admin'){
				$retour = $retour.'
				
				<form  action="testmvc.php?supprimer" method="post">
				<input type="hidden"  name ="supprimer" value ="'.$liste[$i]->get_id().'">'.$liste[$i]->get_id().'
				<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Supprimer jeu</button>
					</div>
					</form> ';
			}
			$retour = $retour.'<img src="img/'. $img.'" id="img-list" alt="Image"/>';
			
			$retour = $retour.'</div>';
			

			
		
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

	public function afficherLogin($error){
		$retour ='<dic id="Formulaire_login">
	<form action="testmvc.php?verifLogin" method="post">
	  <br>'.$error.' <br>
	  <p> Login </p>
	  <input type="text" placeholder="login" name="login" class="form_login form-control"> <br>
	  <br>
	  <p> Mot de passe </p>
	  <input type="password" placeholder="mdp" name="mdp" class="form_login form-control"> <br>
	  <br>
	  <input type="submit" value="OK" class="btn btn-default">
	  <br>
	  <a href="testmvc.php?mdp_oublier">Mot de passe oublié</a>
	  <br>
	  <a href="testmvc.php?inscription">Créer votre compte</a>
	</form>
</dic>

<footer class="container-fluid text-center">
</footer>

</body>
</html>';

	echo $retour; 
	}

	public function afficherMonCompte($user,$prenom,$login,$email){
		$retour = '
		<form class="form-horizontal"  action="" method="post">
	<div class="form-group">
			<label class="control-label col-sm-2">Nom</label>
			<div class="col-sm-10">
				<input  class="form_inscription form-control" id="nom" name="nom" value="'.$user.'">
			</div>
			<br>
			<br>
			<label class="control-label col-sm-2">Prénom</label>
			<div class="col-sm-10">
				<input  class="form_inscription form-control" id="prenom"  name="prenom" value="'.$prenom.'">
			</div>
			<br>
			<br>
			<label class="control-label col-sm-2">Login</label>
			<div class="col-sm-10">
				<input  class="form_inscription form-control" id="login"  name="login" value="'.$login.'">
			</div>
			<br>
			<br>
			<label class="control-label col-sm-2">Adresse mail</label>
			<div class="col-sm-10">
				<input  class="form_inscription form-control" id="email"  name="email" value="'.$email.'">
			</div>
			<div class="col-sm-offset-2 col-sm-10">
			</div>
		</div>
	</form>
	<footer class="container-fluid text-center">
</footer>

</body>
</html>';

		echo $retour;

	}

	public function afficherNouveauJeu($listeCat,$listeType,$error){
		$retour ='';
		
		if($error != null){
			$retour = $retour.$error.'<br>';
		}
		$retour = $retour.'
		<form class="form-horizontal"  action="testmvc.php?insert_jeu" method="post">
		<div class="form-group">
			<label class="control-label col-sm-2">Nom Jeu</label>
			<div class="col-sm-10">
				<input  class="form_inscription form-control" id="nom" placeholder="Nom du jeu" name="nom">
			</div>
			<br>
			<br>
			<label class="control-label col-sm-2">Genre du jeu</label>
			<div class="col-sm-10">
			<SELECT name="genre" size="1">';
			foreach ($listeCat as $key=> $v) {
	 		 foreach ($v as $k => $value) {
	 		 	$retour = $retour.'<OPTION>'.$value; 
	 		 }
	 		}
	 		$retour = $retour.'
				</SELECT>
			</div>
			<br>
			<br>
			<label class="control-label col-sm-2">Support</label>
			<div class="col-sm-10">';
				


			

			for($i=0;$i<count($listeType);$i++){
					$retour = $retour.'
					'.$listeType[$i]["TJV_Nom"].'<input id="checkBox"  type="checkbox" name=options[]  value='.$listeType[$i]["TJV_id"].'>
					<label for="'.$listeType[$i]["TJV_Nom"].'"> <br>';
				}
				$retour = $retour.'
			</div>
			<br>
			<br>
			<label class="control-label col-sm-2">Image du jeu</label>
			<div class="col-sm-10">
				<input type="text" id="image" name="image">
			</div>	 
			<br>
			<br>
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default">Ajouter jeu</button>
			</div>
		</div>
		</form>

		
	</footer>

	</body>
	</html>';
	echo $retour;

	}

	public function afficherInscription($error){
		$retour ='';
		
		if($error != null){
			$retour = $retour.$error.'<br>';
		}
		$retour = '
		<div class="container">
	<h2>Bienvenue chez nous !</h2>
	<br>
	<form class="form-horizontal"  action="testmvc.php?insert_user" method="post">
		<div class="form-group">
			<label class="control-label col-sm-2">Nom</label>
			<div class="col-sm-10">
				<input  class="form_inscription form-control" id="nom" placeholder="Entrer votre nom" name="nom">
			</div>
			<br>
			<br>
			<label class="control-label col-sm-2">Prénon</label>
			<div class="col-sm-10">
				<input  class="form_inscription form-control" id="prenom" placeholder="Entrer votre prénom" name="prenom">
			</div>
			<br>
			<br>
			<label class="control-label col-sm-2">Login</label>
			<div class="col-sm-10">
				<input  class="form_inscription form-control" id="login" placeholder="Entrer un login" name="login">
			</div>
			<br>
			<br>
			<label class="control-label col-sm-2">Adresse mail</label>
			<div class="col-sm-10">
				<input  class="form_inscription form-control" id="email" placeholder="Entrer votre adresse mail" name="email">
			</div>
			<br>
			<br>
			<label class="control-label col-sm-2">Mot de passe</label>
			<div class="col-sm-10">          
				<input type="password" class="form_inscription form-control" id="pwd" placeholder="Entrer votre mot de passe" name="pwd">
			</div>
			<br>
			<br>
			<label class="control-label col-sm-2">Confirmer mot de passe</label>
			<div class="col-sm-10">          
				<input type="password" class="form_inscription form-control" id="pwd2" placeholder="Confirmer votre mot de passe" name="pwd2">
			</div>   
			<br>
			<br>
			<br>     
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default">Soumettre</button>
			</div>
		</div>
	</form>
</div>

<footer class="container-fluid text-center">
</footer>

</body>
</html>
';
echo $retour;
	}






}

?>