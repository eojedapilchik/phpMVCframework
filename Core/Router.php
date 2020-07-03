<?php

/*
* Router Class, routes to diferrent controllers and actions
*/

class Router
{

protected $routes =[]; //Array of routes (routing table)
}

/*
 Adds a route to the routing tables
    string  $route    route URL
    array   $params   Parameters (controller, action, etc)
*/

public function addRoute($route, $params)
{
  $this->routes[$route]=$params;
}

/*
Gets all the routes from the router tables
  returns array
*/

public function getRoutes()
{
  return $this->routes;
}
?>
