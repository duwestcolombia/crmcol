<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
/////CODIGO ERROR_REPORTING(0) EVITA TODOS LOS MENSAJES DE ERROR, EL CODIGO DE ABAJO MUESTRA
///// TODOS LOS MENSAJES DE ERROR MENOS LOS QUE NOTICIA, QUE SON CUANDO LAS VARIABLES ESTAN VACIAS.
  //error_reporting(E_ALL ^ E_NOTICE);

//////////////////CONEXION BD/////////////
require 'conexionbd.php';
///////////////VARIABLES CAPTURADAS DEL OTRO FORMULARIO///////////////////
$id=$_POST['txtidcliente'];
$idget=$_POST['txtidnuevocliente'];

$nombre=$_POST['txtnomcliente'];
$tipo=$_POST['txttipcliente'];
$usuasoc=$_POST['lst_usuario'];

if($idget=="" and $usuasoc=="")
{
	$actualizarcliente=$db->query("UPDATE cliente SET nom_cliente='$nombre', tipo_cliente='$tipo' WHERE id_cliente='$id'")|| die($db->error);

	if ($actualizarcliente)
	{
		echo '<script>alert("Datos modificados correctamente")</script>';
		echo "<script>location.href='../superuser/ventas/frmcliente.php'</script>";
	}
	else
	{
		echo '<script>alert("Erro, Verifique los datos ingresados e intente de nuevo")</script>';
		echo "<script>location.href='../superuser/ventas/frmcliente.php'</script>";
		
	}
	
	
	
}
else if($idget=="")
{
	$actualizarcliente=$db->query("UPDATE cliente SET nom_cliente='$nombre', tipo_cliente='$tipo', id_usuario='$usuasoc' WHERE id_cliente='$id'")|| die($db->error);

	if ($actualizarcliente)
	{
		echo '<script>alert("Datos modificados correctamente")</script>';
		echo "<script>location.href='../superuser/ventas/frmcliente.php'</script>";
	}
	else
	{
		echo '<script>alert("Erro, Verifique los datos ingresados e intente de nuevo")</script>';
		echo "<script>location.href='../superuser/ventas/frmcliente.php'</script>";
		
	}
}
else if($usuasoc=="")
{
	$actualizarcliente=$db->query("UPDATE cliente SET id_cliente='$idget', nom_cliente='$nombre', tipo_cliente='$tipo' WHERE id_cliente='$id'")|| die($db->error);

	if ($actualizarcliente)
	{
		echo '<script>alert("Datos modificados correctamente")</script>';
		echo "<script>location.href='../superuser/ventas/frmcliente.php'</script>";
	}
	else
	{
		echo '<script>alert("Error, Verifique los datos ingresados e intente de nuevo")</script>';
		echo "<script>location.href='../superuser/ventas/frmcliente.php'</script>";
		
	}
}


//////////////////////MODIFICAR DATOS////////////////////////////

/*$actualizarcliente=$db->query("UPDATE cliente SET id_cliente='$idget', nom_cliente='$nombre', tipo_cliente='$tipo' WHERE id_cliente='$id'")|| die($db->error);

if ($actualizarcliente)
{
		echo '<script>alert("Datos modificados correctamente")</script>';
		echo "<script>location.href='../frmcliente.php'</script>";
}
else
{
			echo '<script>alert("Erro, Verifique los datos ingresados e intente de nuevo")</script>';
			echo "<script>location.href='../frmcliente.php'</script>";
	
}
*/
			
		
	
		
///////////////////FIN MODIFICACION//////////////////////////////

/////////////////////CONSULTA QUE HASTA EL MOMENTO NO HE UTILIZADO
/*$consulcliente=$db->query("SELECT * FROM cliente WHERE id_cliente='$id'") or die($db->error);
while ($resulcliente = $consulcliente ->fetch_array())
{
	$idenc=$resulcliente['id_cliente'];
	$nomec=$resulcliente['nom_cliente'];
	$tipenc=$resulcliente['tipo_cliente'];
	echo $id;
	echo $idenc;
	if ($idenc==$id)
	{

		echo $id;
						
	}
	else
	{
		echo "Nombre cliente modificado";
	}
	
	
	

}*/
////////////////////////////////FIN DE CONSULTA

?>