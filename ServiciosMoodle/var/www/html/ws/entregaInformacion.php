<?php
$codigo=$_GET['codigo'];

$link = @mysql_connect("localhost", "moodle","Oc4v1ntE")
      or die ("Error al conectar a la base de datos.");
  @mysql_select_db("moodle", $link)
      or die ("Error al conectar a la base de datos.");


$query="SELECT url FROM  `mdl_objetos` where codigo='$codigo'";
$result = mysql_query($query); //usamos la conexion para dar un resultado a la variable



if (mysql_num_rows($result) > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{

    while ($row = mysql_fetch_array($result)) 
    {
    	echo ($row[0]);
    }
}
else
{
	$query="INSERT INTO  `mdl_objetos` (`codigo`) VALUES ('$codigo');";
	$result = mysql_query($query); //usamos la conexion para dar un resultado a la variable

    
}
mysql_close($link);//cerramos la conexión
?>
