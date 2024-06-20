<?php 


namespace App\Models;
use App\Models\Model;
use PDO;


class User extends Model {
    protected static $db;
    

   public function __construct(){
      self::$db = parent::$conn;
   }   
   public static function update(){
     
   }
   

}