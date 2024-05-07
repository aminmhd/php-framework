<?php 
namespace App\Utilities;


function view($name ,$data = []){
    extract($data);
    $path =  __DIR__ . '/../../views/' . $name;
    return include $path;
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