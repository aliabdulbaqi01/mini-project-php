<?php
include_once  __DIR__ . '/../src/bootstrap.php';
view('header', ['title' => 'Home']);


?>

<h1>hello in index go to <a href="login.php">Login</a></h1>


<?php
view('footer');
