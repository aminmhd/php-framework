<?php 


namespace App\Core;

use App\Core\Request;



class Routing{
    public $request = null;
    private static $routes;
    private $login_route_name = "loginform";
    
    public function __construct(){
      $this->request = new Request();
    }
    public static function add($method, $url, $controller, $middleware){
      $data = url_divider($url);
      $action = explode("@", $controller);
      $route_array = [
       "method" => $method,
       "middleware" => (count($middleware) > 0 ? $middleware : null) ,
       "url" => $data["url"],
       "controller" => "App\\Controllers\\" . $action[0],
       "action" => $action[1],
       "params" => $data["params"],
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
    private function find_param($matches = []){
     $params = [];
     if(count($matches) > 0){
      foreach($matches as $key => $val){
        if(!is_int($key)){
          $params[$key] = $val;
        }
      }
     }
     return $params;
    }

    public function run(){
      $current_url = $this->request->URI();
      $method = $this->request->method();
      foreach(self::$routes as $data){
        $result = matching_url($current_url, $data["url"]);
        if(isset($data["url"]) && $result["result"] && $data["method"] == $method){
          $data["params"] = $this->find_param($result["matches"]);
          $check_middleware = $this->check_middleware($data);
          if ($check_middleware){
            $action = $data["action"];          
            $controller = new $data["controller"];
            $controller->$action($this->request,...array_values($data["params"]));
          }
          else{
            return redirect($this->login_route_name);
          }          
       }
      }
    }
}