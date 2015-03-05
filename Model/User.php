<?php

namespace Model;

class User extends Factory{
    protected $ID;
    protected $Password;
    protected $Pro;
    protected $Mail;
    protected $Sub;
    protected $Pays;
    protected $name;
    protected $firstname;
    protected $birthday;
    protected $adress;
    protected $cp;
    protected $town;
    protected $company;
    protected $fix;
    protected $por;

    /**
     * @param $Password
     * @param $Pro
     * @param $Mail
     * @param $Sub
     * @param $Pays
     */
    public function __construct($Password, $Pro, $Mail, $Sub, $Pays,$name, $firstname, $birthday, $adress, $cp, $town, $company, $fix, $por){
        $this->Password = $Password;
        $this->Pro = $Pro;
        $this->Mail = $Mail;
        $this->Sub = $Sub;
        $this->Pays = $Pays;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->birthday = $birthday;
        $this->adress = $adress;
        $this->cp = $cp;
        $this->town = $town;
        $this->company = $company;
        $this->fix = $fix;
        $this->por = $por;
    }

    public function getID(){
        return $this->ID;
    }



    public function getPassword(){
        return $this->Password;
    }

    public function getPro(){
        return $this->Pro;
    }

    public function getMail(){
        return $this->Mail;
    }

    public function getSub(){
        return $this->Sub;
    }

    public function getPays(){
        return $this->Pays;
    }

    public function setID($ID){
        $this->ID = $ID;
    }


    public function setPassword($Password){
        $this->Password = $Password;
    }

    public function setPro($Pro){
        $this->Pro = $Pro;
    }

    public function setMail($Mail){
        $this->Mail = $Mail;
    }

    public function setSub($Sub){
        $this->Sub = $Sub;
    }

    public function setPays($Pays){
        $this->Pays = $Pays;
    }
    public function getNom(){
        return $this->name;
    }

    public function getPrenom(){
        return $this->firstname;
    }

    public function getDate(){
        return $this->birthday;
    }

    public function getAdresse(){
        return $this->adress;
    }

    public function getCP(){
        return $this->cp;
    }

    public function getVille(){
        return $this->town;
    }

    public function getEntreprise(){
        return $this->company;
    }

    public function getFix(){
        return $this->fix;
    }

    public function getPor(){
        return $this->por;
    }

    public function saveUserDB(){
        $stmt = self::getMysqlConnexion()->prepare('INSERT INTO user  VALUES("",:password,:pro,:mail,:abo,:pays, :nom, :firstname, :birthday, :adress, :cp, :town,:company,:fix,:por)');
        $stmt->bindParam(':password', $this->Password);
        $stmt->bindParam(':pro', $this->Pro);
        $stmt->bindParam(':mail', $this->Mail);
        $stmt->bindParam(':abo', $this->Sub);
        $stmt->bindParam(':pays', $this->Pays);
        $stmt->bindParam(':nom', $this->name);
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':birthday', $this->birthday);
        $stmt->bindParam(':adress', $this->adress);
        $stmt->bindParam(':cp', $this->cp);
        $stmt->bindParam(':town', $this->town);
        $stmt->bindParam(':company', $this->company);
        $stmt->bindParam(':fix', $this->fix);
        $stmt->bindParam(':por', $this->por);
        if ($stmt->execute()) {
            //debug
            return $stmt->lastInsertId();
        } else {
            return false;
        }
    }

    public static function checkUserExist($Mail, $password){
        $stmt = self::getMysqlConnexion()->prepare("SELECT * FROM user WHERE Mail = :mail AND Password = :pwd");
        $stmt->bindParam(':mail', $Mail);
        $stmt->bindParam(':pwd', $password);
        $stmt->execute();
        if($stmt->rowCount() != 0){
            $data = $stmt->fetch();
           $retour["result"] = true;
            $retour = array_merge($retour,$data);
        }else{
            $retour['result'] = false;
        }
        return $retour;
    }

    public static function getUserByID($ID){
        $stmt = self::getMysqlConnexion()->prepare("SELECT * FROM user WHERE ID = :ID");
        $stmt->bindParam(':ID', $ID);
        $stmt->execute();
        if($stmt->rowCount() != 0){
            $data = $stmt->fetch();
            $retour["result"] = true;
            $retour = array_merge($retour,$data);
        }else{
            $retour['result'] = false;
        }
        return $retour;
    }

    public function changeUser($ID){
        $stmt = self::getMysqlConnexion()->prepare('UPDATE user  SET Password = :password, Professionel = :pro, Mail = :mail, Abonne = :abo, PaysID = :pays, nom =  :nom, prenom = :firstname, birthday = :birthday, adresse =  :adress, codePostal = :cp, ville = :town, entreprise = :company, telFix = :fix, telPor = :por WHERE ID = :ID)');
        $stmt->bindParam(':password', $this->Password);
        $stmt->bindParam(':pro', $this->Pro);
        $stmt->bindParam(':mail', $this->Mail);
        $stmt->bindParam(':abo', $this->Sub);
        $stmt->bindParam(':pays', $this->Pays);
        $stmt->bindParam(':nom', $this->name);
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':birthday', $this->birthday);
        $stmt->bindParam(':adress', $this->adress);
        $stmt->bindParam(':cp', $this->cp);
        $stmt->bindParam(':town', $this->town);
        $stmt->bindParam(':company', $this->company);
        $stmt->bindParam(':fix', $this->fix);
        $stmt->bindParam(':por', $this->por);
        $stmt->bindParam(':ID', $ID);
        if ($stmt->execute()) {
            //debug
            return true;
        } else {
            return false;
        }
    }

}

?>