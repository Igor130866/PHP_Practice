<?php

$dbhost = "localhost";
$dbuser = "f91665c8_auth";
$dbpass = "Holmogor1308";
$dbname = "f91665c8_auth";
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
$mysqli->set_charset("utf-8");

if ($mysqli->connect_error) {
 die("Не удалось подключиться к БД ".$mysqli->connect_error);
}