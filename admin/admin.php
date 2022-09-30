<?php
//обработка файла после нажатия кнопки "войти"
require_once '../functions/connect.php';

session_start();

$login = $_POST['login'];
$password = $_POST['password'];

$sql = $pdo->prepare('SELECT id, login FROM user WHERE login=:login AND password=:password'); //подготовленный запрос
$sql->execute(array('login' => $login, 'password' => $password)); //сам запрос
$array = $sql->fetch(PDO::FETCH_ASSOC);

if($array['id']>0) {
     $_SESSION['login']=$array['login'];
     header('Location:/administration.php');
}
else {
    header('Location:/login.php');
}