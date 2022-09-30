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

    <h1>Редактирование блока "О нас"</h1>

    <?php if(!empty($_SESSION['login'])) : ?>

        <?php echo 'Добро пожаловать, ' . $_SESSION['login']; ?>
        <br>
        <a href="/logout.php" style="text-decoration: none">Выйти</a>
        <br>

        <?php
        $sql = $pdo->prepare('SELECT * FROM about');
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_OBJ);
        ?>

        <form action="/admin/about/aboutUs.php" method="post" enctype="multipart/form-data" style="margin-top: 30px">
            <input type="text" name="title" value="<?php echo $result->title?>" style="height: 30px; text-align: center; font-size: 22px; background-color: #adadd2">
            <input type="text" name="description" value="<?php echo $result->description?>" style="height: 30px; text-align: center; font-size: 22px; background-color: #adadd2">
            <p>
                <input type="file" name="image">
            </p>
            <input type="submit" name="save" value="Сохранить" style="height: 35px; text-align: center; font-size: 22px; background-color: #acdfac">
        </form>

        <img src="/admin/image/<?php echo $result->filename?>" style="width: 200px; margin-top: 35px">


    <?php else:
        echo '<h2>Вы, что, пытаетесь хакнуть мой сайт? О_о</h2>';
        echo '<a href="/">Перейти на главную страницу</a>';
        ?>
    <?php endif;?>
</div>

</body>
</html>