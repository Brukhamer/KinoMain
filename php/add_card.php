<?php
session_start();
$user_id = $_SESSION['user_id'];
$film_id = $_POST['id'];

require './db.php';


insert(
    'insert into card ( user_id, film_id) values (:user_id, :product_id)',
    [
        'user_id' => $user_id,
        'product_id' => $film_id,
    ]

);
header('location: ../pages/product.php?id='.$film_id);