<?php

require_once __DIR__."/modele/DAO_user.php";

require_once __DIR__."/modele/DAO_jeuxVideo.php";

	 $dao= new DAO_jeuxVideo();
	 $list = $dao->get_jeu(2);
	 echo "nom img ".$list->get_img();

	/* for($i=0;$i<count($list);$i++){
      echo "test ".$list[$i]->get_nom() ." , le mot de passe : ".md5($list[$i]->get_mdp()). ", mot de passe non crypté : ".$list[$i]->get_mdp();
    }*/
	;

?>