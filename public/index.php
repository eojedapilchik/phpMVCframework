<?php

/**
 * Front controller

*/

require '../Core/Router.php';

$router = new Router();

//echo get_class($router);
//echo 'Requested URL 1 = "'.$_SERVER['QUERY_STRING'].'"';

// Add the routes
 $router->addRoute('',['controller' => 'Home', 'action' =>'index']);
 $router->addRoute('posts',['controller'=>'Posts', 'action'=>'index']);
 $router->addRoute('posts/new',['controller'=>'Posts', 'action'=>'new']);
  $router->addRoute('{controller}/{action}');
   $router->addRoute('admin/{action}/{controller}']);

// display the routing table
// echo '<pre>';
// var_dump ($router->getRoutes());
// echo '</pre>';

$url =$_SERVER['QUERY_STRING'];

if($router->match($url)){
   echo '<pre>';
   var_dump ($router->getParams());
   echo '</pre>';
}else{
  echo "No route found for URL '$url'";
}

?>
