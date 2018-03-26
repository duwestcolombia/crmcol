<?php
session_start();
//validar si el usuario se Logeo, de lo contrario no lo deje ingresar
if(!$_SESSION)
{
	header("location:../../../ingreso.php");
}
/////CODIGO ERROR_REPORTING(0) EVITA TODOS LOS MENSAJES DE ERROR, EL CODIGO DE ABAJO MUESTRA
///// TODOS LOS MENSAJES DE ERROR MENOS LOS QUE NOTICIA, QUE SON CUANDO LAS VARIABLES ESTAN VACIAS.
error_reporting(E_ALL ^ E_NOTICE);
//////////////////CONEXION BD/////////////
require '../controller/conexionbd.php';
/////////////////VARIABLES DE SESION////////////////

$usu=$_SESSION['usuario_sesion'];
$rol=$_SESSION['tipusuario_sesion'];
$zon=$_SESSION['zona_sesion'];
$departamento=$_POST['lst_zona'];

$consulclientes=$db->query("SELECT * FROM cliente ORDER By nom_cliente ASC") or die($db->error);
$consulusuarios=$db->query("SELECT * FROM usuario WHERE id_rol<>2 and id_rol<>1") or die($db->error);
$consulcultivo=$db->query("SELECT * FROM cultivo")or die($db->error);


$consulzona=$db->query("SELECT * FROM zona")or die($db->error);
$consulmunicipio=$db->query("SELECT * FROM municipio")or die($db->error);

//Libero memoria con esta sentecia despues de una consulta
mysqli_free_result($db);
//cierro la conexion
mysqli_close($db);

?>
