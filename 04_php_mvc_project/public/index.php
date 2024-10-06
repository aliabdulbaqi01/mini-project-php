<?php

use PhpMvc\Http\Route;
use PhpMvc\Http\Request;
use PhpMvc\Http\Response;
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../routes/web.php';

$route = new Route( new Request, new Response);

//$route = new Route
$route->resolve();