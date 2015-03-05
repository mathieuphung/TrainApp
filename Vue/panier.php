<?php

$data = $_SESSION['Panier'];

foreach($data as $value){
    echo $value->getID();
    echo $value->getNom();
    echo $value->getDesc();
    echo $value->getPrix();
    echo $value->getStock();
    echo "<br><br>";
}
?>