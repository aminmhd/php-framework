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

   public static function update(){
   
   }
   
   
   public static function where($params = []){
      $table = strtolower(basename(__CLASS__)) . "s";
      $sql = "SELECT * FROM {$table} WHERE";
      $i = 1;
      foreach($params as $key => $val){
      if ($i == count($params)){
         $sql .= " {$key}='{$val}'";
      }else{
         $sql .= " {$key}='{$val}' and";
      }
      $i ++;
     }
     var_dump($sql);
     $database = self::$db;
     $stm = $database->prepare($sql); 
     $stm->execute();
     $data = $stm->fetch(PDO::FETCH_OBJ); 
     return $data;
     
   }

   public static function find($id){
      $table = strtolower(basename(__CLASS__)) . "s";
      $sql = "select * from {$table} where id={$id}";
      $database = self::$db;
      $stm = $database->prepare($sql); 
      $stm->execute();
      $data = $stm->fetch(PDO::FETCH_OBJ); 
      return $data;
   }

   
   public static function delete($id){
      $table = strtolower(basename(__CLASS__)) . "s";
      $sql = "delete from {$table} where id={$id}";
      $database = self::$db;
      $stm = $database->prepare($sql); 
      $stm->execute();
      return $stm->rowCount();
   }
   public static function create($data = []){
      $table = strtolower(basename(__CLASS__)) . "s";
      $keys = array_keys($data);
      $columns = implode(",", $keys);
      $values = ":". implode(" ,:", $keys);
      $sql = "insert into {$table} ({$columns}) values ({$values})";
      $database = self::$db;
      $stm = $database->prepare($sql); 
      $stm->execute($data);
      return $stm->rowCount();
      
   }

}