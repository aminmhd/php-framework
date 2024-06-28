<?php 

namespace App\Middleware;
use App\Core\Auth;


class UserMiddleware{
    public $next = true;
    public $login_page = "loginform";
    public function handle($data = null){
      if (Auth::check() && Auth::find_user()){
        return $this->next;
      }else
        return redirect(name: $this->login_page , messages: ["error" => "You don't have access to this page. Please login first !"]);
      }
    }
  
