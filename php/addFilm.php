<?php
$title = $_POST['title'];
$desc =  $_POST['desc'];
$grade =  $_POST['grade'];
$price =  $_POST['price'];
$cover =  file_get_contents($_FILES['cover']['tmp_name']);
$cover = base64_encode($cover);

require './db.php';

insert(
    'insert into products (title, description, grade, price, cover) 
    values (:title, :desc, :grade, :price, :cover)',
    [
        'title' => $title,
        'desc' => $desc,
        'grade' => $grade,
        'price' => $price,
        'cover' => $cover,
    ]
);
header('location: ../');