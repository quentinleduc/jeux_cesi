<?php
	require_once __DIR__."/modele/DAO_user.php";
		
	echo  $_POST["prenom"];
	echo $_POST["nom"];
	echo $_POST["login"];
	echo $_POST["email"];
	echo $_POST["pwd"];
	echo $_POST["pwd2"];

	if (empty($_POST["prenom"]) OR empty($_POST["nom"]) OR empty($_POST["login"]) OR empty($_POST["email"]) OR empty($_POST["pwd"]) OR empty($_POST["pwd2"]) ) {
		$error = "Tout les champs sont obligatoire";
		header("location:login.php?error=$error");
	}
	else{
		
		$dao= new DAO_user;
		$list = $dao->create_user($_POST["nom"],$_POST["prenom"],$_POST["login"],$_POST["pwd"],$_POST["email"],"user");

		$_SESSION["login"] = $_POST["login"];
	    $_SESSION["pwd"] = $_POST["pwd"];

	    header("location:home.php");
	}
?>