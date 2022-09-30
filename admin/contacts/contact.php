<?php
//подключение к БД
$user = 'root';
$password = '';
$host = 'localhost';
$db = 'testing';
$dbh = 'mysql:host=' . $host. ';dbname=' . $db. ';charset=utf8';
$pdo = new PDO($dbh, $user, $password);

//обработка редактирования контактной информации
$city = $_POST['city'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$row = 'UPDATE contact SET city=:city, phone=:phone, email=:email'; //подготовленный запрос
$query = $pdo->prepare($row); //подготовка к отправке запроса
$query->execute(['city'=>$city, 'phone'=>$phone, 'email'=>$email]); //сам запрос
echo '<meta HTTP-EQUIV="refresh" content="0; URL=/admin/contacts.php">'; //редирект