<?php
session_start();
header('Content-type: text/html; charset=utf-8'); 

$login = htmlspecialchars(trim($_POST["login"]));
$pass = htmlspecialchars(trim($_POST["pass"]));

 if (empty($login) or empty($pass)) {
  exit("Не все поля заполнены !!!");
}

$dbhost = "localhost";
$dbuser = "f91665c8_auth";
$dbpass = "Holmogor1308";
$dbname = "f91665c8_auth";
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
$mysqli->set_charset("utf-8");

if ($mysqli->connect_error) {
 die("Не удалось подключиться к БД ".$mysqli->connect_error);
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

exit("<script>window.location.href='lk.php'</script>");