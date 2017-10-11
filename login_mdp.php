<?php
if(empty($$_POST["email"])){
	// Le message
	$message = "Votre nouveau mot de passe est :";
	$to = $email;
	
	// Envoi du mail
	mail($to,"Remise a zéro de votre mot de passe",$message);
	$message = "Un mail de réinitialisation vous a été envoyé";
	header("location:index.php?message=$message");
  
}

else {
	$message = "Votre mail est incorrect";
    header("location:index.php?message=$message");
}
?>

