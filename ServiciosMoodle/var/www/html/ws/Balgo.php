<?php

      $mysql_servidor = "localhost";
      $mysql_base = "moodle";
      $mysql_usuario = "moodle";
      $mysql_clave = "Oc4v1ntE";
      $etiqueta=htmlspecialchars($_GET["v"],ENT_QUOTES);
      mysql_connect($mysql_servidor,$mysql_usuario,$mysql_clave) or die("Imposible conectarse al servidor.");
      mysql_select_db($mysql_base) or die("Imposible abrir Base de datos");
      $query = "INSERT INTO `mdl_ingreso` (`etiqueta`, `hora`, `fecha`) 
		VALUES ('".$etiqueta."',CURTIME(),CURDATE())"; 
      $query2 = "SELECT * FROM mdl_asistencia WHERE etiqueta='".$etiqueta."'";
      $query3 = "INSERT INTO mdl_asistencia (`etiqueta`, `hora`, `fecha`) 
      VALUES ('".$etiqueta."',CURTIME(),CURDATE())";
      $query4 = "UPDATE `mdl_asistencia` SET `fecha`=CURDATE(),`hora`=CURTIME() WHERE etiqueta = '".$etiqueta."'"; //22AB895 - 2036B400
      mysql_query($query);
     $resultado=mysql_query($query2);
      if (mysql_num_rows($resultado)>0) {
      mysql_query($query4);
      exit;
      }else{
      mysql_query($query3);
      }
?>

