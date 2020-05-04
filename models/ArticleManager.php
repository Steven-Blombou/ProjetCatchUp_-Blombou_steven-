<?php

class ArticleManager extends Model
{

  //gréer la fonction qui va recuperer
  //tous les articles dans la bdd
  public function getArticles(){
    return $this->getAll('T_Articles', 'Article');
  }

  public function getArticle($id){
      return $this->getOne('articles', 'Article', $id);
    }

  public function createArticle(){
      return $this->createOne('articles', 'Article');
    }
}

 ?>
