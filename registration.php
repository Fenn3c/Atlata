<?php
require_once('./utils/sessionManager.php');
require_once('./utils/database.php');
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./build/stylesheets/authentication.css" />
    <title>Регисрация</title>
</head>

<body>
    <main class="authentication authentication_reg">
        <img src="./assets/img/svg/logotype.svg" alt="" class="authentication__logotype">
        <div class="authentication__wrapper">
            <form class="authentication__form" method="post" action="./actions/register.php">
                <h1 class="authentication__title">Регистрация</h1>
                <?php if (isset($_SESSION['registration_error'])) : ?>
                    <p class="authentication__error"><?= $_SESSION['registration_error'] ?></p>
                <?php endif; ?>
                <label for="login" class="authentication__label-required">Логин</label>
                <input id="login" name="login" class="authentication__input" type="text" placeholder="Введите ваш логин" required>
                <label for="email" class="authentication__label-required">Email</label>
                <input id="email" name="email" class="authentication__input" type="text" placeholder="Введите вашу почту" required>
                <label for="password" class="authentication__label-required">Пароль</label>
                <input id="password" type="password" name="password" class="authentication__input" type="text" placeholder="Введите ваш пароль" required>
                <label for="repeat-password" class="authentication__label-required">Повторите пароль</label>
                <input id="repeat-password" type="password" name="repeat-password" class="authentication__input" type="text" placeholder="Введите ваш пароль" required>
                <label for="birthday" class="authentication__label-required">Введите вашу дату рождения</label>
                <input id="birthday" name="birthday" class="authentication__input" type="date" required>
                <button class="authentication__btn">Зарегестрироваться</button>
            </form>
            <a class="authentication__link" href="./login.php">Уже есть аккаунт?</a>
        </div>
    </main>
</body>

</html>