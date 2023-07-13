<?php
spl_autoload_register();

use App\Controllers\ProductController;


$productController = new ProductController();


// var_dump($_GET);


if (isset($_GET['action']) && $_GET['action'] === 'create') {
    $productController->create();
    exit;
}


if (isset($_GET['action']) && $_GET['action'] === 'show' && isset($_GET['id'])) {
    $productController->show($_GET['id']);
    exit;
}

$productController->index();
