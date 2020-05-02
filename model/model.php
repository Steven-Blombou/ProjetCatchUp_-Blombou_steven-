<?php

abstract class Model {
  private static $bdd;

    // Instance de la connexion a la BDD
    public static function setBdd(){
      self::$_bdd = new PDO ('db5000303628.hosting-data.io', 'dbs296615', 'dbu526524', 'jXd)G9)8');
      self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

      // Recupere la conexion a la BDD
      protected function getBdd(){
        if(self::$_bdd == NULL)
        self::setBdd();
        return self ::$_Bdd;
      }

      protected function getAll($table, $obj){
        $var = [];
        $req = self::$_bdd->prepare('SELECT * FROM ' .$table. ' ORDER BY id desc ');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC)){
          $var[] = new $obj($data);
        }
          return $var;
          $req->closeCursor();
      }

}


 ?>
