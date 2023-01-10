<?php

namespace App\Http;

use Routes\Api;
use App\Http\Exceptions;
use App\Http\Middleware\AuthMiddleware;

class Router
{

    private $url;
    private $request;

    function __construct($url, $request)
    {
        $this->url = $url;
        $this->request = $request;
    }

    public function handel()
    {
            $api = new Api();
            return  $this->matcher($api->links());
    }

    private function matcher($links)
    {
        $className = null;
        $methodeName = null;
        foreach ($links as $link) {
            if ($this->url === $link[0]) {
                $className = $link[1];
                $methodeName = $link[2];
            }
        }

        if ($className || $methodeName) {

            $data = new $className();
            if ($this->request) {
                try {
                    return  $data->$methodeName($this->request);
                } catch (\Throwable $th) {
                    echo $th;
                    // $response = new Exceptions("Method not allowed 1");
                    // $response->error();
                }
                
            } else {
                try {
                    return  $data->$methodeName();
                } catch (\Throwable $th) {
                    echo $th;
                    // $response = new Exceptions($th);
                    // $response->error();
                }
            }
        } else {
            $response = new Exceptions("404");
            $response->error();
        }
    }
}
