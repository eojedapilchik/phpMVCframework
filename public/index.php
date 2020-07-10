<?php

/**
 * Front controller

*/


require 'Posts.php';
require '../Core/Router.php';
use App\Controllers;

$router = new Router();

//echo get_class($router);
//echo 'Requested URL 1 = "'.$_SERVER['QUERY_STRING'].'"';

// Add the routes
 $router->addRoute('',['controller' => 'Home', 'action' =>'index']);
 //$router->addRoute('posts',['controller'=>'Posts', 'action'=>'index']);
 //$router->addRoute('posts/new',['controller'=>'Posts', 'action'=>'new']);
 $router->addRoute('{controller}/{action}');
 $router->addroute('{controller}/{id:\d+}/{action}');
 //$router->addroute('{controller}/{id:[a-z0-9-]+}/{action}'); // routes like controller/123eded-234/action

$url =$_SERVER['QUERY_STRING'];

$router->dispatch($url);
// display the routing table
 echo '<pre>';
 echo htmlspecialchars(print_r($router->getRoutes(), true));
 echo '</pre>';



if($router->match($url)){
   echo '<pre>';
   var_dump ($router->getParams());
   echo '</pre>';
}else{
  echo "No route found for URL '$url'";
}

?>
