<?php
session_start();
header('Content-type: text/html; charset=utf-8'); 
require_once('db.php');

$login = htmlspecialchars(trim($_POST["login"]));
$pass = htmlspecialchars(trim($_POST["pass"]));

 if (empty($login) or empty($pass)) {
  exit("Не все поля заполнены !!!");
}


$result = $mysqli->query("SELECT * FROM `users` WHERE `login`='$login'")->fetch_assoc();

if (!isset($result) or !password_verify($pass, $result['password'])) {
  exit("Неверный логин или пароль");
}

$_SESSION['id'] = $result['id'];
$_SESSION['login'] = $result['login'];
$_SESSION['name'] = $result['name'];
$_SESSION['lastname'] = $result['lastname'];
$_SESSION['patronymic'] = $result['patronymic'];
$_SESSION['birthdate'] = $result['birthdate'];

//header("Location: lk.php"); - если на страницу auth_obr.php ничего не выводилось

exit("ok");

