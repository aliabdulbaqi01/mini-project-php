<?php


// check if the user exist return it data
function is_user_exist(string $email ): array|bool {
    $users = get_data('users') ;

    foreach ($users as $user) {
        if ($user['email'] == $email) {
            return $user;
        }
    }
    return false;
}

// for new user to register in the file storage
function register(array $inputs) :array {

    $errors = [];

    if(is_user_exist($inputs['email'])) {
         $errors['email'] = 'Email is already registered';
         return $errors;
    }
    // the validation
    $fields = [
        'name' => 'string | min:2',
        'email' => 'email | min:5',
        'password' => 'string | min:8',
        'password_confirmation' => 'string | min:8 | same:password',
    ];
    [$inputs, $errors] = filter($inputs, $fields);

    // set the data to store
    $data = [
        'name' => $inputs['name'],
        'email' => $inputs['email'],
        'password' => password_hash($inputs['password'], PASSWORD_DEFAULT),
        'role' => 'user',
        'created_at' => date('Y-m-d H:i:s',time()),
    ];

    if(!$errors) {
        create('users', $data);
        redirect_to('login');
    }
return $errors;
}



function login(array $inputs) :array
{
    // validation
    $validation = [
        'email' => 'email | min:5',
        'password' => 'string',
    ];

    [$inputs , $errors] = filter($inputs, $validation);
    if(!$errors) {
        // return user if it exist
        $user = is_user_exist($inputs['email']);
        if ($user) {

            // check if the password identical to the stored password
            if (password_verify($inputs['password'], $user['password'])) {
                $_SESSION['user'] = $user;
                redirect_to('index');
            }

            $errors['password'] = 'Wrong password';
            return $errors;
        }
        $errors['email'] = 'Email is not exist';
    }

    return $errors;
}