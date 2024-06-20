<?php 

namespace App\Middleware;
use App\Core\Auth;

class UserMiddleware{
    public function handle($data = null){
      return true ? Auth::check() && Auth::find_user() : false;
    }
}
