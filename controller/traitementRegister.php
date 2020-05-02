<?php

session_start(); // Lancement session
require_once("../model/class_Database.php");
require_once("../model/class_User.php");
// $conect = new Database('db5000303628.hosting-data.io', 'dbs296615', 'dbu526524', 'jXd)G9)8');
$conect = new Database('localhost', 'catch_up', 'root', '');
$bdd=$conect->PDOConnexion();

$pseudo_user =$_POST['pseudo_user'];
$nom_user =$_POST['nom_user'];
$prenom_user =$_POST['prenom_user'];
$password_user =$_POST['password_user'];
$mail_username =$_POST['mail_username'];
$confirmation_token =$_POST['confirmation_token'];
$user1 = new User($pseudo_user,$nom_user,$prenom_user,$password_user,$mail_username,$confirmation_token);

$user1->inscription($bdd);



?>
