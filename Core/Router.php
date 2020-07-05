<?php

/*
* Router Class, routes to diferrent controllers and actions
*/

class Router
{

    protected $routes =[]; //Array of routes (routing table)

    protected $params =[]; //parameteres from the mateched route

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

    /*
    Gets the params from matched route/url - controller and actions
      returns array   controller,action (items)

    */
    public function getParams()
    {
      return $this->params;
    }

    /*
    Match the url to the routes in the routing tables
        string  $url  the route urldecode
        returns boolean true if match foun, false otherwise
    */
    public function match($url)
    {
      $regex = "/^(?<controller>[a-z-]+)\/(?<action>[a-z-]+)$/";

      if (preg_match($regex,$url,$matches)){
        echo '</br><pre>';
        var_dump ($matches);
        echo '</pre>';
        $params = [];

        foreach ($matches as $key => $match){
            if(is_string($key)){
              $params[$key]= $match;
            }
          }

        $this->params=$params;
        return true;
      }

      return false;
    }
}
?>
