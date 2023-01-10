<?php

namespace App\Controllers;

use App\Http\Exceptions;
use \App\Http\Response;
use App\Illuminate\Helpers;
use App\Models\Utilisateur;

class AuthController
{
  public function register($request)
  {
    //preapre request
    $helpers = new Helpers();
    $token = $helpers->token();
    $request = $helpers->registerRequestBinder($request, $helpers->hash($request['password']), $token);
    //create user
    $user = new Utilisateur();
    $user->create($request, $user->table, $user->columns);
    //return token
    $response = new Response($token);
    $response->render();
  }

  public function login($request)
  {
    $user = new Utilisateur();
    $userData = $user->UserVerify($request);
    if ($userData) {
      $response = new Response(['token' => $userData['token']]);
      $response->render();
    } else {
      $exception = new Exceptions("wrong credentials");
      $exception->error();
    }
  }
}
