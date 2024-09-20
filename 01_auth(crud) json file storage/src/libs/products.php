<?php



// create new product
function createProduct(array $product) :void{
    $products = get_data('products');
    $id = end($products)['id'];
    $data = [
        'id' => $id + 1,
        'title' => $product['title'],
        'description' => $product['description'],
        'image' => 'uploads/product_images' .$product['image'],
        'created_at' => date("Y-m-d H:i:s", time()),
        'updated_at' => null,
    ];
    array_push($products, $data);
    set_data('products', $products);
}


function addProduct($inputs)  {

    $fields = [
        'title' => 'string',
        'description' => 'string',
    ];

    [$inputs, $errors ]= filter($inputs, $fields);

    if (!$errors) {
        createProduct($inputs);
        redirect_to('products_index');
    }
    return $errors;
}

function getProducts(string $id) {
    $products = get_data('products');

    foreach ($products as $product) {
        if ($product['id'] == $id) {
            return $product;
        }
    }
    return false;
}