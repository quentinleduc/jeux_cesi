<?php

// Exception relative à un probleme d'accès à une table
class TableAccesException extends Exception{
  private $chaine;
  public function __construct($chaine){
    $this->chaine=$chaine;
  }

  public function afficher(){
    return $this->chaine;
  }
}

?>