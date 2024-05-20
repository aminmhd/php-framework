<?php 

namespace App\Middleware;
use App\Models\User;
use App\Core\Auth;

class UserMiddleware{

    public function handle($data = null){
      return true ? Auth::check() : false;
    }
    
}
