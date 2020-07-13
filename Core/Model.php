<?php
namespace Core;
use PDO;
/*
Model Base
*/

abstract class Model
{
  protected static function getDB()
  {
    static $db = null;
    if($db===null){
      $host = 'localhost';
      $dbname ='mvc';
      $username ='mvc';
      $password ='password';

      try{
        $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username, $password);
      } catch (PDOException $e){
        echo $e->getMessage();
      }
    }
    return $db;
  }
}
 ?>
