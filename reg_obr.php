<?php
//$_GET
header('Content-type: text/html; charset=utf-8'); 
 
$login = trim($_POST["login"]);
$pass = trim($_POST["pass"]);
$passrepeat = trim($_POST["passrepeat"]);
$name = trim($_POST["name"]);
$lastname = trim($_POST["lastname"]);
$patronymic = trim($_POST["patronymic"]);
$birthdate = trim($_POST["birthdate"]);
 
$login = htmlspecialchars($login);
$pass = htmlspecialchars($pass);
$passrepeat = htmlspecialchars($passrepeat);
$name = htmlspecialchars($name);
$lastname = htmlspecialchars($lastname);
$patronymic = htmlspecialchars($patronymic);
$birthdate = htmlspecialchars($birthdate);

if (empty($login) or empty($pass) or empty($passrepeat) or empty($name) or empty($lastname) or empty($patronymic) or empty($birthdate)) {
  exit("Не все поля заполнены !!!");
}

if ($pass != $passrepeat) {
  exit ("!!! Пароли не совпадают !!!");
}

exit("$login | $pass | $passrepeat | $name | $lastname | $patronymic | $birthdate");

