<?php
session_start();
if(!$_SESSION['userId'])
{
    header('Location: /AvtoKolesa/signin/');
    exit;
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/AvtoKolesa/include/class/Database.php';
$Database = new Database();
$user = $Database->SelectAdmin($_SESSION['userId']);
