<?php

require_once('../autoload.php');
require_once('../function/function.php');
session_start();

$data = \Model\Produit::getAllProduit();
$i = 0;
$Produit = Array();
while($i <= count($data)){
    $produit.$i = new \Model\Produit($data[$i]['ID'],$data[$i]['Nom'],$data[$i]['Desc'],$data[$i]['Prix'],$data[$i]['Stock']);
    array_push($Produit,$produit.$i);
}

foreach($Produit as $produit){
    echo $produit->getID;
    echo $produit->getNom;
    echo $produit->getDesc;
    echo $produit->getPrix;
    echo $produit->getStock;
    echo "<br><br>";
}


?>