<?php 


namespace App\Controllers;

use App\Models\User;

use function App\Utilities\view;

class UserController{
    public function index(){
      $data = User::all();
      return view("front.php", ['data' => $data]);
      
    }
    public function create(){
        
    }
    public function store(){

    }
    public function edit(){

    }
    public function update(){

    }
    public function delete(){

    }

}
