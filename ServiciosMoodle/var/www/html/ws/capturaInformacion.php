<?php include ('functions.php');
$codigo=$_GET['codigo'];
$dato=$_GET['dato'];
$tipo=$_GET['tipo'];


ejecutarSQLCommand("INSERT INTO  `mdl_datos` (
`id`,
`codigo` ,
`dato`,
`tipo` 
)
VALUES (
null,
'$codigo',
'$dato',
'$tipo');");

?>
