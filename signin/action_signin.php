<?php
session_start();
require_once  $_SERVER['DOCUMENT_ROOT'] . '/AvtoKolesa/include/class/Database.php';
$Database = new Database();
$user =  $Database->SelectUser($_POST['login']);

// Проверяем соответствует ли пароль хешу
if (password_verify($_POST['password'], $user['password'])) {

    $_SESSION['userId'] = $user['id'];
    $_SESSION['userLogin'] = $user['login'];
    header('Location: /AvtoKolesa/admin/');

} else {

    // Создаем сообщение и делаем редикрет
    $_SESSION['message'] = "Неверный логин или пароль";
    header('Location: /AvtoKolesa/signin/');
}
