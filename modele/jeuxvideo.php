<?php

class JeuxVideo {
	private $id;
	private $nom;
	private $categorie_id;
	private $typejeux_id;
	private $dateinsertion;
	private $datemaj;
	private $img;


	function __construct($i, $n, $p, $l, $m, $e,$i){
		$this->id = $i;
		$this->nom = $n;
		$this->categorie_id = $p;
		$this->typejeux_id = $l;
		$this->dateinsertion = $m;
		$this->datemaj = $e;
		$this->img = $i;
	}

	public function get_nom(){
		return $this->nom;
	}

	public function set_nom($n){
		$this->nom = $n;
	}

	public function get_categorie_id(){
		return $this->categorie_id;
	}

	public function set_categorie_id($s){
		$this->categorie_id = $s;
	}

	public function get_typejeux_id(){
		return $this->typejeux_id;
	}

	public function set_typejeux_id($n){
		$this->typejeux_id = $n;
	}

	public function get_dateinsertion(){
		return $this->dateinsertion;
	}

	public function set_dateinsertion($n){
		$this->dateinsertion = $n;
	}

	public function get_datemaj(){
		return $this->datemaj;
	}

	public function set_datemaj($n){
		$this->datemaj = $n;
	}

	public function get_id(){
		return $this->id;
	}

	public function set_id($n){
		$this->id = $n;
	}

	public function get_img(){
		return $this->img;
	}

	public function set_img($n){
		$this->img = $n;
	}

}


?>