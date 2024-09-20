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
    if (isset($_SESSION['user']) && $_SESSION['user']['role'] !== 'admin') {
        redirect_to('index');
    }
}