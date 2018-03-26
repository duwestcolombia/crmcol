<?php
error_reporting(0);
session_start();
require 'conexionbd.php';

$usu=$_SESSION['usuario_sesion'];
$rol=$_SESSION['tipusuario_sesion'];
$zon=$_SESSION['zona_sesion'];

switch ($rol) {
	case 1:
	if($usu!=null)
	{

		$resultado=$db->query("SELECT id_usuario,nom_usuario FROM usuario WHERE id_usuario<>'$usu' and id_rol<>'2'") or die($db->error);
		$resul = $resultado->fetch_All();
		foreach ($resultado as $key => $value) {

		}
	//header("location:../admrvisitas.php");
	}
	else
	{
		echo '<script>alert("Se presento una Falla en la Sesion, Infiltrado detectado: '.$usu.'")</script>';
	}

	break;
	case 2:
	if($usu!=null)
	{

		$resultado=$db->query("SELECT id_usuario,nom_usuario FROM usuario WHERE id_zona='$zon' and id_usuario<>'$usu'") or die($db->error);
		$resul = $resultado->fetch_All();
		foreach ($resultado as $key => $value) {

		}
//header("location:../admrvisitas.php");
	}
	else
	{
		echo '<script>alert("Se presento una Falla en la Sesion, Infiltrado detectado: '.$usu.'")</script>';
	}
	break;
	
}

?>