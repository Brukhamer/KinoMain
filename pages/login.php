<?php
session_start();
?>
<html>
<head>
    <title>Главная страница</title>
</head>
<body>
<h2>Главная страница</h2>
<form action="../php/login.php" method="post">
   <p>
        <label>Ваш логин:<br></label>
        <input name="login" type="text" size="15" maxlength="15">
    </p>
    <p>
        <label>Ваш пароль:<br></label>
        <input name="password" type="password" size="15" maxlength="15">
    </p>
    <p>
        <input type="submit" name="submit" value="Войти">
        <br>
        <a href="reg.php">Зарегистрироваться</a>
    </p></form>
<br>

</body>
</html>
