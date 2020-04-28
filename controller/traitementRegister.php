<?php
session_start();
if(isset($_POST['formregister'])){
    $pseudo_user = htmlspecialchars($_POST['pseudo_user']);
    $nom_user = htmlspecialchars($_POST['nom_user']);
    $prenom_user = htmlspecialchars($_POST['prenom_user']);
    $mail_username = htmlspecialchars($_POST['mail_username']);
    $mail2_username = htmlspecialchars($_POST['mail2_username']);
    $password_user = password_hash($_POST['password_user'], PASSWORD_BCRYPT);
    $password2_user = ($_POST['password2_user']);

    try   {
      // $user = "root";
      // $pass = "";
      // Je me connecte à ma bdd
      // $bdd = new PDO('mysql:host=localhost;dbname=crud;charset=utf8', $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // connection localhost
      $bdd = new PDO('mysql:host=db5000303628.hosting-data.io;dbname=dbs296615', 'dbu526524', 'jXd)G9)8', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      // return $bdd;
    }catch(Exception $e)
    {
      // En cas d'erreur, un message s'affiche et tout s'arrête
            die('Erreur : '.$e->getMessage());
    }


    if(!empty($_POST['pseudo_user']) AND !empty($_POST['nom_user']) AND !empty($_POST['prenom_user']) AND !empty($_POST['mail_username']) AND !empty($_POST['mail2_username'])AND !empty($_POST['password_user'])AND !empty($_POST['password2_user'])) {
       $pseudolength = strlen($pseudo);
       if($pseudolength <= 100) {
          if($mail_username == $mail2_username) {
             if(filter_var($mail_username, FILTER_VALIDATE_EMAIL)) {
                $reqmail = $bdd->prepare("SELECT * FROM T_User_catch_up WHERE mail_username = ?");
                $reqmail->execute(array($mail_username));
                $mail_exist = $reqmail->rowCount();
                if($mail_exist == 0) {
                  $reqpseudo = $bdd->prepare("SELECT * FROM T_User_catch_up WHERE pseudo_user = ?");
                  $reqpseudo->execute(array($pseudo_user));
                  $pseudo_exist = $reqpseudo->rowCount();
                  if($pseudo_exist == 0) {
                    $passisvalid = password_verify($password2_user, $password_user);
                      if($passisvalid == 1)
					  {
                      $sql = $bdd->prepare("INSERT INTO T_User_catch_up (pseudo_user, nom_user, prenom_user, mail_username, password_user, id_typeUser) VALUES (:pseudo_user, :nom_user, :prenom_user, :mail_username, :password_user, :id_typeUser)");
                      $sql->execute(array(
                        'pseudo_user'=> $pseudo_user,
                        'nom_user'=> $nom_user,
                        'prenom_user'=> $prenom_user,
                        'mail_username'=> $mail_username,
                        'password_user'=> $password_user,
                        'id_typeUser'=> 3));
						header('Location: http://blombou.simplon-charleville.fr/catch_up/view/Login/login.php?message=1');
					  	}
                   else
				   {
					header('Location: http://blombou.simplon-charleville.fr/catch_up/view/Login/register.php?erreur=1');
				   }
                }
                else {
                   header('Location: http://blombou.simplon-charleville.fr/catch_up/view/Login/register.php?erreur=2');
                    }
                }
                else {
                  header('Location: http://blombou.simplon-charleville.fr/catch_up/view/Login/register.php?erreur=3');
                }
             }
             else {
                header('Location: http://blombou.simplon-charleville.fr/catch_up/view/Login/register.php?erreur=4');
             }
          }
          else {
            header('Location: http://blombou.simplon-charleville.fr/catch_up/view/Login/register.php?erreur=5');
          }
       }
       else {
           header('Location: http://blombou.simplon-charleville.fr/catch_up/view/Login/register.php?erreur=6');
       }
    }
    else {
      header('Location: http://blombou.simplon-charleville.fr/catch_up/view/Login/register.php?erreur=7');
	}
 }
 			else
			{
header('Location: http://blombou.simplon-charleville.fr/catch_up/view/Login/register.php?erreur=8');
			}
?>
