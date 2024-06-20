<?php 

namespace App\Models;

use PDO;
use PDOException;

class Model{
    private $host;
    private $database;
    private $pass;
    private $user;
    protected static $conn;
    public function __construct(){
      $this->host = $_ENV["DATABASE_HOST"];
      $this->pass = $_ENV["DATABASE_PASSWORD"];
      $this->user = $_ENV["DATABASE_USERSNAME"];
      $this->database = $_ENV["DATABASE_NAME"];
      self::$conn = $this->connect();
      
    }
    private function connect(){
       try{
          $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];
        $dsn = "mysql:host={$this->host};dbname={$this->database}";
        $pdo = new PDO($dsn, $this->user, $this->pass, $options);
        return $pdo;
       } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
    }
    public static function all(){
      $class_namespace = explode("\\", get_called_class());
      $table_name = strtolower(end($class_namespace) . "s");
      $sql = "select * from {$table_name}";
      $database = self::$conn;
      $stm = $database->prepare($sql); 
      $stm->execute();
      $data = $stm->fetchAll(PDO::FETCH_OBJ); 
      return $data;
     }

     public static function where($params = []){
      $class_namespace = explode("\\", get_called_class());
      $table_name = strtolower(end($class_namespace) . "s");
      $sql = "SELECT * FROM {$table_name} WHERE";
      $i = 1;
      foreach($params as $key => $val){
      if ($i == count($params)){
         $sql .= " {$key}='{$val}'";
      }else{
         $sql .= " {$key}='{$val}' and";
      }
      $i ++;
     }
     $database = self::$conn;
     $stm = $database->prepare($sql); 
     $stm->execute();
     $data = $stm->fetch(PDO::FETCH_OBJ); 
     return $data; 
   }

   public static function find($id){
    $class_namespace = explode("\\", get_called_class());
    $table_name = strtolower(end($class_namespace) . "s");
    $sql = "select * from {$table_name} where id={$id}";
    $database = self::$conn;
    $stm = $database->prepare($sql); 
    $stm->execute();
    $data = $stm->fetch(PDO::FETCH_OBJ); 
    return $data;
 }
 
 
 public static function delete($id){
    $class_namespace = explode("\\", get_called_class());
    $table_name = strtolower(end($class_namespace) . "s");
    $sql = "delete from {$table_name} where id={$id}";
    $database = self::$conn;
    $stm = $database->prepare($sql); 
    $stm->execute();
    return $stm->rowCount();
 }
 
 public static function create($data = []){
    $class_namespace = explode("\\", get_called_class());
    $table_name = strtolower(end($class_namespace) . "s");
    $keys = array_keys($data);
    $columns = implode(",", $keys);
    $values = ":". implode(" ,:", $keys);
    $sql = "insert into {$table_name} ({$columns}) values ({$values})";
    $database = self::$conn;
    $stm = $database->prepare($sql); 
    $stm->execute($data);
    return $stm->rowCount();

 }









}