<?php
require_once __DIR__ . "/../src/bootstrap.php";
$errors = [];
$method = strtoupper($_SERVER["REQUEST_METHOD"]);

if($method === "POST") {
    $inputs = [
            'name' => trim($_POST["name"]),
            'email' => trim($_POST["email"]),
            'password' => trim($_POST["password"]),
            'password_confirmation' => trim($_POST["password_confirmation"]),
    ];


    $errors = register($inputs);
    $_SESSION["errors"] = $errors;
    $_SESSION["inputs"] = $inputs;

} elseif($method === "GET") {

    if(isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']);
    }

    if(isset($inputs)) {
        $data = $_SESSION['inputs'];
        unset($_SESSION['inputs']);
    }
}

view('header', ['title' => 'Register']);
?>
    <div class="container mt-5">
        <div class="row justify_content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="card-center">Register Form</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name" class="form-control"
                                       value="<?= isset($data['name']) ? $data['name'] : '' ?>">
                                <p class="error text-danger"><?= @$errors['name'] ?></p>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                       value="<?= isset($data['email']) ? $data['email'] : '' ?>">
                                <p class="error text-danger"><?= @$errors['email'] ?></p>
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control">
                                <p class="error text-danger"><?= @$errors['password'] ?></p>

                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="form-label">Password Confirmation</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                <p class="error text-danger"><?= @$errors['password_confirmation'] ?></p>

                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        <p class="text-center">I already have an account? <a href="login.php">Login</a></p>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php
view('footer');