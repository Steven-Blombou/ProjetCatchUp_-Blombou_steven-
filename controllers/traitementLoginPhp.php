<?php
session_start(); // Lancement session
if(isset($_POST['mail_username']) && isset($_POST['password_user'])) // Je verifie l existence des variable mail_username et password_user
	{
		// connexion à la base de données
		include('../model/connectBdd.php');



		$username = !empty($_POST['mail_username']) ? $_POST['mail_username'] : NULL; // Je definie mes variables
		$password = !empty($_POST['password_user']) ? $_POST['password_user'] : NULL;

		// Je prepare ma requete de recherche
		$requete = $bdd->prepare("SELECT pseudo_user, id_typeUser, password_user  FROM T_User_catch_up WHERE (pseudo_user='$username') OR (mail_username='$username') ");
		$requete ->execute();
		$recupinfo = $requete->fetch();

			If(isset($recupinfo['password_user']))
				{
				$passisvalid = password_verify($password, $recupinfo['password_user']); // dehash
					 if($passisvalid == 1)
					{
						If (isset($_POST['accord_cookie']))
						{
							$_SESSION['username'] = $recupinfo['pseudo_user']; // Je compte les valeurs des varibles
							$_SESSION['typeuser'] = $recupinfo['id_typeUser'];
							setcookie("catch_up_name", $recupinfo['pseudo_user'], time()+604800,'/'); // mise en place cookie pseudo sur 7 jours emplacement ou sera save le cookie
							setcookie("catch_up_type_user", $recupinfo['id_typeUser'], time()+604800,'/'); // mise en place cookie type user sur 7 jours emplacement ou sera save le cookie
							header('Location: catch_up/view/index.php');
							// echo "Success";

						}
						else
						{
							$_SESSION['username'] = $recupinfo['pseudo_user']; // Je compte les valeurs des varibles
							$_SESSION['typeuser'] = $recupinfo['id_typeUser'];
							$_SESSION['flash']['login'] ='Vous etes connecté';
							header('Location: ../view/index.php');  // nom d'utilisateur et mot de passe correctes
							// echo "Success";
						}
					}
					else
					{
						header('Location: ../view/Login/login.php?erreur=1'); // mot de passe incorrect
						// echo "Failed";
					}
				}
				else
				{
					header('Location: ../view/Login/login.php?erreur=2'); // pseudo ou mail invalide
					// echo "Failed";
				}
			}
			else
			{
			header('Location: ../view/Login/login.php?erreur=3'); // utilisateur ou mot de passe vide
			// echo "Failed";
			}

///$bdd->closeCursor(); // fermer la connexion
?>
