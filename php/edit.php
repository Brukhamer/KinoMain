<?php
require './db.php';
session_start();
if (!empty($_POST['editBtn'])){
    $user_id =$_POST['user_id'];
    $old_password = select('select password from users where id = :id',
    [id =>$user_id]);

    $confirm_password = password_verify($_POST['confirmPassword'], $old_password[0]['password']);

    if ($confirm_password){
        if ($_POST['newPassword'] == $_POST['confirmPassword']) {
            update(
                'update users set password = :newPassword',
                ['newPassword' => password_hash($_POST['newPassword'], PASSWORD_DEFAULT)]
            );
            header('location: ../pages/profile.php?id='.$user_id);
        } else {
                echo "Пароли не совпадают";
        }
        } )
    } else {
            echo "Не правильный текущий пароль!";
}

?>
<form method="post">
    <label>
        <input type="text" name="oldPassword" placeholder="Введите старый пароль"required>
    </label>
    <label>
        <input type="text" name="newPassword" placeholder="Введите новый пароль"required>
    </label>
    <label>
        <input type="text" name="confirmPassword" placeholder="Повторите новый пароль"required>
    </label>
    <input type="submit" value="Изменить" name="editBtn">
</form>
