<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);

$DAO = New DAO();
$Identifiant = $DAO->get_user($_POST["login"],$_POST["mdp"]);

if($_POST["login"] == $Identifiant.get_login && $_POST["mdp"] == $Identifiant.get_mdp()){
  $_SESSION["login"] = $_POST["login"];
  $_SESSION["mdp"] = $_POST["mdp"];

  header("location:home.php");
}

else {
  header("location:login.php?error=error");
}
?>

