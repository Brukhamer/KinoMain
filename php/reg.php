<?php
session_start();
require './db.php';

$fio = $_POST['fio'];
$email = $_POST['email'];
$user_number = $_POST['user_number'];
$login = $_POST['login'];
$password = $_POST['password'];

if (!empty($fio)) {
    if (!empty($email)) {
        if (!empty($user_number)) {
            if (!empty($login)) {
                if (!empty($password)) {
                    $users = select('select * from users where login = :login', ['login' => $login]);
                    if (empty($users)){
                        $password = password_hash($password, PASSWORD_DEFAULT);
                        $user_id = insert(
                            'insert into users (fio, email, user_number, login, password) values (:fio, :email, :user_number,  :login, :password)',
                            [
                                'fio' => $fio,
                                'email' => $email,
                                'user_number' => $user_number,
                                'login' => $login,
                                'password' => $password
                            ]
                        );
                        $_SESSION['user_id'] = $user_id;
                        header('location: ../pages/profile.php');
                    } else{
                        $_SESSION['error'] = 'Такой пользователь существует!';
                        header('location: ../pages/reg.php');
                    }
                } else {
                    $_SESSION['error'] = 'Укажите свой пароль!';
                    header('location: ../pages/reg.php');
                }
            } else {
                $_SESSION['error'] = 'Укажите свой логин!';
                header('location: ../pages/reg.php');
            }
        } else {
            $_SESSION['error'] = 'Укажите свой номер телефона!';
            header('location: ../pages/reg.php');
        }
    } else {
        $_SESSION['error'] = 'Введите свою почту!';
        header('location: ../pages/reg.php');
    }
} else {
    $_SESSION['error'] = 'Укажите свое ФИО!';
    header('location: ../pages/reg.php');
}