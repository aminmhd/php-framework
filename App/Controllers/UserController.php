<?php 


namespace App\Controllers;

use App\Models\User;



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
    public function delete($request,$id){
      // User::delete($id);
      with("success", "your User has been successfully removed!");
      return redirect("user.index");
    }

}
