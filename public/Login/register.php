<?php
session_start();
include '../../controller/session.php';
include '../../model/connectBdd.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>S'enregistrer</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

			<!-- Gesttion des erreurs -->
	<?php
  if(isset($_GET['erreur'])){
                $err = $_GET['erreur'];
                if($err==1)
                    $erreur_register="Votre Mot de Passe n'est pas valide";
				elseif ($err==2)
					         $erreur_register="Pseudo déjà utilisée !";
				elseif ($err==3)
					         $erreur_register="Adresse Mail déjà utilisée !";
				elseif ($err==4)
					         $erreur_register="Votre adresse mail n'est pas valide !";
				elseif ($err==5)
					         $erreur_register="Vos adresses mail ne sont pas identiques !";
				elseif ($err==6)
					         $erreur_register="Votre pseudo ne doit pas dépasser 100 caractères !";
				elseif ($err==7)
					         $erreur_register="Tous les champs doivent être complétés !";
				elseif ($err==8)
					         $erreur_register="Tous les champs doivent être complétés !";
		   }
?>


	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form action="../../controller/traitementRegisterPhp.php" method="POST" class="login100-form validate-form">
				<span class="login100-form-title p-b-37">
					S'enregistrer
				</span>

				<?php
           if(isset($erreur_register)) { // Je verifie si il y a une valeur ds ma variable erreur
              echo '<font color="red">'.$erreur_register."</font>"; // Si oui j affiche le message d erreur en rouge
           }
					 ?>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Entrer votre pseudo">
					<input class="input100" type="text" name="pseudo_user" placeholder="Pseudo de l'utilisateur">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Entrer votre nom d'utilisateur">
					<input class="input100" type="text" name="nom_user" placeholder="Nom de l'utilisateur">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Entrer votre prenom d'utilisateur">
					<input class="input100" type="text" name="prenom_user" placeholder="Prenom de l'utilisateur">
					<span class="focus-input100"></span>
				</div>

        <div class="wrap-input100 validate-input m-b-20" data-validate="Entrer votre email">
					<input class="input100" type="text" name="mail_username" placeholder="Mail de l'utilisateur">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Confirmer votre email">
					<input class="input100" type="text" name="mail2_username" placeholder="Confirmer votre mail">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Entrer votre password">
					<input class="input100" type="password" name="password_user" placeholder="Entrer votre password">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Confirmer votre password">
					<input class="input100" type="password" name="password2_user" placeholder="Confirmer votre password">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" name="formregister" value='LOGIN'>
						S'enregistrer
					</button>
				</div>

				<div class="text-center p-t-57 p-b-20">
					<span class="txt1">
						Ou se connecter avec
					</span>
				</div>

				<div class="flex-c p-b-112">
					<a href="#" class="login100-social-item">
						<i class="fa fa-facebook-f"></i>
					</a>

					<a href="#" class="login100-social-item">
						<img src="images/icons/icon-google.png" alt="GOOGLE">
					</a>
				</div>

				<div class="text-center">
					<a href="../index.php" class="txt2 hov1">
						Retour a l'accueil:
					</a>
				</div>
			</form>


		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
