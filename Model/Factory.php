<?php

namespace Model;

class Factory{
    //private $dbadress = 'mysql:host=127.0.0.1;';
    //private $dbname = 'dbname=trainapp;';
    //private $login = 'root';
    //private $pwd = '';
    //static $PDO;

    public static function getMysqlConnexion()
    {
        $db = new \PDO('mysql:host=localhost;dbname=trainapp', 'root', '');
        //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;
    }
}

?>