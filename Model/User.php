<?php

namespace Model;

class User extends Factory{
    protected $ID;
    protected $Password;
    protected $Pro;
    protected $Mail;
    protected $Sub;
    protected $Pays;
    private $db;

    /**
     * @param $Password
     * @param $Pro
     * @param $Mail
     * @param $Sub
     * @param $Pays
     */
    public function __construct($Password, $Pro, $Mail, $Sub, $Pays){
        $this->Password = $Password;
        $this->Pro = $Pro;
        $this->Mail = $Mail;
        $this->Sub = $Sub;
        $this->Pays = $Pays;
        self::saveUserDB();
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

    public function saveUserDB(){
        $stmt = self::getMysqlConnexion()->prepare('INSERT INTO user  VALUES(:login,:password,:pro,:mail,:abo,:pays)');
        $stmt->bindParam(':login', $this->Login);
        $stmt->bindParam(':password', $this->Password);
        $stmt->bindParam(':pro', $this->Pro);
        $stmt->bindParam(':mail', $this->Mail);
        $stmt->bindParam(':abo', $this->Sub);
        $stmt->bindParam(':pays', $this->Pays);
        if ($stmt->execute()) {
            return true;
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


}

?>