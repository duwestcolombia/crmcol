<?php
ob_start();
session_start();
require 'conexionbdaudi.php';
$usuactivo=$_SESSION['usuario_sesion'];
if($usuactivo)
{
	date_default_timezone_set("America/Bogota");
	$hoy=date("Y-m-d h:i:sa");
	$reglog=$dbaudi->query("INSERT Into log(id_log,nom_log,fecha_log,id_usuario) values(NULL,'Salida del sistema','$hoy','$usuactivo')")|| die($dbaudi->error);
	if ($reglog) {

		//Libero memoria con esta sentecia despues de una consulta
		mysqli_free_result($dbaudi);
		//cierro la conexion
		mysqli_close($dbaudi);
		
		session_destroy();
		header("location:../../../index.html");
	}
	else
	{
		echo 'Error al insertar el Log: '.$dbaudi->error;
	}

}
else{
	header("location:../../../index.html");
}
ob_end_flush();
//Con esta linea ya puedo utilizar los headers
?>