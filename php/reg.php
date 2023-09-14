<?php
session_start();
require './db.php';

$fio = $_POST['fio'];
$login = $_POST['login'];
$password = $_POST['password'];

if (!empty($fio)) {
    if (!empty($login)) {
        if (!empty($password)) {
            $users = select('select * from users where login = :login', ['login' => $login]);
            if (empty($users)){
                $password = password_hash($password, PASSWORD_DEFAULT);
                $user_id = insert(
                    'insert into users (fio, login, password) values (:fio, :login, :password)',
                    [
                        'fio' => $fio,
                        'login' => $login,
                        'password' => $password
                    ]
                );
                $_SESSION['user_id'] = $user_id;
                header('location: ../');
            } else{
                $_SESSION['error'] = 'Такой пользователь существует!';
                header('location: ../pages/reg.php');
            }
        } else {
            $_SESSION['error'] = 'Укажите свой пароль!';
            header('location: ../pages/reg.php');
        }
    } else {
        $_SESSION['error'] = 'Введите свой логин!';
        header('location: ../pages/reg.php');
    }
} else {
    $_SESSION['error'] = 'Укажите свое ФИО!';
    header('location: ../pages/reg.php');
}