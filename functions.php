<?php

// require MySQL Connection
require ('DBController.php');

// require Product Class
require ('Product.php');

// require Cart Class



// DBController object
$db = new DBController();

// Product object
$product = new Product($db);
$product_shuffle = $product->getData();
$product_shuffle1 = $product->getData1();
$product_shuffle2 = $product->getData2();
$product_shuffle3 = $product->getData3();

