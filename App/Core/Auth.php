<?php 
namespace App\Core;

use App\Models\User;

class Auth{
   public static function login($user){
     $_SESSION["user"] = $user;
     return true ? isset($_SESSION["user"]) : false;
   }
   public static function user(){
      return isset($_SESSION["user"]) ? $_SESSION["user"] : null;
   }
   public static function check(){
    return isset($_SESSION["user"]) ? true : false;
   }

   public static function logout(){
    unset($_SESSION["user"]);
    die("logout");
   }

   public static function find_user(){
      $user = self::user();
      $user = User::where(["email" => $user->email]);
      return true ? $user : false; 
   }


}