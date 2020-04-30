<?php
session_start(); // Lancement session
require_once("../model/class_Database.php");
require_once("../model/class_User.php");
$conect = new Database('db5000303628.hosting-data.io', 'dbs296615', 'dbu526524', 'jXd)G9)8');
$bdd=$conect->PDOConnexion();

$mail_username = !empty($_POST['mail_username']) ? $_POST['mail_username'] : NULL;
$password_user = !empty($_POST['password_user']) ? $_POST['password_user'] : NULL;
$user1 = new User($mail_username,$password_user);

$user1->verifConect($bdd);

?>
