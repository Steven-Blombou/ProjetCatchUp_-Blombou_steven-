<?php
try   {
  $user = "root";
  $pass = "";
  // Je me connecte à ma bdd
  $bdd = new PDO('mysql:host=localhost;dbname=catch_up;charset=utf8', $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // connection localhost
  //$bdd = new PDO('mysql:host=db5000303628.hosting-data.io;dbname=dbs296615', 'dbu526524', 'jXd)G9)8', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  // return $bdd;
}catch(Exception $e)
{
  // En cas d'erreur, un message s'affiche et tout s'arrête
        die('Erreur : '.$e->getMessage());
}
?>
