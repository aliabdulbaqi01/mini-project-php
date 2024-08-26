<?php
try{

$pdo = new PDO('mysql:host=localhost;dbname=pos_barcode', 'root', '');
} catch (PDOException $e) {
    echo $e->getMessage();
}

