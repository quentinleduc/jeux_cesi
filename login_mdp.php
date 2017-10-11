<?php

if(IS_NULL ($_POST["email"] )){

  header("location:index.php");
}

else {
	// Le message
	$message = "Votre nouveau mot de passe est :";
	$to = $_POST["email"];
	
	// Envoi du mail
	mail($to,"Remise a zéro de votre mot de passe",$message);
	$message = "Un mail de réinitialisation vous a été envoyé";
	header("location:index.php?message=$message");
}
?>

