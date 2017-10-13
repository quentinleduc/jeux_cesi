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
				<li><a href="liste_jeux.php">Tout les Jeux</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<h2>Bienvenue chez nous !</h2>
	<br>
	<form class="form-horizontal"  action="insert_user.php" method="post">
		<div class="form-group">
			<label class="control-label col-sm-2">Nom</label>
			<div class="col-sm-10">
				<input  class="form_inscription form-control" id="nom" placeholder="Entrer votre nom" name="nom">
			</div>
			<br>
			<br>
			<label class="control-label col-sm-2">Prénom</label>
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
