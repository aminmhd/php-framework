<?php 
namespace App\Utilities;


function view($name ,$data = []){
    include_once BASEPATH . "helpers/route.php";
    extract($data);
    $path =  __DIR__ . '/../../views/' . $name;
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
  // var_dump($url);
  // $url = "http://localhost/framework/index.php/user/delete/1";
  $pattern_params = "/{[a-zA-Z1-9_-]*}/";
  // $pattern_params = "/\/framework\/index\.php\/user\/delete\/[\/\w_-{}]*/";
  preg_match_all($pattern_params, $url, $params);
  // $result = preg_match($pattern_params, $url, $matches);
  // $url = preg_replace($pattern_params, "" ,$url);
  $data = [
    "url" => $url,
    "params" =>  str_replace(array('{', '}'), '',$params[0]),
  ];
  // var_dump($matches);  
  return $data;
  
}