<?php
session_start();
require '../php/db.php';

$user = select('select login, fio from users where id= :id', ['id' => $_GET['id']]);
$cards = select('select film_id, id from card where user_id =  :id', ['id' => $_GET['id']]);

$i = 0;
while ($i < count($cards)){
    $id = $cards[$i]['film_id'];
    $films[$i] = select('select * from films where id= :id ' ,
        ['id' => $id]);
    $films[$i][0][] = ['card_id' =>$cards[$i]['id']];
    $i++;

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <title>Профиль</title>
</head>
<body>
<?php require '../modules/header.php'?>
<div class="container" style="width: 1200px; margin: 0 auto;">
    <h1><?= $user[0]['fio'] ?></h1>
    <span>@<?= $user[0]['login']?></span>
    <form action="../php/logout.php" method="post"><input type="submit" value="Выйти"></form>
    <form action="../php/edit.php" method="post"><input type="submit" value="Изменить данные"></form>
    <div class="card">
        <?php foreach ($films as $film):  ?>
            <div class="card_item">
                <img src="data:image/png;base64,<?php echo $film[0]['cover'] ?>" alt="">
                <h3 class="card_title"><?= $film[0]['title']  ?></h3>
                <span class="card_desc"><?= $film[0]['desc']  ?></span>
                <span class="card_price"><?= $film[0]['price']  ?></span>
                <form action="../php/delite.php" method="post"><input style="display: none;" type="text" value="<?= $film[0][0]['card_id']  ?>" name="id"><input type="submit" value="🛒"></form>
            </div>
        <?php endforeach; ?>
    </div>
</div>


</body>
</html>
