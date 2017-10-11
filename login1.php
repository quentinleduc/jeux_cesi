<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
require_once __DIR__."/modele/DAO_user.php";
	 $dao= new DAO_user;
	 $list = $dao->get_user($_POST["login"],$_POST["mdp"]);

echo $_POST["login"];
echo $_POST["mdp"];

echo $list->get_login();
echo $list->get_mdp();

if($_POST["login"] == $list.get_login()&& $_POST["mdp"] == $list.get_mdp()){
  $_SESSION["login"] = $_POST["login"];
  $_SESSION["mdp"] = $_POST["mdp"];

 // header("location:home.php");
}

else {
  header("location:login.php?error=error");
}
?>

