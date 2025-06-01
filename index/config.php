<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'it_centr';

$db = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($db->connect_error) {
    die("Ошибка подключения: " . $db->connect_error);
}

