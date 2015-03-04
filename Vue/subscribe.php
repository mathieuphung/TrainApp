
<h2>Inscription</h2>
<form action="" method="POST" name="form" onsubmit="return checkForm();">
    <label>Adresse Mail: </label><input type="text" name="mail">
    <label>Mot de passe: </label><input type="password" name="password">
    <label>Confirmation du mot de passe: </label><input type="password" name="password_check">
    <label> Etes vous :</label>
    <br>
    <input type="radio" name="Pro" value="true" checked="checked"> Professionel
    <input type="radio" name="Pro" value="false" > Particulier
    <label>Souhaitez vous vous abonner à la newsletter? </label>
    <br>
    <input type="radio" name="Sub" value="true" checked="checked"><label>Oui</label>
    <input type="radio" name="Sub" value="false"><label>Non</label>

    <input type="submit">
</form>
<div class="Warning" name="Warning"></div>
<script type="text/javascript" src="../JS/script_log.js"></script>

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