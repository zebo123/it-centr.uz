<?php
session_start();
require 'config.php';
if (isset($_SESSION['user_id'])) {
    header("Location: cabinet.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Вывод полученных данных
    var_dump($_POST);
    
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("Ошибка CSRF!");
    }

    $login = $db->real_escape_string($_POST['login']);
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT id, password FROM users WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: cabinet.php");
            exit();
        } else {
            echo "Неверный пароль!";
        }
    } else {
        echo "Пользователь не найден!";
    }
}
?>