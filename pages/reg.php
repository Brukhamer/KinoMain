<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация!</title>
</head>
<body>
 <span style="color: red"><?php if (!empty($_SESSION['error'])) echo $_SESSION['error']; else echo ''?>
            </span>
 <form action='../php/reg.php' method="post">
     <label>
         Введите ФИО:
         <input type = "text" name = "fio"><br>
     </label>
     <label>
         Введите email:
         <input type = "text" name = "email"><br>
     </label>
     <label>
         Введите номер телефона:
         <input type = "text" name = "user_number"><br>
     </label>
     <label>
         Введите логин:
         <input type = "text" name = "login"><br>
     </label>
     <label>
         Введите пароль:
         <input type="password" name = "password"><br>
     </label>
     <input type="submit" value="Зарегистрироваться"><br>
     <a href="../pages/login.php">Уже есть логин - Авторизация</a>
 </form>
 <a href="login.php"

</body>
</html>
