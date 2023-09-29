<?php
session_start();
require '../php/db.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <title>Страница добавления фильма</title>
</head>
<body>
    <?php require '../modules/header.php'?>
    <form class="add" action="../php/addFilm.php" method="post" enctype="multipart/form-data">
        <label class="title">Название фильма<input type="text" placeholder="Название фильма" name="title" required></label>
        <label class="desc_prod">Описание фильма<textarea placeholder="Описание фильма" rows="10" cols="30" name="desc" required></textarea></label>
        <label class="grade">Рейтинг<input type="number" name="grade" step="0.1" required></label>
        <label class="price">Цена<input type="number" name="price" required></label>
        <label class="cover">Обложка<input type="file" name="cover" required></label>
        <input type="submit" value="Добавить фильм">
    </form>

</body>
</html>