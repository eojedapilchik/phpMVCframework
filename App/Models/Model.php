<?php
namespace App\Models;
use PDO;
/*
Model Base
*/

abstract class Model
{
  static function getDB()
  {
    static $db = null;
    if($db===null){
      $host = 'localhost';
      $dbname ='mvc';
      $username ='mvc';
      $password ='password';

      try{
        $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username, $password);
        return $db;

      } catch (PDOException $e){
        echo $e->getMessage();
      }
    }
  }
}
 ?>
