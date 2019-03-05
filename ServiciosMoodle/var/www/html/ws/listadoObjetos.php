<?php
include('functions.php'); 
$codigo=$_GET['codigo'];
if ($resultset = getSQLResultSet("SELECT codigo 
FROM  `mdl_objetos` where codigo='$codigo'")) {	
    	while ($row = $resultset->fetch_array(MYSQLI_NUM)) {
    	echo ("1");    	
    	}    	
   }
   else {
  	echo ("0");

   }   
?>
