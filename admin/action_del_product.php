<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/AvtoKolesa/include/action_header.php';

// Удаление товара
$Database->DeleteProduct($_POST['id']);

// Редирект обратно
$_SESSION['alert'] = 'Товар успешно удален.';
header("Location: ". $_SERVER['HTTP_REFERER']);
