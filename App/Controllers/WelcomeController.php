<?php

namespace App\Controllers;

use \App\Http\Response;
class WelcomeController
{

    public function index()
    {
        $response = new Response("welcome to holiday manager");
        $response->render();
    }
}
