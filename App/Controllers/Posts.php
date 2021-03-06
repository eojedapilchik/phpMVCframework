<?php
/*
    Post Controller
*/
namespace App\Controllers;

use \Core\View;
use App\Models\Post;

class Posts extends \Core\Controller
{


    public function indexAction()
    {
        	$post = Post::getAll();


        // echo "Hello from Post controller - index action";
        // echo "<p> Query string parameters: <pre>".
        //   htmlspecialchars(print_r($_GET,true))."</pre></p>";

          View::renderTemplate('Posts/index.html', ['posts' => $post]);
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
