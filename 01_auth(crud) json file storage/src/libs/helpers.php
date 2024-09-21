<?php


// for debugging which will return data with some style
function dd($data) {
    echo "<div style='color: #b7b7b7; background-color: rgba(4,11,55,0.53); padding:5px' class='container m-5'>";
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    echo "</div>";
    die();
}

function dump($data) {
    echo "<div style='color: #b7b7b7; background-color: rgba(4,11,55,0.53); padding:5px' class='container m-5'>";
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    echo "</div>";
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

/*
 * redirect to a url with data stored in the items array
 */
function redirect_with(string $url, array $item) : void
{
    foreach ($item as $key => $value) {
        $_SESSION[$key] = $value;
    }
    redirect_to($url);
}


/*
 * redirect to a URL with a flash message
 */
function redirect_with_message(string $url, string $message, string $type = FLASH_SUCCESS) : void
{
    flash('flash_'.uniqid(), $message, $type);
    redirect_to($url);
}


/*
 * flash data specified by $keys from the $_SESSION
 */
function session_flash(...$keys): array
{
    $data = [];
    foreach ($keys as $key) {
        if (isset($_SESSION[$key])) {
            $data[] = $_SESSION[$key];
            unset($_SESSION[$key]);
        } else {
            $data[] = [];
        }
    }
    return $data;
}



/*
 * get the current url of the page
 * Note: this is not the best way to do that
 * we do it this way because of the main project structure (mini projects)
 */
function current_url() {
    $url = $_SERVER['REQUEST_URI'];
    $url = array_reverse(explode('/', $url, 3));
    return $url[0];
}

