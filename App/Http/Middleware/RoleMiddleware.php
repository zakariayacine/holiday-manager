<?php

namespace App\Http\Middleware;

use App\Models\Utilisateur;

class RoleMiddleware
{
    public function emp()
    {
        $user = new Utilisateur();
        return $this->role($_REQUEST['token'],$user,'emp');
    }

    public function admin()
    {
        $user = new Utilisateur();
        return $this->role($_REQUEST['token'],$user,'admin');
    }

    public function manager()
    {
        $user = new Utilisateur();
        return $this->role($_REQUEST['token'],$user,'manager');
    }
    private function role($token, $user ,$role){
        if (isset($token)) {
            $data = $user->getUser($token);
            if ($data) {
                if($data['role'] == $role){
                    return $data;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
