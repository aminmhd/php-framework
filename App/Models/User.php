<?php 


namespace App\Models;
use App\Models\Model;
use PDO;


class User extends Model {
    protected static $db;

   public function __construct(){
      self::$db = parent::$conn;
   }
   
   public static function all(){
    $table = strtolower(basename(__CLASS__)) . "s";
    $sql = "select * from {$table}";
    $database = self::$db;
    $stm = $database->prepare($sql); 
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_OBJ); 
    return $data;
   }
   public static function create(){
    var_dump(self::$db);
   }

   public static function update(){

   }



}