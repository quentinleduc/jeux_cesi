<?php
require_once __DIR__."/jeuxvideo.php";
require_once __DIR__."/../include/Exceptions/TableAccessException.php";
require_once __DIR__."/../include/Exceptions/ConnexionException.php";

class DAO{
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

// fonction qui retourne un jeu
public function get_jeu($id){
  $result = array();
  $result_jeux = array();
  try{
    $sth = $this->connexion->prepare("SELECT  * FROM `jeuxvideo` WHERE `JV_id` = \"".$id."\"");
    $sth->execute();
    $result = $sth->fetch();
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }

  array_push($result_jeux, new JeuxVideo($result["JV_id"],$result["JV_Nom"],$result["JV_Categorie_id"],$result["JV_Type_jeux_id"],	$result["JV_Date_insert"],$result["JV_Date_update"]));
   
    return $result_jeux;
}

//fonction qui retourne tous les jeux
public function get_all_jeux(){
  $result = array();
  $result_jeux = array();
  try{
    
    $sth = $this->connexion->prepare("SELECT * FROM `jeuxvideo`");
    $sth->execute();
    $result = $sth->fetchAll();
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }

  foreach ($result as $elem) {
    array_push($result_jeux, new JeuxVideo($elem["JV_id"],$elem["JV_Nom"],$elem["JV_Categorie_id"],$elem["JV_Type_jeux_id"],  $elem["JV_Date_insert"],$elem["JV_Date_update"]));
  }
    return $result_jeux;
}


/* fonction qui permets de récuperer les n premiers jeux*/
public function get_N_premiers_jeux($n){
  $result_jeux = array();
  $result = array();
  try{
   
    $sth = $this->connexion->prepare("SELECT * FROM `jeuxvideo` ORDER BY `JV_id` DESC");
    $sth->execute();
    $result = $sth->fetchAll();
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }

  // si le chiffre rentré est inférieur au nombre de résultats
  if($n < count($result)){
    for($i=0; $i<$n; $i++){//alors on récuppere le nombre de résultat demandé
      array_push($result_jeux, new JeuxVideo($elem["JV_id"],$elem["JV_Nom"],$elem["JV_Categorie_id"],$elem["JV_Type_jeux_id"],  $elem["JV_Date_insert"],$elem["JV_Date_update"]));
    }
  }
  else{// sinon on charge les données présentes 
    for($i=0; $i<count($result); $i++){
      array_push($result_jeux, new JeuxVideo($elem["JV_id"],$elem["JV_Nom"],$elem["JV_Categorie_id"],$elem["JV_Type_jeux_id"],  $elem["JV_Date_insert"],$elem["JV_Date_update"]));
    }
  }
  
   
    return $result_jeux;
}

// fonction qui crée un jeux video
public function create_jeux($nom, $categorie, $typeJeux){
  try{
    $sth = $this->connexion->prepare("INSERT INTO `jeuxvideo`(`JV_Nom`, `JV_Categorie_id`, `JV_Type_jeux_id`, `JV_Date_insert`, `JV_Date_update`) VALUES (\"".$nom."\",\"".$categorie."\",\"".$typeJeux."\", now() , now() )");
    $sth->execute();
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
}

//fonction qui supprime un jeux
public function delete_user($id)
{
  try{
    $sth = $this->connexion->prepare("DELETE  FROM `jeuxvideo` WHERE `JV_id` = \"".$id."\"");
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

//fonction qui met à jour un jeux
public function update_jeux($id,$nom,$cat,$typeJeux)
{
  
  try{
    $sth = $this->connexion->prepare("update jeuxvideo set JV_Nom ='".$nom."' , JV_Categorie_id =".$cat." , JV_Type_jeux_id = ".$typeJeux."  JV_Date_update = now() where JV_id= ".$id.";");
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




}




?>