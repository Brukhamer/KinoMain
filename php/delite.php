<?php
session_start();
//var_dump($_POST);
require './db.php';
$id = $_POST['id'];
delete(
    'delete from card where id = :id',
    ['id' => $id]
);
header('location: ../pages/profile.php?id='.$_SESSION['user_id']);