<?php
header('Content-type: text/html; charset=utf-8'); 

$nam = htmlspecialchars(trim($_POST['name']));
$fam = htmlspecialchars(trim($_POST['lastname']));
$otch = htmlspecialchars(trim($_POST['patronymic']));
$bdate = htmlspecialchars(trim($_POST['birthdate']));
$docno = htmlspecialchars(trim($_POST['docno']));



if (empty($nam) or empty($fam) or empty($otch) or empty($bdate) or empty($docno)) { exit("Не все поля заполнены");}

//exit("$nam | $fam | $otch | $bdate | $docno");
$docno = str_replace([" ", "-"], "", $docno);
if (mb_strlen($docno) != 10) {
  exit("Некорректный номер паспорта");
}

$docno = mb_substr($docno, 0, 2)." ".mb_substr($docno, 2, 2)." ".mb_substr($docno, 4);

$bdate = explode('-', $bdate);
$bdate = array_reverse($bdate);
$bdate = join('.', $bdate);

$data = "c=innMy&captcha=&captchaToken=&fam=$fam&nam=$nam&otch=$otch&bdate=$bdate&bplace=&doctype=21&docno=$docno&docdt=";

$result = getCurl("https://service.nalog.ru/inn-proc.do", $data);

//exit($result);
if ($result['code'] == 1) {
    exit($result['inn']);
} else {
    exit( var_dump($result) );
}


function getCurl($url, $data) {
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);  //на какой url идет запрос
  curl_setopt($curl, CURLOPT_POST, true); // указываем что отправляем методом POST
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data); //тело запроса POST
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //переводит ответ в массив
  curl_setopt($curl, CURLOPT_PROXYTYPE,   CURLPROXY_HTTPS); //
  curl_setopt($curl, CURLOPT_PROXY, "5.2.72.101:3128"); //
  
  $result = curl_exec($curl); //выполняем запрос
  curl_close($curl); // закрываем сеccию url
  $result = json_decode($result, true);    // encode из array 
  return $result;

}

//exit("$nam | $fam | $otch | $bdate | $docno");