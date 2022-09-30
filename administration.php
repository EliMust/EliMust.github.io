<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Админка</title>
</head>
<body>

    <div style="text-align: center; padding-top: 150px; font-weight: bold; font-size: 30px">

        <?php if(!empty($_SESSION['login'])) : ?>

        <?php echo 'Добро пожаловать, ' . $_SESSION['login']; ?>
        <br>
        <a href="/logout.php" style="font-size: 26px; text-decoration: none">Выйти</a>
        <br>
        <a href="/admin/contacts.php" style="font-size: 24px; text-decoration: none">Контакты</a>
        <a href="" style="font-size: 24px; text-decoration: none">Главная</a>
        <a href="/admin/services.php" style="font-size: 24px; text-decoration: none">Услуги</a>
        <a href="/admin/about.php" style="font-size: 24px; text-decoration: none">О нас</a>

        <?php else:
            echo '<h2>Вы, что, пытаетесь хакнуть мой сайт? О_о</h2>';
            echo '<a href="/">Перейти на главную страницу</a>';
        ?>

        <?php endif;?>
    </div>

</body>
</html>
