<form>
    <label>Type: </label>
    <select name="statut">
        <option>Entreprise</option>
        <option>Particulier</option>
    </select>
    <label>Répondant au nom de: </label>
    <input type="text" placeholder="Indiquer Nom" name="nom">
    <label>Type de requete</label>
    <select name="type">
        <option>Demande d'aide</option>
        <option>Review</option>
    </select><input type="text">
    <label>Pour me contacter</label>
    <input type="text" name="Tel" placeholder="n° de téléphone">
    <input type="text" name="mail" placeholder="adresse mail">
    <textarea>
        <input type="submit">
</form>


<?php

require_once('../autoload.php');
require_once('../function/function.php');
session_start();

if(!empty($_POST)){
    if(!isset($_POST['nom'])){
        echo "Veuillez renseigner un nom";
    }else{
        if(!isset($_POST['tel'])){
            echo "Veuillez renseigner un numero de telephone";
        }else{
            if(!isset($_POST['mail'])){
                echo "Veuillez renseigner une adresse mail";
            }else{

            }
        }
    }
}

?>