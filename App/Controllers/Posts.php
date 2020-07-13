<?php
/*
    Post Controller
*/
namespace App\Controllers;

use \Core\View;

class Posts extends \Core\Controller
{


    public function indexAction()
    {
        // echo "Hello from Post controller - index action";
        // echo "<p> Query string parameters: <pre>".
        //   htmlspecialchars(print_r($_GET,true))."</pre></p>";

        View::renderTemplate('Posts/index.html');
    }

    public function addNewAction()
    {
      echo "Post Controller - addNew action";
    }

    public function editAction()
    {
      echo "Hello from the edit action in the Post Controller";
      echo "<p> Route Parameters: <pre>".
        htmlspecialchars(print_r($this->route_params, true))." </pre></p>";
    }

}

?>
