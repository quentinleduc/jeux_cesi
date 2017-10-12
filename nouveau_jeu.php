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
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="home.php">Accueil</a></li>
				<li><a href="liste_jeux_home.php">Tout les Jeux</a></li>
				<li><a href="nouveau_jeu.php"> Nouveau Jeu </a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="moncompte.php"><span class="glyphicon glyphicon-log-in"></span>Mon compte</a></li>
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> logout</a></li>
			</ul>
		</div>
	</div>
</nav>
<form class="form-horizontal"  action="insert_jeu.php" method="post">
		<div class="form-group">
			<label class="control-label col-sm-2">Nom Jeu</label>
			<div class="col-sm-10">
				<input  class="form_inscription form-control" id="nom" placeholder="Nom du jeu" name="nom">
			</div>
			<br>
			<br>
			<label class="control-label col-sm-2">Genre du jeu</label>
			<div class="col-sm-10">
				<SELECT name="genre" size="1">
					<OPTION>Action
					<OPTION>Aventure
					<OPTION>Course
					<OPTION>RPG
					<OPTION>Simulation
					<OPTION>Stratégie
					<OPTION>Hack 'n' slash
				</SELECT>
			</div>
			<br>
			<br>
			<label class="control-label col-sm-2">Support</label>
			<div class="col-sm-10">
				<input id="PS3" type="checkbox">
				<label for="PS3"> PS3 </label>
				<input id="PS4" type="checkbox">
				<label for="PS4"> PS4 </label>
				<input id="XBOX 360" type="checkbox">
				<label for="XBOX 360"> XBOX 360 </label>
				<br>
				<input id="XBOX ONE" type="checkbox">
				<label for="XBOX ONE"> XBOX ONE </label>
				<input id="WII U" type="checkbox">
				<label for="WII U"> WII U </label>
				<input id="SWITCH" type="checkbox">
				<label for="SWITCH"> SWITCH </label>
				<input id="PC" type="checkbox">
				<label for="PC"> PC </label>
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
</html><input id="checkBox" type="checkbox">
