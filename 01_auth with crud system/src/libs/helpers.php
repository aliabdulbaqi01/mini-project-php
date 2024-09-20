<?php


// for debugging which will return data with some style
function dd($data) {
    echo "<div style='color: #b7b7b7; background-color: rgba(4,11,55,0.53); padding:5px'>";
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    echo "</div>";
    die();
}


/*
 * require file from the inc
 */
function view(string $fileName, array $data = []) {
    foreach ($data as $key => $value) {
        $$key = $value;
    }
    require_once __DIR__ . "/../inc/$fileName.php";
}

/*
 * redirect with the name of the file without extension
 */

function redirect_to(string $url) {
    header("Location: $url.php");
    exit;
}