<?php 
namespace App\Core;


class Request{
    public $PARAMS;
    public $HTTP_HOST;
    public $REQUEST_METHOD;
    public $REQUEST_URI;
    public $QUERY_STRING;
    public $DOCUMENT_ROOT;
    
    public function __construct(){
        $this->PARAMS = $_REQUEST;
        $this->HTTP_HOST = $_SERVER["HTTP_HOST"];
        $this->REQUEST_METHOD = $_SERVER["REQUEST_METHOD"];
        $this->REQUEST_URI = $_SERVER["REQUEST_URI"];
        $this->QUERY_STRING = $_SERVER["QUERY_STRING"];
        $this->DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
    }
    


    public function host(){
        return $this->HTTP_HOST;
    }
    public function params(){
        return $this->PARAMS ?? [];
    }
    public function get($key){
        return $this->PARAMS[$key] ?? null;
    }
    public function method(){
        return $this->REQUEST_METHOD;
    }
    public function URI(){
        return strtok($this->REQUEST_URI, '?');
    }
    public function queries(){
        return $this->QUERY_STRING;
    }
    public function get_route(){
        return $this->DOCUMENT_ROOT;
    }
}