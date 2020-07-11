<?php

namespace Core;

/*
 Base controllers structure
 */

abstract class Controller
{

  /*
  parameters from the matched route - id, etc
  @var array
  */
  protected $route_params=[];

  /*
  Class constructor
  @param array $route_params Parameters from the routes
  return void
  */
  public function __construct($route_params)
  {
    $this->route_params=$route_params;
  }

 /*
 Magic method called when a non existent, protected, private methos is called from an object.
 It's used to execute instructions before and after filter methods over action method_exists
 Actions methods can be (1) be made private or (2) renamed with a suffix like Action that is
 called from the magic method only, ex indexAction, showAction, editAction

 @param  string $name Method names
 @param  $array $args Arguments passed to the methods

 return void
 */
  public function __call($name, $args)
  {
    $method= $name.'Action';

    if (method_exists($this, $method)){
      if($this->before() !==false){ // runs code before the method is call
        call_user_func_array([$this, $method], $args);
        // run code after
        $this->after();
      }
    }else{
      echo "Method $method not found in controller ".get_class($this);
    }
  }

  /*
  Before filter action, called before and action method is executed
  return void
  */
  protected function before()
  {

  }

  /*
  After filter action, called after and action method is executed
  reutrn void
  */
  protected function after()
  {

  }



}


 ?>
