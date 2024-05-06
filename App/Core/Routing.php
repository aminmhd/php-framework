<?php 


namespace App\Core;



class Routing{
    public $request = null;
    private static $routes;
    
  
    public function __construct($request){
      $this->request = $request;
    }
    public static function add($method, $uri, $controller, $middleware){
      $action = explode("@", $controller);
      $route_array = ["method" => $method,
       "middleware" => (count($middleware) > 0 ? $middleware : null) ,"uri" => $uri,
       "controller" => "App\\Controllers\\" . $action[0],
       "action" => $action[1]
      ];
      
      self::$routes[] = $route_array;
      return self::$routes;
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
        if(isset($data["uri"]) && $data["uri"] == $current_uri){
          $check_middleware = $this->check_middleware($data);
          if ($check_middleware){
            $action = $data["action"];          
            $controller = new $data["controller"];
            $controller->$action();
          }
          else{
            die("We cannot let you access to next request");
          }

          
       }
      }
    }
}