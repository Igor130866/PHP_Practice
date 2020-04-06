ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
<meta charset = "UTF-8">
<h1>Мой первый сайт на PHP</h1>
<div style = "border: 2px solid black;">
<?php
$name = "Вася";
echo "Привет ".$name."!";
echo"<br>";
echo "Привет $name!";
echo"<br>";
echo 'Привет .$name.!';
?>
</div>
<hr>
