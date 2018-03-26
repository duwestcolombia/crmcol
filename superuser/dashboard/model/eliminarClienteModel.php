<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
/////CODIGO ERROR_REPORTING(0) EVITA TODOS LOS MENSAJES DE ERROR, EL CODIGO DE ABAJO MUESTRA
///// TODOS LOS MENSAJES DE ERROR MENOS LOS QUE NOTICIA, QUE SON CUANDO LAS VARIABLES ESTAN VACIAS.
  //error_reporting(E_ALL ^ E_NOTICE);

//////////////////CONEXION BD/////////////
require '../controller/conexionbd.php';
///////////////VARIABLES CAPTURADAS DEL OTRO FORMULARIO///////////////////
$id=$_GET['id_cliente'];
echo'
<script>
var reply=confirm("Desea eliminar el cliente: '.$id.' y todos sus registros?")
if (reply==false) 
{
	
 	document.location="../superuser/ventas/frmcliente.php";
}
else
{
	document.location="eliminarcliente.php?id_cliente='.$id.'";
}
</script>
';


?>