<?php 


namespace App\Controllers;

use App\Models\User;

use function App\Utilities\view;

class UserController{
    public function index(){
      $data = User::all();  
      return view("users/table.php", ['data' => $data]);
      
    }
    public function create(){
        
    }
    public function store(){

    }
    public function edit($id){
       var_dump($id);
    }
    public function update(){
     
    }
    public function delete($id){
     var_dump("delete");
     var_dump($id);
    
    }

}