<?php 

namespace App\Controllers\Auth;

use App\Core\Request;
use App\Models\User;
use App\Core\Auth;
class AuthController{
    
    private $redirect_after_true_login = "user.index";
    private $redirect_after_false_login = "loginform";
    private $username = "email";
    private $password = "password";
    
    public function loginform(){
      return view("auth/login.php");
    }
    public function login(Request $request){
      $user = User::where([$this->username => $request->get("username")]);
      if ($user){
        if($request->get($this->password) == $user->password){
          $auth = Auth::login($user);
          return redirect($this->redirect_after_true_login) ? $auth : die("There is a problem when user was logged in");
        }
      }else{
         return redirect($this->redirect_after_false_login);
      }
    } 
    
    public function registerform(){
     return view("auth/register.php");
    }

    
    public function register(Request $request){
       $data = $request->params();
       $data["role"] = 2;
       User::create($data);
       return redirect($this->redirect_after_false_login);
    }
    public function logout(){
      Auth::logout();
    } 

}
