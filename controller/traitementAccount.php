<?php
session_start();
include 'bloquePagePublic.php';
require_once '../model/connectBdd.php';
$mail_username = $_POST['mail_username'];
if(!empty($_POST)){

  if(empty($_POST['mail_username']) || $_POST['mail_username'] != $_POST['mail_confirm']){
    $_SESSION['flash']['danger'] = 'Les emails ne correspondent pas';
    header('Location: ../view/Login/account.php');
  }else{
    $req = $bdd->prepare('UPDATE T_User_catch_up SET mail_username = ? WHERE pseudo_user = ?');
    $req->execute([$mail_username, $_SESSION['username']]);
    $_SESSION['flash']['success'] = 'Votre email a bien été mise a jour';
    header('Location: ../view/Login/account.php');
  }

  // if(empty($_POST['password_user']) || $_POST['password_user'] != $_POST['password_confirm']){
  //   $_SESSION['flash']['danger'] = 'Les mot de passes ne correspondent pas';
  //   // header('Location: ../view/Login/account.php');
  // }else{
  //   $user_id = $_SESSION['auth']->id_user;
  //   $password_user = password_hash($_POST['password_user'], PASSWORD_BCRYPT);
  //   $req = $bdd->prepare('UPDATE T_User_catch_up SET password_user = ?');
  //   $req->execute(['password_user']);
  //   $_SESSION['flash']['sucess'] = 'Votre mot de passe a bien été mis a jour';
  //   // header('Location: ../view/Login/account.php');
  // }



}
 ?>
