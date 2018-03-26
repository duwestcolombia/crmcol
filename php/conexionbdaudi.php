<?php
	//$link=mysql_connect("mysql5.000webhost.com","a7722289_admin","1qazxsw2");
	$dbaudi=new mysqli("localhost","root","","visitasdwauditoria");
	if($dbaudi->connect_errno){
		die('No se Pudo Conectar con la base de datos ' . $dbaudi->connect_errno);
		$dbaudi -> mysqli_close();
		//echo "Fallo al conectar a Base de Datos: " . $mysqli->connect_error;
	}
	else{
		#echo "conexion exitosa";
		//$db -> mysqli_close();
	}
	/*if($link){
		mysql_select_db("a7722289_prueba",$link);
	}*/

?>	