<?php

namespace App\Models;

use App\Illuminate\Helpers;

class Utilisateur  extends Methods
{
    public $columns = ['token', 'nom', 'password', 'email', 'role'];
    public $table = "utilisateurs";

    public function UserVerify($request)
    {
        $sql = "SELECT `email`, `password`, `token` FROM `utilisateurs` WHERE email =\"" . $request['email'] . "\" LIMIT 1;";
        $userData = $this->select($sql);
        $helpers = new Helpers();
        if (!$helpers->passwordVerify($request['password'], $userData['password'])) {
            return false;
        }
        return $userData;
    }

    public function getUser($token)
    {
        $sql = "SELECT `id` , `token`, `role` FROM `utilisateurs` WHERE token =\"" . $token . "\" LIMIT 1;";
        $userData = $this->select($sql);
        if ($userData) {
            return $userData;
        } else {
            return null;
        }
    }
}
