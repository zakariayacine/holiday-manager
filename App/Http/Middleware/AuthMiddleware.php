<?php

namespace App\Http\Middleware;

use App\Models\Utilisateur;

class AuthMiddleware
{
    public function auth()
    {
        $user = new Utilisateur();
        if (isset($_REQUEST['token'])) {
            if ($user->getUser($_REQUEST['token'])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
