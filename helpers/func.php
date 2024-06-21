<?php 
use App\Core\Route;

function asset($directory){
  $path = "/framework/public/" . $directory;
  return $path;
}

function param_to_url($url, $param){
    if(count($param) > 0){
        foreach($param as $key => $val){
          if($url[-1] != "/"){
            $url = $url . "/";
          } 
          $url .= $val;
        }
      }
  
      return $url;
  }
  
  function param_replace_to_url($url = null, $param = []){
    if(count($param) > 0){
      foreach($param as $key => $val){
        $url = str_replace("{" . $key . "}" , $val, $url);
        } 
  
      }
      return $url;
    }
  
   
  function route($name, $param = []){
      foreach(Route::$routes as $val){
        if ($val["name"] == $name){
          $url = param_replace_to_url($val["url"], $param);
          return $url;
        }
      }
  }


function view($name ,$data = []){
    extract($data);
    $path =  __DIR__ . '/../views/' . $name;
    return include $path;
}

function matching_url($current, $route){
   $pattern = "/^" . str_replace(["/", "{", "}"], ["\/", "(?<", ">[-%\w]+)"], $route) . "/";
   $result = preg_match($pattern, $current, $matches);
   $dispatch = [
    "result" => $result,
    "matches" => $matches,
   ];
   return $dispatch;
}

function url_divider($url){
  $pattern_params = "/{[a-zA-Z1-9_-]*}/";
  // $pattern_params = "/\/framework\/index\.php\/user\/delete\/[\/\w_-{}]*/";
  preg_match_all($pattern_params, $url, $params);
  $data = [
    "url" => $url,
    "params" =>  str_replace(array('{', '}'), '',$params[0]),
  ];
  return $data;
  
}

function redirect($name, $params = []){
  $route = route($name, $params);
   return header('Location: '.$route);
}

function with($category, $message, $extra = null){
  $_SESSION["flash"][] = ["cat" => $category, "message" => $message, "ext" => $extra];
}

function get_flash_message(){
  $messages = isset($_SESSION["flash"]) ? $_SESSION["flash"] : [];
  unset($_SESSION["flash"]);
  return $messages;
}



