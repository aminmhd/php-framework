<?php 
namespace App\Core;

use App\Core\Routing;
use function App\Utilities\param_to_url;

class Route{
    private static $current_route;
    private static $renew_route = [];
    public static $routes = [];

    public static function get($url , $action, $middleware = [], $param = []){
      $url = param_to_url($url, $param);
      $routes = Routing::add("GET", $url, $action, $middleware, $param);  
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
      // var_dump(self::$renew_route);
      self::$routes = self::$renew_route;
    }

    public static function post($url, $action, $middleware = [] , $param = []){
      $route = Routing::add("POST", $url, $action, $middleware , $param);
      return $route;
    }
    
}


