<?php

namespace Core;

/*
View Base class
*/

class View
{

  /*
  renders a view file

  param string $view the View file
  param args an array of variables to be used in the view
  return void
  */
  public static function render($view, $args=[])
  {
    extract($args, EXTR_SKIP);
    $file= "../App/Views/$view";  //relative to Core directory

    if(is_readable($file)){
      require $file;
    }else{
      echo "$file not found";
    }
  }

  public static function renderTemplate($template, $args=[])
  {
    static $twig = null;

    if($twig=== null){
      $loader = new \Twig\Loader\Filesystemloader('../App/Views');
      $twig = new \Twig\Environment($loader);
    }

    echo $twig->render($template,$args);
  }

}



 ?>
