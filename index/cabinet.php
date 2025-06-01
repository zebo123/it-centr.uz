<?php
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shaxsiy kabinet</title>
    <!-- Подключите ваши стили -->
</head>
<body>
    <div class="container">
        <h1 style="color: #FFCC33;">Xush kelibsiz, <?= htmlspecialchars($user['name']) ?>!</h1>
        <div style="background: rgba(2, 37, 91, 0.9); padding: 20px; border-radius: 15px;">
            <p style="color: #39A6BC;">Login: <?= htmlspecialchars($user['login']) ?></p>
            <p style="color: #39A6BC;">Email: <?= htmlspecialchars($user['email']) ?></p>
            <a href="logout.php" style="color: #FFCC33; text-decoration: none;">Chiqish</a>
        </div>
    </div>
</body>
</html>