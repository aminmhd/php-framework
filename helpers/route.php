<?php

use App\Core\Route;






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



