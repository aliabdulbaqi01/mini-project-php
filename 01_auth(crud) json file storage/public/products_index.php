<?php
require_once __DIR__ . "/../src/bootstrap.php";
admin();
$products = get_data('products');
view('header', ['title' => 'Products']);

?>




<div class="container mt-5">
<h1>all products</h1>
    <a href="products_create.php" class="btn btn-primary">Add new product</a>
    <table class="table mt-2">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">image</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>

            <?php foreach($products as $product): ?>
                <tr>
                    <th scope="row"><?= htmlspecialchars($product['id'])?></th>
                    <td><?= htmlspecialchars($product['title'])?></td>
                    <td><?= htmlspecialchars($product['description'])?></td>
                    <td><img width="50px" src="<?= htmlspecialchars($product['image'])?>" alt="product image"></td>
                    <td>
                        <a href="#" class="btn btn-success">show</a>
                        <a href="#" class="btn btn-info">edit</a>
                        <a href="#" class="btn btn-danger">delete</a>
                    </td>
                </tr>
<?php endforeach;?>

        </tbody>
    </table>
</div>

<?php

view('footer');