<?php

/*
* Router Class, routes to diferrent controllers and actions
*/

namespace Core;

class Router
{

    protected $routes =[]; //Array of routes (routing table)

    protected $params =[]; //parameteres from the mateched route

    /*
    Adds a route to the routing tables
        string  $route    route URL
        array   $params   Parameters (controller, action, etc)  is optional
    */
    public function addRoute($route, $params =[])
    {
      // Convert the route to a regular expression , escape forward slash
      $route = preg_replace('/\//', '\\/', $route);

      //Convert variables ex {controller}
      $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

      //Convert variables with custom regeg ex. {id:\d+}
      $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
      // Add start and end delimiters, and case insensitive flag
      $route = '/^' . $route . '$/i';

      $this->routes[$route] = $params;

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
      //$regex = "/^(?<controller>[a-z-]+)\/(?<action>[a-z-]+)$/";
      foreach($this->routes as $route => $params)
        if (preg_match($route,$url,$matches)){
           // echo '</br><pre>';
           // var_dump ($matches);
           // echo '</pre>';
          //$params = [];

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

    /*
    Verifies de url against the router table and creates the controller object
    calls the accion
        string $url the url provide in the address bar

    */
    public function dispatch($url)
    {
      if ($this->match($url)){
        //check if controller class exist and check if action method exist
        $controller = $this->params['controller'];
        $controller = $this->convertToStudlyCaps($controller);
        $controller = "App\Controllers\\$controller";

        if (class_exists($controller)){
          $controller_object= new $controller();
          $action =$this->params['action'];
          $action = $this->convertToCamelCase($action);

          if (is_callable([$controller_object,$action])){
            $controller_object->$action();
          }else{
            echo "No action found";
          }
        }else{
          echo "Controller class was not found";
        }
      }else{
        echo "No route matched.";
      }
    }

    /*
    Converts a string to Studly Caps format: Capitalize first letter
      string $text text to be formated
    */
    protected function convertToStudlyCaps($text)
    {
        return  preg_replace('/[\s-]+/','',ucwords($text));
    }

    /*
    Converts a text to lowercase and second word Uppercase for methods/actions
      string $text The string to be converted
      return string

    */
    protected function convertToCamelCase($text)
    {
        return lcfirst($this->convertToStudlyCaps($text));
    }

}
?>
