<?php 
namespace App\Utilities;


function view($name ,$data = []){
    extract($data);
    $path =  __DIR__ . '/../../views/' . $name;
    return include $path;
}