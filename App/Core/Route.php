<?php 
namespace App\Core;

use App\Core\Routing;
 

class Route{
    public static $current_route;
    private static $renew_route = [];
    public static $routes = [];

    public static function get($url , $action, $middleware = []){
      $routes = Routing::add("GET", $url, $action, $middleware);  
      self::$routes = $routes["routes"];
      self::$current_route = $routes["current_route"];
      $renew_object = new self();
      return $renew_object;
    }
    public static function name($name){
      
      foreach(self::$routes as $val){
       if ((array_search(self::$current_route["url"], array_values($val))) !== false){
        $val["name"] = $name;
        self::$renew_route[] = $val;
       }
      }      
      self::$routes = self::$renew_route;
    }

    public static function post($url, $action, $middleware = [] , $param = []){
      $route = Routing::add("POST", $url, $action, $middleware );
      return $route;
    }
    
}


