<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/AvtoKolesa/include/action_header.php';

// Обновленипе товара
$Database->UpdateCategory($_POST['id'], $_POST['name']);

// Редирект обратно
$_SESSION['alert'] = 'Изменения успешно сохранены.';
header("Location: ". $_SERVER['HTTP_REFERER']);
