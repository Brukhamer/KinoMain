<?php
session_start();
require '../php/db.php';

$id = $_GET['id'];
$film = select('select * from films where id =:id', ['id' =>$id]);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/styles/css/style.css">
    <title>Film</title>
</head>
<body>
<?php require '../Modules/header.php'?>
<?php foreach ($film as $row):?>
    <img style="width: 250px; height: 250px;" src="data:image/png;base64,<?= $row['cover']?>" alt="">
    <h3><?=$row['desc']?></h3>
    <span><?=$row['grade']?>⭐</span>
    <span><?=$row['price']?>P</span>

    <form action="../php/add_card.php" method="post"><input style="display: none" type="text" value="<?=$_GET['id'] ?>" name='id'><input type="submit" value="Купить"></form>
<?php endforeach; ?>
</body>
</html>
