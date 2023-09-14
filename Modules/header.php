<?php
$id = $_SESSION['user_id'];
if ($_SERVER['REQUEST_URI'] != '/') $home =  '../'; else $home = './';
if (!empty($id)){
    if ($_SERVER['REQUEST_URI'] != '/') $profile =  './profile.php?id='.$id; else $profile = './pages/profile.php?id='.$id;
}else{
    if($_SERVER['REQUEST_URI'] != '/') $profile =  './login.php'; else $profile = './pages/login.php';
}
if ($_SESSION['is_admin'] == true){
    if ($_SERVER['REQUEST_URI'] != '/') $add = './addFilm.php'; else $add  = './pages/addFilm.php';
} else{
    $add = $home;
}
$filmsForSearch = select('select title from films');


?>
<header>
    <img src="" alt="logo">
    <a href="<?= $home ?>">KinoMain</a>
    <form action="../php/search.php" method="get">
        <input name="name" type="text" list="search" placeholder="Поиск">
        <input type="submit" value="Поиск">
    </form>
    <datalist id="search">
        <?php foreach ($filmsForSearch as $title):    ?>
            <option value="<?=$title['title'] ?>"></option>

        <?php endforeach; ?>
    </datalist>
    <a href="<?= $add?>">Добавление фильма</a>
    <a href="<?= $profile?>">Войти</a>
</header>