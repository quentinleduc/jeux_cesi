<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
require_once __DIR__."/modele/DAO_user.php";
	
$dao= new DAO_user;
$list = $dao->get_user($_POST["login"],$_POST["mdp"]);

if($_POST["login"] == $list[0]->get_login() && $_POST["mdp"] == $list[0]->get_mdp() ) {
  $_SESSION["login"] = $_POST["login"];
  $_SESSION["mdp"] = $_POST["mdp"];

  header("location:home.php");
}

else {
  header("location:login.php?error=error");
}
?>

