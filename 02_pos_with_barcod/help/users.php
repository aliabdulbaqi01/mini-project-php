<?php
session_start();

function is_admin($email, $password, $pdo) {

    $select = $pdo->prepare("select * from users where email = '$email' AND 'password' = '$password'");
    $select->execute();
    $row = $select->fetch(PDO::FETCH_ASSOC);
    if ($row['role'] == 'admin') {
        return true;
    }
    return false;
}

function login($email, $password, $pdo) {

    $select = $pdo->prepare("select * from users where email = '$email' AND 'password' = '$password'");
    $select->execute();
    $row = $select->fetch(PDO::FETCH_ASSOC);

    if(is_array($row) && $row['email'] == $email && $row['password'] == $password){
        return  $row;
    }
    return false;
}
