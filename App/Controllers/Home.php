<?php
/*
Home Controllers
*/

namespace App\Controllers;
use \Core\View;

class Home extends \Core\Controller
{

  public function indexAction(){
    //echo "Hello from index - Home";
    View::render('Home/index.php', [
      'name'=> 'Alcides',
      'colours' => ['purple','green','blue']
    ]);
  }

  /*
  before Filter overrides inherited
  return void
  */
  protected function before()
  {
    //echo "(before) ";
  }

  /*
  after Filter overrides inherited
  return void
  */
  protected function after()
  {
    //echo " (after)";
  }
}

 ?>
