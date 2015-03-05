<?php

namespace Model;

class Newsletter extends Factory{







    public function sendNews(){
        $stmt = self::getMysqlConnexion()->prepare('SELECT Date, Contenu FROM feedback WHERE date in (SELECT MAX(date) FROM feedback )');
        $stmt->execute();
        $dataNews = $stmt->fetch();

        $stmt = self::getMysqlConnexion()->prepare("SELECT Mail from user WHERE abonne = 1");
        $stmt->execute();
        $dataMail = $stmt->fetch();
        var_dump($dataMail);
        $dataMail = implode(",",$dataMail);

        $objet = "Newsletter Acme du ".$dataNews['Date'];

        $headers  = 'MIME-Version: 1.0' . '\r\n';
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . '\r\n';
        $headers .= 'From: monsite@monsite.fr' . '\r\n'; // On définit l'expéditeur.
        $headers .= 'Bcc:' . $dataMail . '' . '\r\n';

        if(mail($dataMail, $objet, $dataNews['Contenu'])){
            return true;
        }else{
            return false;
        }


    }
}

?>