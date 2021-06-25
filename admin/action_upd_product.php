<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/AvtoKolesa/include/action_header.php';

// Обновленипе товара
$Database->UpdateProduct($_POST['id'], $_POST['name'], $_POST['cost'], $_POST['amount'], $_POST['img'], $_POST['description'], $_POST['stars'], $_POST['category']);

// Редирект обратно
$_SESSION['alert'] = 'Изменения успешно сохранены.';
header("Location: ". $_SERVER['HTTP_REFERER']);
