<?php
session_start();
require '../php/db.php';

$id = $_GET['id'];
$film = select('select * from films where id =:id', ['id =>$id']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Film</title>
</head>
<body>
<?php require '../Modules/header.php'?>
<?php foreach ($film as $row):?>
    <img src="data:image/jpg;base64, <?=$row['cover']?>" alt="cover">
    <h3><?=$row['desc']?></h3>
    <span><?=$row['grade']?>*</span>
    <span><?=$row['price']?>P</span>
    <form action="../"></form>
<?php endforeach; ?>
</body>
</html>
