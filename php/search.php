<?php
require './db.php';
$name = $_GET['name'];
$id = select('select id from products where title = :title',
    ['title' => $name]
);
if (!empty($id)){
    header('location: ../pages/product.php?id='.$id[0]['id']);
}else
    header('location: ../');
