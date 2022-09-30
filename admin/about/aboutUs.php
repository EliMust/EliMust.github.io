<?php
//подключение к БД
$user = 'root';
$password = '';
$host = 'localhost';
$db = 'testing';
$dbh = 'mysql:host=' . $host. ';dbname=' . $db. ';charset=utf8';
$pdo = new PDO($dbh, $user, $password);

//обработка редактирования информации в блоке "О нас"
if(isset($_POST['save'])) {
    $list = ['.php', '.zip', '.rar', '.js', '.html' ]; //список расширений, которые нельзя загружать
    foreach ($list as $item) {
        if(preg_match(
            '$/item/$', $_FILES['image']['name']))
            exit('Расширение файла не подходит!'); //ищем соответствия в шаблоне
    }

    $type = getimagesize($_FILES['image']['tmp_name']);

    if($type && ($type['mime'] != 'image/png' || $type['mime'] != 'image/jpg' || $type['mime'] != 'image/jpeg')) {
        if($_FILES['image']['name'] < 1024 * 1000) {
            $upload = '../image/' . $_FILES['image']['name'];

            if(move_uploaded_file($_FILES['image']['tmp_name'], $upload)) echo 'Файл загружен';
            else echo 'Упс... При загрузке файла произошла ошибка!';
        }

        else exit('Размер файла превышен');
    }

    else exit('Тип файла не подходит');
}

$title = $_POST['title'];
$description = $_POST['description'];
$sql = 'UPDATE about SET title=:title, description=:description, filename=:filename';
$query = $pdo->prepare($sql); //подготовка запроса к отпраке
$query->execute(['title'=>$title, 'description'=>$description, 'filename'=>$_FILES['image']['name']]);
echo '<meta HTTP-EQUIV="refresh" content="0; URL=/admin/about.php">'; //редирект
