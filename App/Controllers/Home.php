<?php
/*
Home Controllers
*/

namespace App\Controllers;

class Home extends \Core\Controller
{

  public function indexAction(){
    echo "Hello from index - Home";
  }

  /*
  before Filter overrides inherited
  return void
  */
  protected function before()
  {
    echo "(before) ";
  }

  /*
  after Filter overrides inherited
  return void
  */
  protected function after()
  {
    echo " (after)";
  }
}

 ?>
