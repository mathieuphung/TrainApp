<?php

namespace Model;

class Produit extends Factory{
    private $ID;
    private  $Nom;
    private $Desc;
    private $Prix;
    private $Stock;

    public function __construct($ID, $Nom, $Desc, $Prix, $Stock){
        $this->ID = $ID;
        $this->Nom = $Nom;
        $this->Desc = $Desc;
        $this->Prix = $Prix;
        $this->Stock = $Stock;
    }

    public function getID(){
        return $this->ID;
    }

    public function getNom(){
        return $this->Nom;
    }

    public function getDesc(){
        return $this->Desc;
    }

    public function getPrix(){
        return $this->Prix;
    }

    public function getStock(){
        return $this->Stock;
    }

    public function setID($ID){
        $this->ID = $ID;
    }

    public function setNom($Nom){
        $this->Nom = $Nom;
    }

    public function setDesc($Desc){
        $this->Desc = $Desc;
    }

    public function setPrix($Prix){
        $this->Prix = $Prix;
    }

    public function setStock($Stock){
        $this->Stock = $Stock;
    }

    public static function getAllProduit(){
        $stmt = self::getMySqlConnexion()->prepare("SELECT * FROM produit");
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public static function getProduitById($ID){
        $stmt = self::getMysqlConnexion()->prepare("SELECT * FROM produit WHERE ID=:ID");
        $stmt->bindParam(':ID', $ID);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }
}

?>