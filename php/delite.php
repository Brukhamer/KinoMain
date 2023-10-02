<?php
session_start();
require './db.php';
$id = $_POST['id'];
delete(
    'delete from card where id = :id',
    ['id' => $id]
);
header('location: ../pages/profile.php?id='.$_SESSION['user_id']);