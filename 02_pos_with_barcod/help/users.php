<?php


function login($email, $password, $pdo) {

    $select = $pdo->prepare("select * from users where email = '$email' AND 'password' = '$password'");
    $select->execute();
    $row = $select->fetch(PDO::FETCH_ASSOC);

    if(is_array($row) && $row['email'] == $email && $row['password'] == $password){
        return  true;
    }
    return false;
}