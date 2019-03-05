<?php
include('functions.php'); 
$codigo=$_GET['codigo'];
echo ($codigo);
if ($resultset = getSQLResultSet("SELECT mdl_fases.fase, mdl_objetos.ip from mdl_fases, mdl_objetos WHERE mdl_fases.cod_est = (SELECT mdl_datos.cod_est from mdl_datos where mdl_datos.codigo = '$codigo' ORDER BY mdl_datos.cod_est DESC LIMIT 1) and mdl_objetos.codigo= '$codigo'")) {	
    	while ($row = $resultset->fetch_array(MYSQLI_NUM)) {
    		$fase=$row[0];
    		$ip= $row[1];  	
    	}

echo ('entro');
}
echo ($fase);
echo ($ip);

$url="http://172.16.20.39/ws/enviarFase.php?ip=".$ip."&fase=".$fase;

$page=file_get_contents($url);

?>


