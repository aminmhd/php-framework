<?php 

namespace App\Middleware;
use App\Models\User;

class UserMiddleware{
    public function handle($data = null){
        return true;
    }
    
}
