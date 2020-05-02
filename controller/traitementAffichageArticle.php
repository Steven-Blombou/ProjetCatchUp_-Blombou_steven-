<?php

include('../model/connectBdd.php');

$requete = $bdd->prepare("SELECT * FROM T_Articles  ");
$requete ->execute();
$recupinfo = $requete->fetch();



 ?>
