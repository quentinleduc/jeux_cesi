<?php

require_once __DIR__."/modele/DAO_user.php";

require_once __DIR__."/modele/DAO_jeuxVideo.php";

	 $dao= new DAO_jeuxVideo();
	 $listeCat = $dao->get_all_jeux();
	 $listeType = $dao->get_all_types();

	 for($i=0;$i<count($listeCat);$i++){
      echo "test  id".$listeCat[$i]->get_id() ." , ";
  }
 //   }
 /*
      var_dump($listeType);
    foreach ($listeType as $key=> $v) {
 		 echo "Clé: ". $key . " <br/ >";
 		 foreach ($v as $k => $value) {
 		 	echo " nom champs ". $key[$k] . ' valeur '.$value;
 		 }

	}


	for($i=0;$i<count($listeType);$i++){
					
					echo $listeType[$i]["TJV_Nom"].'<input id="checkBox"  type="checkbox" name=options[]  value='.$listeType[$i]["TJV_id"].'>
					<label for="'.$listeType[$i]["TJV_Nom"].'"> <br>';
				}*/
	

?>