<?php

/*
 * generate token
 */
function csrf() {
    $_SESSION['token'] = bin2hex(random_bytes(35));
}


/*
 * hidden input that contain token
 */
function csrf_input() {
    $token = $_SESSION['token'] ?? '';
    return "<input type=\"hidden\" name=\"token\" value=\"$token\">";
}

/*
 * verify token
 */
function csrf_verify(): bool {
    $token = filter_input(INPUT_POST, 'token', FILTER_UNSAFE_RAW);

    if(!$token || $token !== $_SESSION['token']) {
        echo "<p class=\"error\">Error: invalid form submission.</p>";

        header($_SERVER['SERVER_PROTOCOL'].' 405 Method Not Allowed');
        exit();
    }
    return true;
}