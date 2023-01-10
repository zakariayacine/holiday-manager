<?php

namespace App\Controllers;

use \App\Http\Response;
use App\Http\Exceptions;
use App\Models\Utilisateur;
use App\Http\Middleware\RoleMiddleware;

class AdminController
{
  public function getAllUsers()
  {
        $role = new RoleMiddleware();
        $data = $role->admin();
        if (isset($data)) {
        $user = new Utilisateur();
        $datas = $user->selectAll("SELECT * FROM `utilisateurs`;");
        //return token
        $response = new Response($datas);
        $response->render();
        }else{
            $error = new Exceptions("Unauthorized");
            $error->error();
        }
  }

}
