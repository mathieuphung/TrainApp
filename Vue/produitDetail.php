<?php
require_once('../autoload.php');
require_once('../function/function.php');
session_start();

if(isset($_GET['page']) || isset($_POST)){
    if(!isset($_POST)) {
        $data = \Model\Produit::getProduitById($_GET['page']);
        $currentProduit = new \Model\Produit($data['ID'], $data['Nom'], $data['Desc'], $data['Prix'], $data['Stock']);

        ?>
        <input type="hidden" name="Produit" value="<?php $currentProduit; ?>">
        <input type="submit">


    <?php
    }else{
        $_SESSION['Panier']->addProduct($_POST['Produit']);
    }
    $currentProduit->getID();
    $currentproduit->getNom();
    $currentproduit->getDesc();
    $currentproduit->getPrix();
    $currentproduit->getStock();
}else{
    //redirection
}

?>