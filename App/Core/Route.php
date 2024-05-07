<?php 
namespace App\Core;

use App\Core\Routing;
use function App\Utilities\param_to_url;

class Route{
    public static $routes = [];
    public static function get($url , $action, $middleware = [], $param = []){
      $url = param_to_url($url, $param);
      var_dump($url);

      
      $route = Routing::add("GET", $url, $action, $middleware, $param);   
      self::$routes = $route;
      return $route;
    }
    public static function post($url, $action, $middleware = [] , $param = []){
      $route = Routing::add("POST", $url, $action, $middleware , $param);
      return $route;
    }
    
}


