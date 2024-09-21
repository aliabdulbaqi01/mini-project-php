<?php
require_once "../src/bootstrap.php";
admin();

$method = strtoupper($_SERVER['REQUEST_METHOD']);
if($method === "POST" && csrf_verify()) {

    $inputs = [
            'title' => $_POST['title'],
        'description' => $_POST['description'],
        'image' => $_POST['image'],
    ];
    $errors = addProduct($inputs);
    $_SESSION['errors'] = $errors;
    $_SESSION['inputs'] = $inputs;
} elseif($method === "GET")
{
    csrf();
    if(isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']);
    }
    if(isset($_SESSION['inputs'])) {
        $inputs = $_SESSION['inputs'];
        unset($_SESSION['inputs']);
    }

}
  view('header', ['title' => 'Create Products']);
?>



    <div class="container mt-5">
        <div class="row justify_content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header ">
                        <h2 class="card-center">Add new Product</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <?= csrf_input() ?>
                            <div class="form-group">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" name="title" class="form-control"
                                       value="<?=  $data['title'] ?? '' ?>">
                                <p class="error text-danger"><?= @$errors['title'] ?></p>
                            </div>
                            <div class="form-group">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="description" placeholder="description"><?= $data['description'] ?? '' ?></textarea>
                                <p class="error text-danger"><?= @$errors['description'] ?></p>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="image">image</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary btn-block">Add new Product</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>




<?php
view('footer');