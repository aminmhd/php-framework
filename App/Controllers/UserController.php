<?php 


namespace App\Controllers;

use App\Core\Request;
use App\Models\User;


class UserController{
    public function index(){
      $data = User::all(); 
      return view("users/table.php", ['data' => $data]);
    }
    public function create(){
      return view("users/form.php");
    }
    public function store(Request $request){
      User::create($request->params());
      with("success", "You are successfully created the record.", "user.index");
      return redirect("user.index");
    }
    public function edit($id){
       var_dump($id);
    }
    public function update(){
      
    }
    public function delete($request,$id){
      User::delete($id);
      with("success", "your User has been successfully removed!", "user.index");
      return redirect("user.index");
    }
    

}
