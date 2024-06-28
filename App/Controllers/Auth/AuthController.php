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
      $user = User::where([$this->username => $request->get("email")]);
      if ($user){
        if($request->get($this->password) == $user->password){
          $auth = Auth::login($user);
          with("success", "You are successfully logged in.");
          return redirect($this->redirect_after_true_login) ? $auth : die("There is a problem when user was logged in");
        }
      }else{
         with("error", "You didn't login, there are some problems with your login information!");
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
       with("success", "You are successfully registered");
       return redirect($this->redirect_after_false_login);
    }
    public function logout(){
      
      Auth::logout();
      with("success", "You are successfully logged out!");
      return redirect($this->redirect_after_false_login);
    } 

}
