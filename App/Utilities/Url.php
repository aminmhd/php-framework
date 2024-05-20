<?php 
namespace App\Utilities;

class Url{
    private const BASE_URL = "http://localhost";

    public static function current_url(){
        return self::BASE_URL . $_SERVER["REQUEST_URI"];
    }
    
    public static function base_url(){
        return strtok(self::BASE_URL . $_SERVER["REQUEST_URI"], "?");
    }
}
