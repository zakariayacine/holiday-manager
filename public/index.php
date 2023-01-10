<?php

use App\Http\Router;

require "../autoload.php";
$route = new Router($_SERVER["REQUEST_URI"], $_REQUEST);
$route->handel();
