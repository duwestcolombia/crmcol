<?php
	//$link=mysql_connect("mysql5.000webhost.com","a7722289_admin","1qazxsw2");
	$db=new mysqli("localhost","root","","visitasdwv2");
	if($db->connect_errno){
		die('No se Pudo Conectar con la base de datos ' . $db->connect_errno);
		//echo "Fallo al conectar a Base de Datos: " . $mysqli->connect_error;
		mysqli_close($db);
	}
	else{
		#echo "conexion exitosa";
		//$db -> mysqli_close();
	}
	/*if($link){
		mysql_select_db("a7722289_prueba",$link);
	}*/

?>	