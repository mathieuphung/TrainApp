<?php

include_once("../autoload.php");

$news = new \Model\Newsletter();
var_dump($news->sendNews());

?>