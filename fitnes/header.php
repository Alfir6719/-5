<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фитнес клуб</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<header>
        <div class="logo">
            <h1>ФИТНЕС КЛУБ</h1>
        </div>
        <nav>
            <?php if(empty($_SESSION["role_user"])) {?>
            <a href="/">Главная</a>
            <a href="/">Наша команда</a>
            <a href="reg.php">Регистрация</a>
            <a href="auth.php">Войти</a>
            <?php
            } 
            if($_SESSION["role_user"] == 1) {?>
            <a href="/">Главная</a>
            <a href="/">Наша команда</a>
            <a href="addTrener.php">Добавить тренера</a>
            <a href="editTrener.php">Управление тренерами</a>
            <?php
            }
            if($_SESSION["role_user"] == 2) {?>
            <a href="/">Главная</a>
            <a href="/">Наша команда</a>
            <a href="/">Личный кабинет</a>
            <?php
            }
            if($_SESSION["role_user"] == 3) {?>
            <a href="/">Главная</a>
            <a href="/">Наша команда</a>
            <a href="/">Расписание</a>
            <?php
            }
            ?>
        </nav>
    </header>