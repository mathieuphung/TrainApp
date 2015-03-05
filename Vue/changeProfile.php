<?php

require_once('../autoload.php');
require_once('../function/function.php');
session_start();
$data = \Model\User::getUserByID(10);
$currentUser = new \Model\User(Null,$data['Professionel'],$data['Mail'],$data['Abonne'],$data['PaysID'],$data['nom'],$data['prenom'],$data['birthsday'], $data['adresse'], $data['codePostal'], $data['ville'], $data['entreprise'], $data['telFix'], $data['telPort']);


?>

<form action="" method="POST" name="form">
    <table>
        <tr>
            <td><label>Nom: </label></td>
            <td><input type="text" name="nom" value = "<?php $currentUser->getNom(); ?>" placeholder= "<?php $currentUser->getNom(); ?>"></td>
            <td><label>Entreprise: </label></td>
            <td><input type="text" name="entreprise" value = "<?php $currentUser->getEntreprise(); ?>"" placeholder= "<?php $currentUser->getEntreprise(); ?>"</td>
        </tr>
        <tr>
            <td><label>Prénom: </label></td>
            <td><input type="text" name="prenom" value = "<?php $currentUser->getPrenom(); ?>" placeholder= "<?php $currentUser->getPrenom(); ?>"></td>
            <td><label>Téléphone fixe: </label></td>
            <td><input type="number" name="preFix" value = "<?php substr($currentUser->getFix(),0,3); ?>" placeholder= "<?php substr($currentUser->getFix(),0,3); ?>"><input type="number" name="fix" value = "<?php substr($currentUser->getFix(),3,12); ?>" placeholder= "<?php substr($currentUser->getFix(),3,12); ?>""></td>
        </tr>
        <tr>
            <td><label>Date de naissance: </label></td>
            <td><input type="date" name="dateN" value = "<?php $currentUser->getDate(); ?>" placeholder= "<?php $currentUser->getDate(); ?>"></td>
            <td><label>Téléphone portable</label></td>
            <td><input type="number" name="prePor" value = "<?php substr($currentUser->getPor(),0,3); ?>" placeholder= "<?php substr($currentUser->getPor(),0,3); ?>"><input type="number" name="por" value = "<?php substr($currentUser->getPor(),3,12); ?>" placeholder= "<?php substr($currentUser->getPor(),3,12); ?>"></td>
        </tr>
        <tr>
            <td><label>Adresse Mail: </label></td>
            <td><input type="text" name="mail" value = "<?php $currentUser->getMail(); ?>" placeholder= "<?php $currentUser->getMail(); ?>"></td>
            <td rows="2" cols="2"><input type="checkbox" name="Sub" value="true" checked="checked"><label> J'autorise ACME à m'envoyer des newsletter par mail et par SMS</label></td>
        </tr>
        <tr>
            <td><label>Mot de passe: </label></td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td><label>Confirmation du mot de passe: </label></td>
            <td><input type="password" name="password_check"></td>
            <td rows="2" cols="2"><input type="checkbox" name="trash" value="true" checked="checked"><label>Je souhaite recevoir des informations liées à la licence et aux offres ACME</label></td>
        </tr>
        <tr>
            <td><label>Adresse de l'Entreprise</label></td>
            <td><input type="text" name="adr_1" value = "<?php $currentUser->getAdresse(); ?>" placeholder= "<?php $currentUser->getAdresse(); ?>"></td>
        </tr>
        <tr>
            <td>none</td>
            <td><input type="text" name="adr_2"></td>
        </tr>
        <tr>
            <td><label>Code postal</label></td>
            <td><input type="number" name="CP" value = "<?php $currentUser->getCP(); ?>" placeholder= "<?php $currentUser->getCP(); ?>"</td>
            <td rowspan="2" colspan="2"><input type="submit" value="Valider"></td>
        </tr>
        <tr>
            <td><label>Ville: </label></td>
            <td><input type="text" name="ville"></td>
        </tr>
    </table>
    <input  type="hidden" name="Pro" value="1">
</form>

<?php
if(!empty($_POST)){
    if(!isset($_POST['mail'])){
        echo "Veuillez renseigner une adrese mail";
    }else{
        if(!isset($_POST['password']) || !isset($_POST['password_check'])){
            echo "Veuillez renseigner un mot de passe";
        }else{
            if($_POST['password'] != $_POST['password_check']){
                echo "les mot de passe ne correspondent pas";
            }else{
                if(!isset($_POST['nom'])){
                    echo "Veuillez renseigner un nom";
                }else{
                    if(!isset($_POST['prenom'])){
                        echo "Veuillez renseigner un prenom";
                    }else{
                        if(!isset($_POST['dateN'])){
                            echo "Veuillez renseigner une date de naisance";
                        }else{
                            if(!isset($_POST['adr_1']) || !isset($_POST['adr_2'])){
                                echo "veuillez renseigner une adresse";
                            }else{
                                if(!isset($_POST['CP'])){
                                    echo "Veuillez renseigner un code postal";
                                }else{
                                    if(!isset($_POST['ville'])){
                                        echo "Veuillez renseigner une ville";
                                    }else{
                                        if(!isset($_POST['entreprise'])){
                                            echo "Veuillez renseigner lle nom de votre entreprise";
                                        }else{
                                            if(!isset($_POST['preFix']) || !isset($_POST['fix'])){
                                                echo "Veuillez renseigner votre numero de telephone";
                                            }else{
                                                if(!isset($_POST['prePor']) || !isset($_POST['por'])){
                                                    echo "Veuillez renseigner votre numéro de téléphone portable";
                                                }else{
                                                    $adress = $_POST['adr_1']." ".$_POST['adr_2'];
                                                    if(substr($_POST['preFix'],0,1) != "+"){
                                                        $_POST['preFix'] = "+".$_POST['preFix'];
                                                    }
                                                    if(substr($_POST['prePor'],0,1) != "+"){
                                                        $_POST['prePor'] = "+".$_POST['prePor'];
                                                    }
                                                    if($_POST['Sub'] == "true"){
                                                        $_POST['Sub'] = 1;
                                                    }else{
                                                        $_POST['Sub'] = 0;
                                                    }
                                                    $fix = $_POST['preFix'].$_POST['fix'];
                                                    $por = $_POST['prePor'].$_POST['por'];
                                                    $date = substr($_POST['dateN'],-4,4)."-".substr(($_POST['dateN']),3,2)."-".substr($_POST['dateN'],0,2);
                                                    //ip_info($_SERVER["REMOTE_ADDR"])
                                                    $changedUser = new \Model\User($_POST['password'],$_POST['Pro'],$_POST['mail'],$_POST['Sub'],1, $_POST['nom'],$_POST['prenom'], $date, $adress, $_POST['CP'], $_POST['ville'], $_POST['entreprise'], $fix, $por);
                                                    $changedUser->changeUser(10);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

}

?>