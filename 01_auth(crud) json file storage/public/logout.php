<?php
require_once "../src/bootstrap.php";

$method = strtoupper($_SERVER["REQUEST_METHOD"]);
if($method === 'POST' && csrf_verify()) {
logout();
}
redirect_to('index.php');

