<?php
session_start();
require './db.php';

$login = $_POST['login'];
$password = $_POST['password'];

if (!empty($login)){
    if (!empty($password)){
        $user = select('select * from users where login = :login', ['login' => $login]);
        if (!empty($user)){
            $_SESSION['user_id'] = $user [0]['id'];
            $_SESSION['is_admin'] = $user [0]['is_admin'] == '1';
            header('location: ../');
        }else{
            $_SESSION['error'] = 'Пользователь не найден!';
            header('location: ../pages/reg.php');
        }
    }else{
        $_SESSION['error'] = 'Введите пароль';
        header('location: ../pages/reg.php');
    }

} else{
    $_SESSION['error'] = 'Введите логин';
    header('location: ../pages/reg.php');
}