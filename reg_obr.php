<?php
//$_GET
header('Content-type: text/html; charset=utf-8'); 
 
//print_r($_POST);
 
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

// здесь проверка на регулярные выражения
// if preg_match

if ((mb_strlen($login) < 3 or mb_strlen($login) > 32)
    or (mb_strlen($pass) < 3 or mb_strlen($pass) > 16)) {
    exit("Слишком длинные/короткие логин или пароль");
  }

if ($pass != $passrepeat) {
  exit ("!!! Пароли не совпадают !!!");
}

$pass = password_hash($pass, PASSWORD_BCRYPT);

$dbhost = "localhost";
$dbuser = "f91665c8_auth";
$dbpass = "Holmogor1308";
$dbname = "f91665c8_auth";
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
$mysqli->set_charset("utf-8");

if ($mysqli->connect_error) {
 die("Не удалось подключиться к БД ".$mysqli->connect_error);
}

$result = $mysqli->query("SELECT * FROM `users` WHERE `login`='$login'"); 
//exit(var_dump($result->fetch_assoc()));
$result = $result->fetch_assoc(); // приводит к ассоциативному массиву, а был объектом
if (isset($result)) {
  exit("Такой пользователь уже зарегистрирован");
}

$result = $mysqli->query("INSERT INTO `users`(`login`, `password`, `name`, `lastname`, `patronymic`, `birthdate`) VALUES ('$login', '$pass', '$name', '$lastname', '$patronymic', '$birthdate')");

if (!result) {
  exit("Не удалось добавить пользователя");
}

exit("Пользователь $name успешно зарегистрирован");

exit("$login | $pass | $passrepeat | $name | $lastname | $patronymic | $birthdate");

?>

