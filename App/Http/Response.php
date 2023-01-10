<?php

namespace App\Http;

class Response {
    private $data;

    function __construct($data)
    {
        $this->data = $data;
    }

    public function render(){
        header("Content-Type: application/json");
        echo json_encode(['response' =>  $this->data]);
    }
}