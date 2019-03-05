<?php include ('functions.php');
$codigo=$_GET['codigo'];
$estado=$_GET['estado'];
$in1=$_GET['in1'];
$in2=$_GET['in2'];
$in3=$_GET['in3'];
$in4=$_GET['in4'];
$in5=$_GET['in5'];
$in6=$_GET['in6'];
$in7=$_GET['in7'];
$in8=$_GET['in8'];
$ou=$_GET['ou'];
$fase=$_GET['fase'];
echo ($fase);



ejecutarSQLCommand("INSERT INTO  `mdl_datos_fase` (
`id` ,
`estado`,
`in1`,
`in2`,
`in3`,
`in4`,
`in5`,
`in6`,
`in7`,
`in8`,
`ou`,
`fase`, 
`codigo`
)
VALUES (
 null ,
'$estado',
'$in1',
'$in2',
'$in3',
'$in4',
'$in5',
'$in6',
'$in7',
'$in8',
'$ou',
'$fase',
'$codigo');");


//	$page = file_get_contents('http://172.16.20.37/ws/cambiarFase.php?codigo='.$codigo.'&fase='.$fase);
//	echo $page; 
	
//	$page = file_get_contents('192.168.1.101/arduino/digital/13/'.$fase);
//	echo $page; 


 ?>
