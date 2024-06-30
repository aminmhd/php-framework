<?php

use App\Core\Request;
use App\Core\Route;
use App\Utilities\Url;

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
   $request = new Request();
   $pattern = "/^" . str_replace(["/", "{", "}"], ["\/", "(?<", ">[-%\w]+)"], $route) . "/";
   $result = preg_match($pattern, $current, $matches);
   $dispatch = [
    "result" => $result,
    "matches" => $matches,
   ];
   foreach ($dispatch["matches"] as $key => $val){
    if ($key == 0 && $request->URI() != $val){
      
      return [];
    }
   }
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

function redirect($name, $params = [], $messages = []){
   $route = route($name, $params);
   foreach($messages as $category => $message ){
    $_SESSION["flash"][] = ["cat" => $category, "message" => $message, "url" => $route ];
   }
   
   return header('Location: '.$route);
}

function with($category, $message, $route_name ,$extra = null){
  $_SESSION["flash"][] = ["cat" => $category, "message" => $message, "ext" => $extra, "url" => route($route_name)];
}

function session_maker($data = []){
  foreach($data as $key => $value){
    $_SESSION[$key] = $value; 
  }
  return true;
}

function get_session($name, $unset = true){
 $session = $_SESSION[$name];
 if ($unset) { unset($_SESSION[$name]); }
 return $session; 
}

function get_flash_message($unset = true){
  $messages = isset($_SESSION["flash"]) ? $_SESSION["flash"] : [];
  $corresponded_messages = [];
  foreach ($messages as $message){
    if ($message["url"] == $_SERVER["REQUEST_URI"]){
      $corresponded_messages[] = $message;
      if ($unset) { unset($_SESSION["flash"]); }
    }
  }
  return $corresponded_messages;
}






