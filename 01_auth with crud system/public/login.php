<?php
require_once __DIR__ . "/../src/bootstrap.php";
$errors = [];
$method = strtoupper($_SERVER["REQUEST_METHOD"]);

if($method === "POST") {
    $inputs = [
        "email" => $_POST["email"],
        'password' => $_POST["password"]
    ];

    $errors = login($inputs);


    $_SESSION['errors'] = $errors;
    $_SESSION['inputs'] = $inputs;
}
elseif ($method === "GET")
{
    if(isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']);
    }

    if(isset($_SESSION['errors'])) {
        $data = $_SESSION['inputs'];
        unset($_SESSION['inputs']);
    }
}

view('header', ['title' => 'Login']);
?>
<div class="container mt-5">
    <div class="row justify_content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="card-center">Login Form</h2>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                   value="<?=  $data['email'] ?? '' ?>">
                            <p class="error text-danger"><?= @$errors['email'] ?></p>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                            <p class="error text-danger"><?= @$errors['password'] ?></p>

                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
                <div class="card-footer">
                    <p class="text-center">I don't have an account? <a href="register.php">Register</a></p>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
view('footer');