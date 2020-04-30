<?php
    class User{
        private $_pseudo_user;
        private $_nom_user;
        private $_prenom_user;
        private $_password_user;
        private $_mail_username;
        private $_confirmation_token;
        private $_valid;
        private $_confirmed_at;

        public function __construct($password_user, $mail_username){
            $this->_mail_username = $mail_username;
            $this->_password_user = $password_user;
            $this->token=substr(str_shuffle(str_repeat("0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN", 60)), 0, 60);
            $this->valid=1;
        }


        public function getpseudo_user(){
            return $this->_pseudo_user;
          }

        public function getnom_user(){
            return $this->_nom_user;
          }

        public function getprenom_user(){
            return $this->_prenom_user;
          }

        public function getpassword_user(){
            return $this->_password_user;
          }


        public function getmail_username(){
            return $this->_mail_username;
          }


        public function getconfirmation_token(){
            return $this->_confirmation_token;
          }

        public function getvalid(){
            return $this->_valid;
          }


        public function getconfirmed_at(){
            return $this->_confirmed_at;
          }

        public function validToken($bdd){
            $bool=false;
            $req=$bdd->prepare("SELECT valid FROM T_User_catch_up WHERE mail_username = ?");
            $req->execute([$this->mail_username]);
            $valid=$req->fetch();
            if($valid['valid']==1){
                $bool=true;
            }
            return $bool;
        }


        public function verifConect($bdd){
            $req=$bdd->prepare("SELECT * FROM T_User_catch_up WHERE mail_username = ? AND password_user = ?");
            $req->execute([$this->mail_username,$this->password_user]);
            $donnee=$req->fetch();

            $count = $req->rowCount();
            var_dump($this->validToken($bdd));
            if($count > 0){
                if($this->validToken($bdd)){
                    session_start();
                    $this->confirmed_at=1;
                    $_SESSION['username'] = $this->pseudo_user;
                    $_SESSION['mail_username'] = $this->mail_username;
                    $_SESSION['password_user'] = $this->password_user;
                    $_SESSION['valid']= $this->valid;
                    header("location: ../view/index.php");
                    echo '<a href="  ">Acceder a l admin</a>';
                    die;
                }else{
                    $_SESSION['mail_username'] = $this->mail_username;
                    $_SESSION['password_user'] = $this->password_user;
                    echo "verifiez la confirmation de votre adresse mail <br>";
                    echo '<a href="../view/index.php">Retournez a lacceuil</a>';
                }
            }else{

                //Mauvais identifiant ou mauvais tout cours
                header("location: ../view/Login/login.php");
            }
        }

        public function inscription($bdd){
            if((!empty($this->pseudo_user)) && (!empty($this->nom_user)) && (!empty($this->prenom_user)) && (!empty($this->password_user)) && (!empty($this->mail_username)) && (!empty($this->confirmation_token))){
                $req=$bdd->prepare("SELECT * FROM T_User_catch_up WHERE mail_username = ?");
                $req->execute([$this->pseudo_user,$this->nom_user,$this->prenom_user,$this->password_user,$this->mail_username,$this->confirmation_token]);
                $count= $req->rowCount();
                if ($count==0){
                    $req=$bdd->prepare("INSERT INTO T_User_catch_up SET pseudo_user = ?, nom_user = ?, prenom_user = ?, password_user, mail_username = ?, confirmation_token = ?");
                    $req->execute([$this->pseudo_user,$this->nom_user,$this->prenom_user,$this->password_user,$this->mail_username,$this->confirmation_token]);
                    echo "Inscription reussie <br> verifiez votre mail";
                    echo '<a href="view/Login/login.php">Conectez vous</a>';
                }else{
                    echo "mail deja pris";
                    echo '<a href="view/Login/register.php">Réésayez</a>';
                }

            }else{
                echo "erreur";
            }
        }


    }



?>
