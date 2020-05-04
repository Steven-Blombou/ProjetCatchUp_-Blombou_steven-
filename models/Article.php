<?php

class Article{

  private $_id_article;
  private $_title;
  private $_autor;
  private $_content;
  private $_date;
  private $_activate;
  private $_id_uer;

  public function __construct(array $data){
    $this->hydrate($data);
  }

  //hdratation
  public function hydrate(array $data){
    foreach ($data as $key => $value) {
      $method = 'set'.ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }


  //getters
  public function id_article()
  {
    return $this->_id_article;
  }

  public function title()
  {
    return $this->_title;
  }

  public function autor()
  {
    return $this->_autor;
  }

  public function content()
  {
    return $this->_content;
  }

  public function date()
  {
    return $this->_date;
  }

  public function activate()
  {
    return $this->_activate;
  }

  public function id_user()
  {
    return $this->_id_user;
  }


  //setters

  public function setId_article($id_article)
  {
    $id_article = (int) $id_article;
    if ($id_article > 0) {
      $this->_id_article = $id_article;
    }
  }

  public function setTitle($title)
  {
    if (is_string($title)) {
      $this->_title = $title;
    }
  }

  public function setAutor($autor)
  {
    if (is_string($autor)) {
      $this->_autor = $autor;
    }
  }

  public function setContent($content)
  {
    if (is_string($content)) {
      $this->_content = $content;
    }
  }

  public function setDate($date)
  {
      $this->_date = $date;

  }

  public function setActivate($activate)
  {
      $this->_activate = $activate;

  }

  public function setId_user($id_user)
  {
      $this->_id_user = $id_user;

  }

}

 ?>
