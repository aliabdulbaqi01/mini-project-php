<?php


function auth() {
    if(!isset($_SESSION['user'])) {
        redirect_to('login');
    }
}

function guest()
{
    if (isset($_SESSION['user'])) {
        redirect_to('index');
    }
}


function is_admin() {
    if ($_SESSION['user']['role'] === 'admin') {
        return true;
    }
    return false;
}
function admin() {
    if ($_SESSION['user']['role'] !== 'admin') {
        redirect_to('index');
    }
}