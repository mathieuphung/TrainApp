<?php

namespace Model;

class Feedback extends Factory{
    private $ID;
    private $Date;
    private $Note;
    private $Message;
    private $User_ID;

    public function __construct($ID, $Date, $Note, $Message, $User_ID){
        $this->ID = $ID;
        $this->Date = $Date;
        $this->Note = $Note;
        $this->Message = $Message;
        $this->User_ID = $User_ID;
    }

    public function getID(){
        return $this->ID;
    }

    public function getDate(){
        return $this->Date;
    }

    public function getNote(){
        return $this->Note;
    }

    public function getMessage(){
        return $this->Message;
    }

    public function getUserID(){
        return $this->User_ID;
    }

    public function setID($ID){
        $this->ID = $ID;
    }

    public function setDate($Date){
        $this->Date = $Date;
    }

    public function setNote($Note){
        $this->Note = $Note;
    }

    public function setMessage($Message){
        $this->Message = $Message;
    }

    public function setUserID($User_ID){
        $this->User_ID = $User_ID;
    }

    public function sendFeedback(){
        //coming soon
    }

}

?>