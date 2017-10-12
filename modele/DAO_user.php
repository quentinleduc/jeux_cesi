<?php
require_once __DIR__."/user.php";
require_once __DIR__."/../include/Exceptions/TableAccessException.php";
require_once __DIR__."/../include/Exceptions/ConnexionException.php";

class DAO_user{
  private $connexion;



public function __construct(){
  try{
      //$chaine="mysql:host=localhost;dbname=E134935T";
      $this->connexion = new PDO('mysql:host=localhost;dbname=projet_web_jv;charset=utf8',"root","");
      // pour la prise en charge des exceptions par PHP
      $this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     }
    catch(PDOException $e){
      $exception=new ConnexionException("problème de connection à la base");
      throw $exception;
    }
}

// fonction qui permet de se deconnecter de la base
public function deconnexion(){
   $this->connexion = null;
}

// fonction qui retourne un utilisateur
public function get_user($user,$mdp){
  $result = array();
  $result_user = array();
  try{
    $sth = $this->connexion->prepare("SELECT  * FROM `Utilisateur` WHERE `UTI_Login` = \"".$user."\" AND `UTI_Password` = \"".$mdp."\"");
    echo  "SELECT  * FROM `Utilisateur` WHERE `UTI_Login` = \"".$user."\" AND `UTI_Password` = \"".$mdp."\"";
    $sth->execute();
    $result = $sth->fetch();
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }

  array_push($result_user, new User($result["UTI_id"],$result["UTI_Nom"],$result["UTI_Prenom"],$result["UTI_Login"],
    $result["UTI_Password"],$result["UTI_Email"],$result["UTI_Grade"]));
   
    return $result_user;
}

//fonction qui retourne tous les utilisateurs
public function get_all_users(){
  $result = array();
  $result_user = array();
  try{
    
    $sth = $this->connexion->prepare("SELECT * FROM `Utilisateur`");
    $sth->execute();
    $result = $sth->fetchAll();
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }

  foreach ($result as $elem) {
    array_push($result_user, new User($elem["UTI_id"],$elem["UTI_Nom"],$elem["UTI_Prenom"],$elem["UTI_Login"],
  	$elem["UTI_Password"],$elem["UTI_Email"],$elem["UTI_Grade"]));
  }
    return $result_user;
}


/* fonction qui permets de récuperer les n premiers utilisateurs*/
public function get_N_premiers_users($n){
  $result_user = array();
  $result = array();
  try{
   
    $sth = $this->connexion->prepare("SELECT * FROM `Utilisateur` ORDER BY `UTI_id` DESC");
    $sth->execute();
    $result = $sth->fetchAll();
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }

  // si le chiffre rentré est inférieur au nombre de résultats
  if($n < count($result)){
    for($i=0; $i<$n; $i++){//alors on récuppere le nombre de résultat demandé
      array_push($result_user, new User($result["UTI_id"],$result["UTI_Nom"],$result["UTI_Prenom"],$result["UTI_Login"],
  		$result["UTI_Password"],$result["UTI_Email"],$result["UTI_Grade"]));
    }
  }
  else{// sinon on charge les données présentes 
    for($i=0; $i<count($result); $i++){
      array_push($result_user, new User($result["UTI_id"],$result["UTI_Nom"],$result["UTI_Prenom"],$result["UTI_Login"],
  		$result["UTI_Password"],$result["UTI_Email"],$result["UTI_Grade"]));
    }
  }
  
   
    return $result_user;
}

// fonction qui crée un utilisateur
public function create_user($nom, $prenom, $login, $mdp , $email, $grade){
  try{
    $sth = $this->connexion->prepare("INSERT INTO `Utilisateur`(`UTI_nom`, `UTI_Prenom`, `UTI_Login`, `UTI_Password`, `UTI_Email`, `UTI_Grade`) VALUES (\"".$nom."\",\"".$prenom."\",\"".$login."\",\"".$mdp."\",\"".$email."\",
		\"".$grade."\")");
    $sth->execute();
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
}

//fonction qui supprime un utilisateur
public function delete_user($id)
{
  try{
    $sth = $this->connexion->prepare("DELETE  FROM `Utilisateur` WHERE `UTI_id` = \"".$id."\"");
    $sth->execute();
  }
  catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
 catch(PDOException $e){
    $exception=new ConnexionException("problème de connection à la base");
    throw $exception;
  }

}

/*
public function update($id)
{
  
  try{
    $sth = $this->connexion->prepare("update Utilisateur set nb_like = nb_like +".$l." where id= ".$id.";");
    $sth->execute();
  }
  catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
 catch(PDOException $e){
    $exception=new ConnexionException("problème de connection à la base");
    throw $exception;
  }

}*/




}




?>