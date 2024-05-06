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


}