<?php

class User {
	private $id;
	private $nom;
	private $prenom;
	private $login;
	private $mdp;
	private $email;
	private $grade;



	function __construct($i, $n, $p, $l, $m, $e, $g){
		$this->id = $i;
		$this->nom = $n;
		$this->prenom = $p;
		$this->login = $l;
		$this->mdp = $m;
		$this->email = $e;
		$this->grade = $g;
	}

	public function get_nom(){
		return $this->nom;
	}

	public function set_name($n){
		$this->nom = $n;
	}

	public function get_prenom(){
		return $this->prenom;
	}

	public function set_prenom($s){
		$this->prenom = $s;
	}

	public function get_login(){
		return $this->login;
	}

	public function set_login($n){
		$this->login = $n;
	}

	public function get_id(){
		return $this->id;
	}

	public function set_id($n){
		$this->id = $n;
	}

	public function get_email(){
		return $this->email;
	}

	public function set_email($n){
		$this->email = $n;
	}

	public function get_grade(){
		return $this->grade;
	}

	public function set_grade($n){
		$this->grade = $n;
	}

	public function get_mdp(){
		return $this->mdp;
	}
}


?>