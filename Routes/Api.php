<?php

namespace Routes;

use App\Http\Middleware\AuthMiddleware;

class Api
{
    public function links()
    {
        $login = ["/login", "\App\Controllers\AuthController", 'login'];
        $register = ["/register", "\App\Controllers\AuthController", 'register'];
        $welcome = ["/", "\App\Controllers\WelcomeController", 'index'];
        
        //check auth
        $auth = new AuthMiddleware();
        if ($auth->auth()) {

            $leaveRequest = ["/leaveRequest", "\App\Controllers\CongesController", 'leaveRequest'];
            $requests = ["/requests", "\App\Controllers\CongesController", 'requests'];
            $getAllUsers = ["/getAllUsers", "\App\Controllers\AdminController", 'getAllUsers'];

            return compact('leaveRequest','requests','getAllUsers');
        } else {
            return compact('welcome','login', 'register');
        }
    }
}
