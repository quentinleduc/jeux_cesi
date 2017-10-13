<?php

require_once __DIR__."/../modele/DAO_jeuxVideo.php";
require_once __DIR__."/../modele/DAO_user.php";
require_once __DIR__."/../vue/vues.php";

 class Controleur{
	private $dao_user;
	private $dao_jeuxVideo;
	private $vue;

	function __construct(){
		$this->dao_user = new DAO_user();
		$this->dao_jeuxVideo = new DAO_jeuxVideo();
		$this->vue = new Vues();
	}

	//pour afficher le menu 
	// $user est pour verifier si un membre est connecté ou non 
	public function afficherHome($user,$grade){
		$this->vue->entete($user,$grade);
		$liste= $this->dao_jeuxVideo->get_N_premiers_jeux(4);
		$this->vue->afficherHome($user,$liste);
	}

	//pour afficher la liste de tous les jeux
	public function afficherListeJeux($user,$grade){
		$this->vue->entete($user,$grade);
		$liste= $this->dao_jeuxVideo->get_all_jeux();
		$this->vue->afficherListeJeux($liste,$grade);
	}
	// pour afficher la page de connexin login 
	public function afficherLogin($user,$grade,$error){
		$this->vue->entete($user,$grade);
		$this->vue->afficherLogin($error);
	}

	// vérifie si le login existe
	public function verifLogin($login,$mdp,$error){
		
		$user = $this->dao_user->get_user($login,$mdp);

		if($login == $user->get_login() && $mdp == $user->get_mdp() ) {
		  
		  header("location:testmvc.php?nom=".$user->get_nom().'&prenom='.$user->get_prenom().'&loginOk='.$user->get_login().'&email='.$user->get_email().'&grade='.$user->get_grade());
		}
		else {
			$error = "Votre login et/ou votre mdp sont incorrects";
  			header("location:testmvc.php?loginError=".$error);
		}

	}

	public function afficherMonCompte($user,$prenom,$login,$email,$grade){
		$this->vue->entete($user,$grade);
		$this->vue->afficherMonCompte($user,$prenom,$login,$email,$grade);

	}

	public function afficherNouveauJeu($user,$grade,$error){
		$listeCat = $this->dao_jeuxVideo->get_all_categories();
		$listeType = $this->dao_jeuxVideo->get_all_types();
		$this->vue->entete($user,$grade);
		$this->vue->afficherNouveauJeu($listeCat,$listeType,$error);
	}

	public function insertJeu($nom,$genre,$image){
		 $this->dao_jeuxVideo->create_jeux($nom,$genre,$image);

	}

	public function insertType($idType){
		 $this->dao_jeuxVideo->insertType($idType);

	}

	public function suppJeu($id){
		$listeType = $this->dao_jeuxVideo->delete_jeu($id);
	}

	public function afficherInscription($user,$grade,$error){
		$this->vue->entete($user,$grade);
		$this->vue->afficherInscription($error);
	}

	public function create_user($nom, $prenom, $login, $mdp , $email, $grade){
		$this->dao_user->create_user($nom, $prenom, $login, $mdp , $email, $grade);
	}







}





?>