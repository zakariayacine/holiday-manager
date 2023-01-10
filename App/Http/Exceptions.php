<?php

namespace App\Http;

class Exceptions {

    private $code;

    function __construct($code)
    {
        $this->code = $code;
    }
    public function error(){
        header("Content-Type: application/json");
        echo json_encode(['Error' =>  $this->code]);
    }

}