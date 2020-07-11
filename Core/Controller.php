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



}


 ?>
