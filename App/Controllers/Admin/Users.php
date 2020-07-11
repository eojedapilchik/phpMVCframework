<?php

namespace App\Controllers\Admin;

/*
User admin controller
*/

class Users extends \Core\Controller
{

  /*
  shows the index page
  */

  public function IndexAction()
  {
    echo " User admin index";
  }

  /*
  Before filter to make sure admin is authenticaded

  return void
  */
  protected function before()
  {
      //validates admin is logged as User
      //return false;
  }



}
 ?>
