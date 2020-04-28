<?php
session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Se Connecter</title>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>


	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form action="../../controller/traitementLogin.php" method="POST" class="login100-form validate-form">
				<span class="login100-form-title p-b-37">
					Se Connecter
				</span>

      <!-- Gestion des erreurs -->
				<?php
            if(isset($_GET['erreur'])){  //je verifie si il ya des erreurs
                $err = $_GET['erreur'];
                if($err==1 || $err==2 || $err==3)
                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>"; // si oui affichage du message d erreur en rouge
            }
            ?>

            <?php
            if(isset($_GET['message'])){  //je verifie si il ya des erreurs
                $mess = $_GET['message'];
                if($mess==1)
                    echo "<p style='color:green'>Votre compte a bien été créé</p>"; // si oui affichage du message d erreur en rouge
            }
            ?>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Entrer votre pseudo ou votre mail">
					<input class="input100" type="text" name="mail_username" placeholder="pseudo ou mail">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Entrer votre password">
					<input class="input100" type="password" name="password_user" placeholder="password">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button id='submit' class="login100-form-btn">
						Se Connecter
					</button>
				</div>

				<div class="text-center p-t-57 p-b-20">
					<span class="txt1">
						Ou connexion avec
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

        <!-- <input class="login" type="checkbox" name="accord_cookie" value="1">
            <label>Veuillez se rappellez de moi a la prochaine connexion</b></label> <br>
            <br> -->

				<div class="text-center">
					<a href="../index.php" class="txt2 hov1">
						Se Deconnecter
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){

    $("#submit").click(function{

        $.post(
            '../../controller/traitementLogin.php', // Un script PHP que l'on va créer juste après
            {
                mail_username : $("#mail_username").val(),  // Nous récupérons la valeur de nos inputs que l'on fait passer à connexion.php
                password_user : $("#password_user").val()
            },

            function(data){
              if(data == 'Success'){
                     // Le membre est connecté. Ajoutons lui un message dans la page HTML.

                     $("#resultat").html("<p>Vous avez été connecté avec succès !</p>");
                }
                else{
                     // Le membre n'a pas été connecté. (data vaut ici "failed")

                     $("#resultat").html("<p>Erreur lors de la connexion...</p>");
                }
            },

            'text' // Nous souhaitons recevoir "Success" ou "Failed", donc on indique text !
         );

    });

});

</script>

</body>
</html>
