<?php 


namespace App\Core;



class Routing{
    public $request = null;
    private static $routes;
    
  
    public function __construct($request){
      $this->request = $request;
    }
    public static function add($method, $uri, $controller, $middleware, $param){
      $action = explode("@", $controller);
      $route_array = ["method" => $method,
       "middleware" => (count($middleware) > 0 ? $middleware : null) ,
       "url" => $uri,
       "controller" => "App\\Controllers\\" . $action[0],
       "action" => $action[1],
       "params" => $param,
      ];
      self::$routes[] = $route_array;
      $routes = [
        "current_route" => $route_array,
        "routes" => self::$routes,
      ];
      return $routes;
    }
    
    public static function routes(){
        return self::$routes;
        
    }
    private function check_middleware($data){
      if (isset($data["middleware"]) && $data["middleware"] != null){
        foreach($data["middleware"] as $val){
          $address_to_class = "App\\Middleware\\" . $val;
          $instance = new $address_to_class;
          $middleware = $instance->handle();
          if (!$middleware){
            return false;
          }
        }
        return true;
      }
      else{
        return true;
      }
      
    }
    public function run(){
      $current_uri = $this->request->URI();
      foreach(self::$routes as $data){
        if(isset($data["url"]) && $data["url"] == $current_uri){
          $check_middleware = $this->check_middleware($data);
          if ($check_middleware){
            $action = $data["action"];          
            $controller = new $data["controller"];
            if (count($data["params"]) == 0){
              $controller->$action();
            }else{
              $controller->$action(extract($data["params"]));
            }
          }
          else{
            die("We cannot let you access to next request");
          }

          
       }
      }
    }
}