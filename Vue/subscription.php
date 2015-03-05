
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
            <td><input type="number" name="preFix" placeholder="+33" class="pre"><input type="number" name="fix" class="phone"></td>
        </tr>
        <tr>
            <td><label>Date de naissance: </label></td>
            <td><input type="date" name="dateN" class="case"></td>
            <td><label>Téléphone portable</label></td>
            <td><input type="number" name="prePor" placeholder="+33" class="pre"><input type="number" name="por" class="phone"></td>
        </tr>
        <tr>
            <td><label>Adresse Mail: </label></td>
            <td><input type="text" name="mail" class="case"></td>
            <td></td>
        </tr>
        <tr>
            <td><label>Mot de passe: </label></td>
            <td><input type="password" name="password" class="case"></td>
        </tr>
        <tr>
            <td><label>Confirmation du mot de passe: </label></td>
            <td><input type="password" name="password_check" class="case"></td>
            <td></td>
        </tr>
        <tr>
            <td><label>Adresse de l'Entreprise</label></td>
            <td><input type="text" name="adr_1" class="case"></td>
            <td rows="2" cols="2"><input type="checkbox" name="Sub" value="true" checked="checked" class="case"><label> J'autorise ACME à m'envoyer des newsletter par mail et par SMS</label></td>
        </tr>
        <tr>
            <td>none</td>
            <td><input type="text" name="adr_2" class="case"></td>
            <td rows="2" cols="2"><input type="checkbox" name="Sub" value="true" checked="checked" class="case"><label>Je souhaite recevoir des informations liées à la licence et aux offres ACME</label></td>
        </tr>
        <tr>
            <td><label>Code postal</label></td>
            <td><input type="number" name="CP" class="case"></td>
            <td rowspan="2" colspan="2"><input type="submit" value="Valider" class="btn"></td>
        </tr>
        <tr>
            <td><label>Ville: </label></td>
            <td><input type="text" name="ville" class="case"></td>
        </tr>
    </table>
</form>
<div class="Warning" name="Warning"></div>
<script type="text/javascript" src="script/script_sub.js"></script>

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
                                                    $currentUser = new \Model\User($_POST['password'],$_POST['Pro'],$_POST['mail'],$_POST['Sub'],1, $_POST['nom'],$_POST['prenom'], $date, $adress, $_POST['CP'], $_POST['ville'], $_POST['entreprise'], $fix, $por);
                                                    $ID = $currentUser->saveUserDB();
                                                    $_SESSION['ID'] = $ID;
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