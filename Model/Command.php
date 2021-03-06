<?php

namespace Model;

class Command extends Factory{
    private $ID;
    private $Produit = Array();
    private $User;
    private $Quantite;
    private $Date;

    public function __construct(){

    }

    public function getID(){
        return $this->ID;
    }

    public function getProduit(){
        return $this->Produit;
    }

    public function getUser(){
        return $this->User;
    }

    public function getQuantite(){
        return $this->Quantite;
    }

    public function getDate(){
        return $this->Date;
    }

    public function setID($ID){
        $this->ID = $ID;
    }

    public function setProduit($Produit){
        $this->Produit = $Produit;
    }

    public function setUser($User){
        $this->User = $User;
    }

    public function setQuantite($Quantite){
        $this->Quantite = $Quantite;
    }

    public function setDate($Date){
        $this->Date = $Date;
    }

    public function addProduit(Produit $produit){
        array_push($this->Produit,$produit);
    }

    //public function
}

?>