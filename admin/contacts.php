<?php
session_start();
require_once '../functions/connect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Админка</title>
</head>
<body>

<div style="text-align: center; padding-top: 100px; font-weight: bold; font-size: 28px">

    <h1>Редактирование контактной информации</h1>

    <?php if(!empty($_SESSION['login'])) : ?>

        <?php echo 'Добро пожаловать, ' . $_SESSION['login']; ?>
            <br>
        <a href="/logout.php" style="text-decoration: none">Выйти</a>
            <br>

        <?php
            $sql = $pdo->prepare('SELECT * FROM contact');
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_OBJ);
        ?>

        <form action="/admin/contacts/contact.php" method="post" style="margin-top: 30px">
            <input type="text" name="city" value="<?php echo $result->city?>" style="height: 30px; text-align: center; font-size: 22px; background-color: #adadd2">
            <input type="text" name="phone" value="<?php echo $result->phone?>" style="height: 30px; text-align: center; font-size: 22px; background-color: #adadd2">
            <input type="text" name="email" value="<?php echo $result->email?>" style="height: 30px; text-align: center; font-size: 22px; background-color: #adadd2">
            <input type="submit" value="Сохранить" style="height: 35px; text-align: center; font-size: 22px; background-color: #acdfac">
        </form>

    <?php else:
        echo '<h2>Вы, что, пытаетесь хакнуть мой сайт? О_о</h2>';
        echo '<a href="/">Перейти на главную страницу</a>';
        ?>
    <?php endif;?>
</div>

</body>
</html>