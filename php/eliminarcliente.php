<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
/////CODIGO ERROR_REPORTING(0) EVITA TODOS LOS MENSAJES DE ERROR, EL CODIGO DE ABAJO MUESTRA
///// TODOS LOS MENSAJES DE ERROR MENOS LOS QUE NOTICIA, QUE SON CUANDO LAS VARIABLES ESTAN VACIAS.
  //error_reporting(E_ALL ^ E_NOTICE);

//////////////////CONEXION BD/////////////
require 'conexionbd.php';
///////////////VARIABLES CAPTURADAS DEL OTRO FORMULARIO///////////////////
$id=$_GET['id_cliente'];


$eliminarcliente=$db->query("DELETE FROM cliente WHERE id_cliente='$id'")|| die($db->error);
echo "<script>document.location='../superuser/ventas/frmcliente.php';</script>";

?>