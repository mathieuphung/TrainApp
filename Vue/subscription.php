<head><link href="../Vue/style/login.css" type="text/css" rel="stylesheet"></head>

<h2>Inscription</h2>
<form action="" method="POST" name="form" onsubmit="return checkForm();">
<table>
    <tr>
        <td><label>Nom: </label></td>
        <td><input type="text" name="nom" class="case"></td>
        <td><label>Entreprise: </label></td>
        <td><input type="text" name="entreprise" class="case"></td>
    </tr>
    <tr>
        <td><label>Prénom: </label></td>
        <td><input type="text" name="prenom" class="case"></td>
        <td><label>Téléphone fixe: </label></td>
        <td><input type="number" name="preFix" placeholder="+33" class="pre"><input type="number" name="fix" class="case"></td>
    </tr>
    <tr>
        <td><label>Date de naissance: </label></td>
        <td><input type="date" name="dateN" class="case"></td>
        <td><label>Téléphone portable</label></td>
        <td><input type="number" name="prePor" placeholder="+33" class="pre"><input type="number" name="por" class="case"></td>
    </tr>
    <tr>
        <td><label>Adresse Mail: </label></td>
        <td><input type="text" name="mail" class="case"></td>
        <td rows="2" cols="2"><input type="checkbox" name="Sub" value="true" checked="checked" class="case"><label> J'autorise ACME à m'envoyer des newsletter par mail et par SMS</label></td>
    </tr>
    <tr>
        <td><label>Mot de passe: </label></td>
        <td><input type="password" name="password" class="case"></td>
    </tr>
    <tr>
        <td><label>Confirmation du mot de passe: </label></td>
        <td><input type="password" name="password_check" class="case"></td>
        <td rows="2" cols="2"><input type="checkbox" name="Sub" value="true" checked="checked" class="case"><label>Je souhaite recevoir des informations liées à la licence et aux offres ACME</label></td>
    </tr>
    <tr>
        <td><label>Adresse de l'Entreprise</label></td>
        <td><input type="text" name="adr_1" class="case"></td>
    </tr>
    <tr>
        <td>none</td>
        <td><input type="text" name="adr_2" class="case"></td>
    </tr>
    <tr>
        <td><label>Code postal</label></td>
        <td><input type="number" name="CP" class="case"></td>
        <td rowspan="2" colspan="2"><input type="submit" value="Valider" class="case"></td>
    </tr>
    <tr>
        <td><label>Ville: </label></td>
        <td><input type="text" name="ville" class="case"></td>
    </tr>
</table>
</form>
<div class="Warning" name="Warning"></div>
<script type="text/javascript" src="script/script_log.js"></script>

<?php

if(!empty($_POST)){
    if(!isset($_POST['mail'])){
        echo "Veuillez renseigner une adrese mail";
    }else{
        if(!isset($_POST['password']) && !isset($_POST['password_check'])){
            echo "Veuillez renseigner un mot de passe";
        }else{
            if($_POST['password'] != $_POST['password_check']){
                echo "les mot de passe ne correspondent pas";
            }else{
                $User = new \Model\User(sha1($_POST['password']),$_POST['Pro'],$_POST['mail'],$_POST['Sub'], ip_info($_SERVER['REMOTE_ADDR']));
            }
        }
    }

}

?>