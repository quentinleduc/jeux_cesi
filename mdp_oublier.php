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
				<li class="active"><a href="index.php">Accueil</a></li>
				<li><a href="liste_jeux.php">Tout les Jeux</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		</div>
	</div>
</nav>

<dic id="Formulaire_mdp">
	<form action="login_mdp.php" method="post">
	  <br>
	  <p> Un nouveau mot de passe vous sera renvoyer sur votre adresse Email</p>
	  <p> Adresse Email  :  <input type="text" placeholder="Email" name="email"> </p><br> 
	  <input type="submit" value="OK">
	</form>
</dic>
<footer class="container-fluid text-center">
</footer>

</body>
</html>
