<?php

session_start(); // Lancement session
require_once("../model/class_Database.php");
require_once("../model/class_User.php");

$confirmation_token=$_GET['confirmation_token'];
$conect = new Database('db5000303628.hosting-data.io', 'dbs296615', 'dbu526524', 'jXd)G9)8');
$bdd=$conect->PDOConnexion();


$req=$bdd->prepare("SELECT * FROM T_User_catch_up WHERE confirmation_token = ?");
$req->execute([$confirmation_token]);
$count = $req->rowCount();
if($count>0){
    $req=$bdd->prepare("UPDATE T_User_catch_up SET valid = ? WHERE confirmation_token = ?");
    $req->execute([1,$confirmation_token]);
    echo "Le mail a bien été validé connectez vous pour acceder a la page admin <br>";
    echo '<a href="index.php">Conectez vous</a>';
}


?>
