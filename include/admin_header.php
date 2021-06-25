<?session_start();
if(!$_SESSION['userId'])
{
    header('Location: /AvtoKolesa/signin/');
    exit;
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/AvtoKolesa/include/class/Database.php';
$Database = new Database();
$user = $Database->SelectAdmin($_SESSION['userId']);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$title?></title>

   <link rel="icon" href="/AvtoKolesa/img/favicon.ico"/>

    <link href="/AvtoKolesa/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="/AvtoKolesa/css/mdb.min.css" rel="stylesheet">
    <link href="/AvtoKolesa/css/sb-admin-2.css" rel="stylesheet">
    <link href="/AvtoKolesa/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

  	<link href="/AvtoKolesa/css/style.css" rel="stylesheet">

</head>

<body>
<div class=" d-flex m-0 p-0">
