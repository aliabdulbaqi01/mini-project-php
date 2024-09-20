<?php

// return all the data from the file in the storage
function get_data(string $file) {
    $filename = __DIR__ . "/../../storage/" . $file .'.json';
    return json_decode(file_get_contents($filename), true);
}

// add data to the file in the storage
function set_data(string $file, array $data) {
    $filename = __DIR__ . "/../../storage/" . $file .'.json';
    file_put_contents($filename, json_encode($data, JSON_UNESCAPED_UNICODE));
}

// add new record in the file.
function create(string $filename, array $data) {
    $allData = get_data($filename);
    // add the input data to users data
    array_push($allData, $data);
    // add the data to the storage
    set_data($filename, $allData);
}
