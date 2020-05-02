<?php

class Router{
  private $_ctrl;
  private $_view;

  public function routeReq(){
    try{
        // Chargement auto des class
        spl_autoload_register(function($class)){
          require_once('../model/'.$class.'.php');
        });

        $url = '';

          // Le controller est inclus selon l action de l'utilisateur
        if(isset($_GET['url'])){
          $url = explode('/', filter_var($_GET['url'], FILTER SANITIZE_URL));

          $controller = ucfirst(strtolower($url[0]));
          $controllerClass = "Controller". $controller;
          $controllerFile = "controller/" .$controllerClass.".php";

          if(file_exists($controlleFile)){
              require_once('controllerFile');
              $this->_ctrl = new $controllerClass($url);
            }else
              throw new Exception('Page Introuvable');
            }else{
              require_once('controller/ControllerAccueil.php');
              $this->_crtl = new ControllerAccueil($url);
            }
          }

    //  Gestion des erreurs
    catch(Exception $e){
      $errorMsg = $e->getMessage();
        require_once('view/viewError.php');
    }
  }

}

 ?>
