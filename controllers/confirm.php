<?php
session_start();
$user_id = $_GET['id'];
$token = $_GET['token'];
require_once '../model/connectBdd.php';
$req = $bdd->prepare('SELECT * FROM T_User_catch_up WHERE id_user = ?');
$req->execute([user_id]);
$user = $req->fetch();

if($user AND $user->confirmation_token == $token){
  $req2 = $bdd->prepare('UPDATE T_User_catch_up SET confirmation_token = NULL, confirmed_at = NOW() WHERE id_user = ? ');
  $req2->execute([user_id]);
  $_SESSION['flash']['success'] = 'Votre compte a bien été validé !';
  $_SESSION['auth'] = $user;
  header('Location: ../index.php');
}else{
  $_SESSION['flash']['danger'] = "Ce token n'est plus valide !";
  header('Location: ../view/Login/login.php?erreur=4');
}
 ?>
