<?php

namespace App\Controllers;

use App\Http\Exceptions;
use App\Http\Middleware\RoleMiddleware;
use \App\Models\Conge;
use \App\Http\Response;
use App\Illuminate\Helpers;

class CongesController
{

    public function leaveRequest($request)
    {
        $role = new RoleMiddleware();
        $data = $role->emp();
        if(isset($data)){
            /*do logic check if he can or not applay for leave request
            *
            *
            *
            *
            *
            */

            $helper = new Helpers();
            $request = $helper->congesRequestBinder($request ,$data['id']);
            //insert date
            $conge = new conge();
            $conge->create($request, $conge->table, $conge->columns);
            //returning message
            $response = new Response("date applied successfully");
            $response->render();
        }else{
            $error = new Exceptions("Unauthorized");
            $error->error();
        };

        
    }

    public function requests($request)
    {
        $role = new RoleMiddleware();
        $data = $role->emp();
        if(isset($data)){
            $conge = new conge();
            $conge->getAllPersonalRequest($data['id']);
            //returning message
            $response = new Response(["Requests"=>$conge->getAllPersonalRequest($data['id'])]);
            $response->render();
        }else{
            $error = new Exceptions("Unauthorized");
            $error->error();
        };
    }
}
