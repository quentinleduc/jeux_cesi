<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);

if($_POST["login"] == "admin" && $_POST["mdp"] == "azerty"){
  $_SESSION["login"] = $_POST["login"];
  $_SESSION["mdp"] = $_POST["mdp"];

  header("location:home.php");
}

else {
  header("location:login.php?error=error");
}
?>

