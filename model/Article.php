<?php

class Article{
    // Nos variables
  private $_id_article;
  private $_titre;
  private $_auteur;
  private $_contenu;
  private $_date;

    // Constructeur
  public function __construc(array $data){
    $this->hydrate($data);
  }

    // Hydratation
  public function hydrate(array $data){
    foreach($data as $key => $value){
          $method = 'set' .ucfirst($key);

          if(method_exists($this, $method))
            $this->$method($value);
        }

  }

  // Getters

  public function getId_article(){
          return $this->_id_article;
        }

  public function getTitre(){
          return $this->_titre;
        }

  public function getAuteur(){
          return $this->_auteur;
        }

  public function getContenu(){
          return $this->_contenu;
        }

  public function getDate(){
          return $this->_date;
        }

  // Setters

  public function setId_article($id_article){
          $id_article = (int) $id_article;

          if($id_article > 0)
            $this->_id_article = $id_article;
        }

  public function setTitre($titre){
    if(is_string($titre))
    $this->_titre = $titre;
  }

  public function setAuteur($auteur){
    if(is_string($auteur))
    $this->_auteur = $auteur;
  }

  public function setContenu($contenu){
    if(is_string($contenu))
    $this->_contenu = $contenu;
  }

  Public function setDate($date){
    $this->_date = $date;
  }
}

 ?>
