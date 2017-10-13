<?php

require_once __DIR__."/controleur/controleur.php";

class Routeur{

	private $controleur;
	private $estConnecte = "";
	function __construct(){
	$this->controleur = new Controleur();

	}


	public function router_requete(){
		//on vérifie si un membre est connecté
		if(isset($_SESSION["nom"])){
			$this->estConnecte = $_SESSION["nom"];
		}
		//affichage de la liste de tous les jeux
			if(isset($_GET["liste_jeux"])){
				if(isset($_SESSION["grade"]))
				$this->controleur->afficherListeJeux($this->estConnecte,$_SESSION["grade"]);
			else $this->controleur->afficherListeJeux($this->estConnecte,"");

			}
			//si c'est la page login
			elseif(isset($_GET["login"])){
				$this->controleur->afficherLogin($this->estConnecte,"","");
			}
			//vérification du login
			elseif(isset($_GET["verifLogin"])){
				$this->controleur->verifLogin($_POST["login"],$_POST["mdp"],"");
				
			}
			//si le login est correct
			elseif(isset($_GET["loginOk"])){
				$_SESSION["login"] = $_GET["loginOk"];
				$_SESSION["nom"] = $_GET["nom"];
				$_SESSION["prenom"] = $_GET["prenom"];
				$_SESSION["email"] = $_GET["email"];
				$_SESSION["grade"] = $_GET["grade"];
				
		 		$this->estConnecte = $_SESSION["nom"];
				$this->controleur->afficherHome($this->estConnecte,$_SESSION["grade"]);
			}
			//si le login n'est pas correct
			elseif(isset($_GET["loginError"])){
				$this->controleur->afficherLogin($this->estConnecte,"",$_GET["loginError"]);
			}
			//se deconnecter
			elseif(isset($_GET["logout"])){
				session_unset();
				session_destroy();
				$this->controleur->afficherHome($this->estConnecte,"");
			}

			//afficher la page qui afficher les details du compte
			elseif(isset($_GET["monCompte"])  && isset($_SESSION["login"]) ){
				
				$this->controleur->afficherMonCompte($this->estConnecte,$_SESSION["prenom"],$_SESSION["login"],$_SESSION["email"],$_SESSION["grade"]);
			}

			//afficher la page qui afficher les details du compte
			elseif(isset($_GET["nouveauJeu"])  && isset($_SESSION["login"]) ){
				
				$this->controleur->afficherNouveauJeu($this->estConnecte,$_SESSION["grade"],"");
			}
			
			//insertion de jeu
			elseif(isset($_GET["insert_jeu"])){
				if (empty($_POST["nom"]) OR empty($_POST["genre"]) OR empty($_POST["image"])) {
					$error = "Tout les champs sont obligatoire";
					$this->controleur->afficherNouveauJeu($this->estConnecte,$_SESSION["grade"],$error);
				}
				else{

					 $this->controleur->insertJeu($_POST["nom"],$_POST["genre"],$_POST["image"]);
					 echo 'size of '.sizeof($_POST['options']);
					for($i=0;$i<=sizeof($_POST['options']);$i++)
					  {
					  	$this->controleur->insertType($_POST['options'][$i]);
					  }

					  	$this->controleur->afficherHome($this->estConnecte,$_SESSION["grade"]);
				}	
				
				
			}

			//afficher la page qui afficher les details du compte
			elseif(isset($_GET["supprimer"])  && isset($_SESSION["login"]) ){
				
				$this->controleur->suppJeu($_POST["supprimer"]);
				$this->controleur->afficherListeJeux($this->estConnecte,$_SESSION["grade"]);
			}

			//afficher la page qui afficher les details du compte
			elseif(isset($_GET["inscription"]) ){
				
				$this->controleur->afficherInscription($this->estConnecte,$_SESSION["grade"],"");
			}


			//afficher la page qui afficher les details du compte
			elseif(isset($_GET["insert_user"]) ){
				
				if (empty($_POST["prenom"]) OR empty($_POST["nom"]) OR empty($_POST["login"]) OR empty($_POST["email"]) OR empty($_POST["pwd"]) OR empty($_POST["pwd2"]) OR $_POST["pwd"] != $_POST["pwd2"]) {
					$error = "Tous les champs sont obligatoires";

					$this->controleur->afficherInscription($this->estConnecte,$_SESSION["grade"],$error);
				}
				else{
					$this->controleur->create_user($_POST["nom"],$_POST["prenom"],$_POST["login"],$_POST["pwd"],$_POST["email"],"user");
					$this->controleur->afficherHome($this->estConnecte,$_POST["nom"]);
				}
			}





		else{// affichage de la page d'accueil
			$this->controleur->afficherHome($this->estConnecte,"");
		}

	}


}


//if(isset($_SESSION["login"])){
	

//	$controleur->afficherHome($_SESSION["login"]);
//}
//else{
 	
//}
?>