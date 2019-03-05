<?php
include('functions.php'); 
$codigo=$_GET['codigo'];
if ($resultset = getSQLResultSet("SELECT url FROM  `mdl_objetos` where codigo='$codigo'")) {
	
    	while ($row = $resultset->fetch_array(MYSQLI_NUM)) {
   //	echo json_encode($row);    	

   	echo $row[0];    	

    	}
    	
   }
   
?>
