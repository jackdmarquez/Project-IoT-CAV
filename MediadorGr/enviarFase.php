<?php

$ip=$_GET['ip'];
$fase=$_GET['fase'];

$url='http://'.$ip.'/arduino/digital/13/'.$fase;


echo ($url);
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$content = curl_exec($ch);
//echo ($content);   
//$page= file_get_contents($url);
;
?>
