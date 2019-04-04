<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../template/css/style.css">
</head>

<body>
<div class="wrapper">
    <nav class="nav">
        <ul class="nav_block">
        <?php if(!User::Guest()) :?>
            <li class="nav_block-item">
                <a class="nav-link link-item" href="/profile/">Профиль</a>
            </li>
            <li class="nav_block-item">
                <a class="nav-link link-item" href="/logout/">выход</a>
            </li>
            <?php else : ?>
            <li class="nav_block-item">
                <a class="nav-link link-item" href="/">вход</a>
            </li>
            <li class="nav_block-item">
                <a class="nav-link link-item" href="/register/">регистрация</a>
            </li>
            <?php endif ?>
        </ul>
    </nav>