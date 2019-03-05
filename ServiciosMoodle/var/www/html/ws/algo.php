<?php

      $mysql_servidor = "localhost";
      $mysql_base = "moodle";
      $mysql_usuario = "moodle";
      $mysql_clave = "Oc4v1ntE";


      $etiqueta=htmlspecialchars($_GET["v"],ENT_QUOTES);

      mysql_connect($mysql_servidor,$mysql_usuario,$mysql_clave) or die("Imposible conectarse al servidor.");
      mysql_select_db($mysql_base) or die("Imposible abrir Base de datos");


      //$query5= "SELECT tipo FROM mdl_ingreso WHERE etiqueta = '".$etiqueta."' ORDER BY tipo DESC LIMIT 1 ";
	$query5= "SELECT tipo from mdl_ingreso where id = (SELECT max(id) FROM mdl_ingreso WHERE etiqueta = '".$etiqueta."') ";	
	$result = mysql_query($query5);
       while($row = mysql_fetch_array($result)){
            $tipo=$row['tipo'];
       }
       echo $tipo;
	if($tipo==1){// 1- entrada, 2 -salida
            $tipo=2;
       }
       else{
            $tipo=1;
       }

      $query = "INSERT INTO `mdl_ingreso` (`etiqueta`, `hora`, `fecha`, `tipo`) 
		VALUES ('".$etiqueta."',CURTIME(),CURDATE(), '$tipo')"; 

      $query2 = "SELECT * FROM mdl_asistencia WHERE etiqueta='".$etiqueta."'";
      $query3 = "INSERT INTO mdl_asistencia (`etiqueta`, `hora`, `fecha`,`tipo`) 
      VALUES ('".$etiqueta."',CURTIME(),CURDATE(), '$tipo')";

      $query4 = "UPDATE `mdl_asistencia` SET `fecha`=CURDATE(),`hora`=CURTIME(), `tipo`= '$tipo' WHERE etiqueta = '".$etiqueta."'"; //22AB895 - 2036B400

      

      mysql_query($query);

     $resultado=mysql_query($query2);
      if (mysql_num_rows($resultado)>0) {
            mysql_query($query4);
            exit;
      }else{
            mysql_query($query3);
      }
?>

