<?php
session_start();
var_dump($_SESSION);
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
    <link rel="stylesheet" href="./assets/style/style.css">
    <title>Document</title>
</head>
<body>
<?php require './Modules/header.php' ?>
<div class="container">
    <?php foreach ($films as $film): ?>
        <div class="item">
            <img src="data:image/jpg;base64,<?=$film['cover'] ?>" alt="cover">
            <h3 class="film_item"><?= $film['title']?></h3>
            <div class="raiting"><?=$film['raiting']?></div>
            <span class="desc"><?=$film['desc']?></span>
            <span class="price"><?=$film['price']?></span>
            <a href="./pages/film.php?id=<?=$film['id'] ?>">Подробнее</a>
        </div>
    <?php endforeach;;?>
</div>
</body>
</html>
