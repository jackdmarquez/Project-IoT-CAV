<?php
//include('functions.php'); 
$ip=$_GET['ip'];
$fase=$_GET['fase'];
echo ($fase);
if($fase==3){
	$fase=1;
}
else{
	$fase = $fase+1;
	
}
//realizar busqueda para asociar codigo a ip
$url='http://'.$ip.'/arduino/digital/13/'.$fase;
echo ($url);
//$page = file_get_contents($url); 
  // echo $page;

   //$response = http_get($url);
//print_r($info);

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$content = curl_exec($ch);
echo $content;

//$page=file_get_contents('http://192.168.1.112/arduino/digital/13/2');


?>
