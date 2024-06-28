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
        session_maker(["error" => "You need to login first, you don't have access to this page!"]);
        return redirect($this->login_page);
      }
    }
  
