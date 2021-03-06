<?php
require_once __DIR__."/jeuxvideo.php";

class DAO_jeuxVideo{
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

  $jeu= new JeuxVideo($result["JV_id"],$result["JV_Nom"],$result["JV_Categorie_id"],	$result["JV_Date_insert"],$result["JV_Date_update"],$result["JV_Image"]);
   
    return $jeu;
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
    array_push($result_jeux, new JeuxVideo($elem["JV_id"],$elem["JV_Nom"],$elem["JV_Categorie_id"],  $elem["JV_Date_insert"],$elem["JV_Date_update"],$elem["JV_Image"]));
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
    for($i=0; $i<$n; $i++){
    array_push($result_jeux, new JeuxVideo($result[$i]["JV_id"],$result[$i]["JV_Nom"],$result[$i]["JV_Categorie_id"], $result[$i]["JV_Date_insert"],$result[$i]["JV_Date_update"],$result[$i]["JV_Image"]));
  }
  }
  else{// sinon on charge les données présentes 
    foreach ($result as $elem) {
    array_push($result_jeux, new JeuxVideo($elem["JV_id"],$elem["JV_Nom"],$elem["JV_Categorie_id"] , $elem["JV_Date_insert"],$elem["JV_Date_update"],$elem["JV_Image"]));
  }
  }
  
   
    return $result_jeux;
}

// fonction qui crée un jeux video

public function create_jeux($nom, $categorie,$image){
  try{
    $sth = $this->connexion->prepare("SELECT MAX(JV_id) as JV_id FROM jeuxvideo");
    $sth->execute();
    $result = $sth->fetch();
    $id = $result["JV_id"] + 1;
    echo " id jeu ".$id;

  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
  try{
    $sth = $this->connexion->prepare("SELECT CAT_id FROM categorie WHERE CAT_Nom = \"".$categorie."\"");
    $sth->execute();
    $result_CAT = $sth->fetch();
    $cat_id = $result_CAT["CAT_id"];
    echo ' id cat'.$cat_id;
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }

  try{
   $sth = $this->connexion->prepare("INSERT INTO `jeuxvideo`(`JV_id`,`JV_Nom`, `JV_Categorie_id`, `JV_Date_insert`, `JV_Image`) VALUES (\"".$id."\",\"".$nom."\",\"".$cat_id."\" now(), \"".$image."\")");
}
catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
  }


  public function insertType($idType){
    

  try{
    $sth = $this->connexion->prepare("SELECT MAX(JV_id) as JV_id FROM jeuxvideo");
    $sth->execute();
    $result = $sth->fetch();
    $id = $result["JV_id"] + 1;
    echo " id type ".$id;
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }

   try{
   $sth = $this->connexion->prepare("INSERT INTO `jv_tjv`(`JV_TJV_JeuxV_id`, `JV_TJV_TypeJ_id`) VALUES (\"".$id."\",\"".$idType."\" )");
}
catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
}
/*
public function create_jeux($nom, $categorie, $typeJeux,$img){
  try{
    $sth = $this->connexion->prepare("INSERT INTO `jeuxvideo`(`JV_Nom`, `JV_Categorie_id`, `JV_Type_jeux_id`, `JV_Date_insert`, `JV_Date_update`, `JV_Image`) VALUES (\"".$nom."\",\"".$categorie."\",\"".$typeJeux."\", now() , now(), \"".$img."\" )");

    $sth->execute();
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
}*/

//fonction qui supprime un jeux
public function delete_jeu($id)
{
  try{
    $sth = $this->connexion->prepare("DELETE  FROM `jv_tjv` WHERE `JV_TJV_JeuxV_id` = ".$id);
    $sth->execute();
  }

  catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }
  
  try{
    $sth = $this->connexion->prepare("DELETE  FROM `jeuxvideo` WHERE `JV_id` = ".$id);
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


  //fonction qui retourne toutes les catégories de jeu
public function get_all_categories(){
  $result = array();
  $result_jeux = array();
  try{
    
    $sth = $this->connexion->prepare("SELECT  CAT_Nom FROM categorie ");
    $sth->execute();
    $result = $sth->fetchAll();
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }

  foreach ($result as $elem) {
    array_push($result_jeux, array('CAT_Nom' => $elem["CAT_Nom"]));
  }
    return $result_jeux;
}

//fonction qui retourne toutes les supports de jeu
public function get_all_types(){
  $result = array();
  $result_jeux = array();
  try{
    
    $sth = $this->connexion->prepare("SELECT  TJV_id, TJV_Nom FROM typejeux ");
    $sth->execute();
    $result = $sth->fetchAll();
  }
 catch (TableAccesException $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
  }

  foreach ($result as $elem) {
    array_push($result_jeux, array('TJV_id'=>$elem["TJV_id"],'TJV_Nom'=>$elem["TJV_Nom"]));
  }
    return $result_jeux;
}

}




?>