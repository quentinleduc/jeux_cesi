<?php

require_once __DIR__."/modele/DAO_user.php";
	 $dao= new DAO_user();
	 $list = $dao->get_all_users();

	 for($i=0;$i<count($list);$i++){
      echo "test ".$list[$i]->get_nom() ." , le mot de passe : ".md5($list[$i]->get_mdp()). ", mot de passe non crypté : ".$list[$i]->get_mdp();
    }
	;

?>