<?php 
require '../controller/conexionbd.php';
/////////////////VARIABLES DE SESION////////////////

$usu=$_SESSION['usuario_sesion'];
$rol=$_SESSION['tipusuario_sesion'];
$zon=$_SESSION['zona_sesion'];



////////////////////CONSULTAS PARA TABLA Y PARA COMBOBOX////////////////////////
switch ($rol) {
	case 0:

	$resultadousuario=$db->query("SELECT * FROM usuario WHERE id_usuario<>'$usu' and id_rol<>'2'") or die($db->error);

	break;
	case 1:

	$resultadousuario=$db->query("SELECT * FROM usuario WHERE id_usuario<>'$usu' and id_rol<>'0' and id_rol>'5' and sector_usuario<>'Administracion'") or die($db->error);
	break;
	
}





?>