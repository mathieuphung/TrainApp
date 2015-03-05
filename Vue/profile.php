<?php
session_start();
require_once('../autoload.php');

$data = \Model\User::getUserByID(10);
$currentUser = new \Model\User(Null,$data['Professionel'],$data['Mail'],$data['Abonne'],$data['PaysID'],$data['nom'],$data['prenom'],$data['birthsday'], $data['adresse'], $data['codePostal'], $data['ville'], $data['entreprise'], $data['telFix'], $data['telPort']);

echo $currentUser->getMail();
echo $currentUser->getSub();
echo $currentUser->getPays();
echo $currentUser->getNom();
echo $currentUser->getPrenom();
echo $currentUser->getDate();
echo $currentUser->getAdresse();
echo $currentUser->getCP();
echo $currentUser->getVille();
echo $currentUser->getEntreprise();
echo $currentUser->getFix();
echo $currentUser->getPor();

?>