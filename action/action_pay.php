<?php
mail($_POST['email'], "Покупка в магазине AvtoKolesa", "Здравствуйте, " . $_POST['FullName'] . ", Вы успешно произвели покупку в нашем магазине, скоро с вами свяжиться администратор для подтверждения заказа");
header("Location: ". $_SERVER['HTTP_REFERER'] . '/AvtoKolesa/');
