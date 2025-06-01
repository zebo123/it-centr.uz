<?php
$valid_username = 'admin'; // Ваш логин
$valid_password = 'secret123'; // Ваш пароль

if (
    !isset($_SERVER['PHP_AUTH_USER']) || 
    !isset($_SERVER['PHP_AUTH_PW']) || 
    $_SERVER['PHP_AUTH_USER'] != $valid_username || 
    $_SERVER['PHP_AUTH_PW'] != $valid_password
) {
    header('WWW-Authenticate: Basic realm="Admin Panel"');
    header('HTTP/1.0 401 Unauthorized');
    die('Доступ запрещен');
}
?>