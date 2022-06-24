<?php
require('./utils/sessionManager.php');
require('./utils/database.php');
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./build/stylesheets/authentication.css" />
    <title>Войти</title>
</head>

<body>
    <main class="authentication">
        <img src="./assets/img/svg/logotype.svg" alt="" class="authentication__logotype">
        <div class="authentication__wrapper">
            <form class="authentication__form" method="post" action="./actions/login.php">
                <h1 class="authentication__title">Авторизация</h1>
                <?php if (isset($_SESSION['login_error'])) : ?>
                    <p class="authentication__error"><?= $_SESSION['login_error'] ?></p>
                <?php endif; ?>
                <label for="login" class="authentication__label-required">Логин</label>
                <input id="login" name="login" class="authentication__input" type="text" placeholder="Введите ваш логин" required>
                <label for="password" class="authentication__label-required">Пароль</label>
                <input type="password" id="password" name="password" class="authentication__input" type="text" placeholder="Введите ваш пароль" required>
                <button class="authentication__btn">Войти</button>
            </form>
            <a class="authentication__link" href="./register.html">Ещё не зарегистрированны?</a>
        </div>
    </main>
</body>

</html>