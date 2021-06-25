<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/AvtoKolesa/include/action_header.php';

// Добавляем товар в БД
$Database->AddProduct($_POST['name'], $_POST['cost'], $_POST['amount'], $_POST['img'], $_POST['description'], $_POST['stars'], $_POST['category']);

// Редирект обратно
$_SESSION['alert'] = 'Товар успешно добавлен.';
header("Location: ". $_SERVER['HTTP_REFERER']);

?>
