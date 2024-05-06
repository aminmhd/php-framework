<?php 
namespace App\Core;

use App\Core\Routing;


class Route{
    public static $routes = [];
    public static function get($url , $action, $middleware = []){
      $route = Routing::add("GET", $url, $action, $middleware);   
      self::$routes = $route;
      return $route;
    }
    public static function post($url, $action, $middleware = []){
      $route = Routing::add("POST", $url, $action, $middleware);
      return $route;
    }
    
}


