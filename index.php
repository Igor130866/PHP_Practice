
<meta charset = "UTF-8">
<h1>Мой первый сайт на PHP</h1>
<div style = "border: 2px solid black;">
<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$name = "Вася";
echo "Привет ".$name."!";
echo"<br>";
echo "Привет $name!";
echo"<br>";
echo 'Привет .$name.!';

$cars = ['Лексус','Ламборджини','БМВ','Феррари','Лада седан (баклажан)'];

echo"<br>";

for ($i = 0; $i < count($cars) - 1; $i++) {
  echo $cars[$i].", ";
}
echo $cars[count($cars) - 1];
echo"<br>";

foreach ($cars as $car) {
  echo $car.", ";
}
echo"<br>";
$family = array(
  "Папа" => "Вася",
  "Мама" => "Света",
  "Сын" => "Дима",
  "Дочь" => "Лера",
  "Кошка" => "Мурка",
  "Попугай" => "Понч",
);
echo"<br>";
echo var_dump($family);

echo"<br>";
echo "<table border='1'>";
echo "<tr><th>Ключ</th><th>Значение</th></tr>";
echo"<br>";
foreach($family as $key=>$name) {
  echo "<tr><td>$key</td><td>$name</td></tr>";
} 
echo "</table>";

?>

</div>
<div style = "display: flex; justify-content: center; border: 3px solid black;">
  <table border = "1">
    <?php
    for ($i = 1; $i < 10; $i++) {
          echo "<tr>";
          for ($j = 1; $j < 10; $j++) {
            $multiply = $i * $j;
            echo "<td>$j * $i = $multiply</td>";
          }
          echo "<tr>";
        
        }
    ?>    
  </table>
</div>
<div style = "display: flex; justify-content: center; border: 3px solid red; padding: 15px;">
    <?php
      $vasyapetrov = array("name" => "Вася", "lastname" => "Петров");
      
      function getUserName($user) {
        return $user["name"];
      }
      
      echo getUserName($vasyapetrov);
      echo"<br>";
      
      $text = "sometext";
      function showText() {
        global $text;
        $text .= " anothertext";
      }
      
      showText();
      echo $text;
      echo"<br>";
      
      function func() {
        static $count = 0;
        $count++;
        echo $count.'<br>';
        if($count < 10) {
          func();
        }
      }
      
      func();
      func();
      echo"<br>";
       
      $lastCar = array_pop($cars);
      echo var_dump($cars).'<br>';
      echo $lastCar."<br>";
      echo var_dump($lastCar);
    phpinfo
    
    ?>
</div>

