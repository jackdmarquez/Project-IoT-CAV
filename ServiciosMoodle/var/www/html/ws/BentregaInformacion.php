<?php
include('functions.php'); 
$codigo=$_GET['codigo'];
if ($resultset = getSQLResultSet("SELECT descripcion FROM  `mdl_objetos` where codigo='$codigo'")) {
	
    	while ($row = $resultset->fetch_array(MYSQLI_NUM)) {
    	echo $row[0];    	
    	}
    	
   }
   
?>
