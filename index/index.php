<?php
session_start();
require 'config.php';

// Генерация CSRF-токена
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<!-- saved from url=(0044)https://www.skill-%2Dboost.com/?ref=Golden55 -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>IT_centr</title>
    
    <!-- Исправленные пути -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    
    <style>
        /* Добавленные стили для модального окна */
        .login-modal {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(2, 37, 91, 0.98);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(2, 150, 255, 0.5);
            z-index: 1000;
            display: none;
            width: 400px;
            max-width: 90%;
        }

        .login-modal.active {
            display: block;
        }

        .login-close {
            position: absolute;
            right: 20px;
            top: 20px;
            color: #FFCC33;
            cursor: pointer;
            font-size: 24px;
        }
    </style>
</head>
<body style="black;padding-top: 0px;">

<!-- Модальное окно входа -->
<div class="login-modal" id="loginModal">
    <span class="login-close" onclick="closeModal()">×</span>
    <h2 style="color: #FFCC33; text-align: center; margin-bottom: 30px;">KIRISH</h2>
    <?php if(isset($_GET['error'])): ?>
        <div style="color: #ff4444; text-align: center; margin-bottom: 15px;">
            Noto'g'ri login yoki parol!
        </div>
    <?php endif; ?>
    
    <form method="POST" action="login.php">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
        
        <div style="margin-bottom: 20px;">
            <input type="text" 
                   name="login" 
                   placeholder="Login"
                   style="width: 100%;
                          padding: 12px 15px;
                          border: 2px solid #39A6BC;
                          border-radius: 8px;
                          background: rgba(255,255,255,0.1);
                          color: #fff;"
                   required
                   minlength="8">
        </div>

        <div style="margin-bottom: 25px; position: relative;">
            <input type="password" 
                   name="password" 
                   placeholder="Parol"
                   style="width: 100%;
                          padding: 12px 15px;
                          border: 2px solid #39A6BC;
                          border-radius: 8px;
                          background: rgba(255,255,255,0.1);
                          color: #fff;"
                   required
                   minlength="8">
            <span style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer;" 
                  onclick="togglePassword(this)">👁</span>
        </div>

        <button type="submit" 
                style="width: 100%;
                       padding: 15px;
                       background: #FFCC33;
                       border: none;
                       border-radius: 8px;
                       color: #071B2C;
                       font-size: 18px;
                       cursor: pointer;">
            KIRISH
        </button>
    </form>
</div>

<script>
    // Функции для работы с модальным окном
    function showLoginModal() {
        document.getElementById('loginModal').classList.add('active');
    }

    function closeModal() {
        document.getElementById('loginModal').classList.remove('active');
    }

    function togglePassword(icon) {
        const input = icon.previousElementSibling;
        input.type = input.type === 'password' ? 'text' : 'password';
    }

    window.onclick = function(event) {
        if (event.target == document.getElementById('loginModal')) {
            closeModal();
        }
    }
</script>

<!-- Измененная кнопка входа в шапке -->
<div class="new_bg_2_enter">    
    <a class="fa fa-user i_button_2" 
       href="#" 
       onclick="showLoginModal()"
       style="text-decoration: none;">
       KIRISH
    </a>
</div>

<!-- Остальная часть вашего HTML без изменений -->
<!-- ... -->