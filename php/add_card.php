<?php
session_start();
$user_id = $_SESSION['user_id'];
$product_id = $_POST['id'];

require './db.php';


insert(
    'insert into card ( user_id, product_id) values (:user_id, :product_id)',
    [
        'user_id' => $user_id,
        'product_id' => $product_id,
    ]

);
header('location: ../pages/product.php?id='.$product_id);