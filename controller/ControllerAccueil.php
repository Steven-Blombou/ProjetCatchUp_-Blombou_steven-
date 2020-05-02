<?php

class ControllerAccueil {
  private $_articleManager;
  private $_view;

  public function __construct($url){
    if(isset($url) AND count($url)>1)
    throw new Exception('Page Introuvable');
    else
      $this->articles();
  }

  private function articles(){
    $this->_articleManager = new ArticleManager;
    $article = $this->_articleManager->getArticles();

    require_once('view/viewAccueil.php');
  }

}

 ?>
