<?php
session_start();
require './php/db.php';
$films = select('select * from films');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/styles/css/style.css">
    <title>Kinomain</title>
</head>
<body>
<?php require './Modules/header.php' ?>
<img class="bg" src="assets/styles/img/background.jpg" alt="background">
<div class="container">
    <?php foreach ($films as $film): ?>
        <div class="item">
            <img src="data:image/png;base64,<?=$film['cover'] ?>" alt="cover">
            <h3 class="film_item"><?= $film['title']?></h3>
            <div class="raiting"><?=$film['raiting']?></div>
            <span class="desc"><?=$film['desc']?></span>
            <span class="rating"><?=$film['grade']?>⭐</span>
            <span class="price"><?=$film['price']?>P</span>
            <a href="./pages/film.php?id=<?=$film['id'] ?>">Подробнее</a>
        </div>
    <?php endforeach;;?>
</div>
</body>
</html>
