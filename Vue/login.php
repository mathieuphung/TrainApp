<h2>Se connecter</h2>
<form action="" method="POST" name="form">
    <label>Adresse mail: </label><input type="text" name="mail" class="case"><br>
    <label>Mot de passe: </label><input type="password" name="password" class="case"><br>
    <input type="submit" class="btn">
</form>

<?php
require_once('../autoload.php');

use Model\Factory;
use Model\User;
use Model\Command;
use Model\Feedback;


if(!empty($_POST)){
    if(!isset($_POST['mail'])){
        echo "Veuillez renseigner une adresse mail";
    }else{
        if(!isset($_POST['password'])){
            echo "Veuillez renseigner un mot de passe";
        }else {

            $user = \Model\User::checkUserExist($_POST['mail'], $_POST['password']);
            if($user['result'] == true){
                $_SESSION['ID'] = $user['ID'];
            }else{
                echo "Aucun utilisateur ne correspond à ces identifiants.";
            }
        }
    }
}

?>