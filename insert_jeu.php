<?php
	require_once __DIR__."/modele/DAO_jeuxVideo.php";
		

	if (empty($_POST["nom"]) OR empty($_POST["genre"]) OR empty($_POST["image"])) {
		$error = "Tout les champs sont obligatoire";
		header("location:nouveau_jeu.php?error=$error");
	}
	else{
		
		$dao= new DAO_jeuxVideo;
		$list = $dao->create_jeux($_POST["nom"],$_POST["genre"],$_POST["image"]);

	    //header("location:nouveau_jeu.php");
	}
?>

