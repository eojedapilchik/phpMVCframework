<?php
namespace App\Models;

use PDO;

/*
Post model
*/

Class Post
{

  public static function getAll()
  {
    $host = 'localhost';
    $dbname ='mvc';
    $username ='mvc';
    $password ='password';

    try{
      $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8,
      $username, $password");

      $stmt= $db->query('SELECT id, title, content FROM posts ORDER BY created_at');

      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return $results;

    } catch (PDOException $e){
      echo $e->getMessage();
    }
  }
}
 ?>
