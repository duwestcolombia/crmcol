<?php

session_start();
/////CODIGO ERROR_REPORTING(0) EVITA TODOS LOS MENSAJES DE ERROR, EL CODIGO DE ABAJO MUESTRA
///// TODOS LOS MENSAJES DE ERROR MENOS LOS QUE NOTICIA, QUE SON CUANDO LAS VARIABLES ESTAN VACIAS.
//error_reporting(E_ALL ^ E_NOTICE);
//////////////////CONEXION BD/////////////
require 'conexionbd.php';
require 'conexionbdaudi.php';

$id=$_POST['txtidcliente'];
$nom=$_POST['txtnomcliente'];
$tip=$_POST['lst_tipcliente'];
$div=$_POST['lst_division'];
$usuasoc=$_POST['lst_usuario'];
$cultivo=$_POST['lst_cultivo'];
$numhect=$_POST['txtnumhect'];
$depto=$_POST['lst_zona'];
$municipio=$_POST['lst_municipio'];
$usu=$_SESSION['usuario_sesion'];
date_default_timezone_set("America/Bogota");
$hoy=date("Y-m-d h:i:sa");
/*echo $cultivo;
echo $depto;
echo $municipio;
echo $usu;*/

/*echo $id;
echo $nom;
echo $tip;
echo $usuasoc;*/

$agregarcliente=$db->query
("INSERT Into cliente(id_cliente,nom_cliente,tipo_cliente,division_cliente) 
values('$id','$nom','$tip','$div')")|| die("Error al agregar el cliente: " . $db->error);

$agregacultivo=$db->query("INSERT Into cliente_cultivo (id_clientecultivo, id_cliente, id_cultivo, nhectsembradas_clientecultivo) 
			values(NULL,'$id','$cultivo','$numhect')")|| die("Error al asociar un cultivo al cliente: " . $db->error);

$agregadepto=$db->query("INSERT Into cliente_zona(id_clientezona,id_cliente,id_zona) values(NULL,'$id','$depto')")|| die("Error al asociar una zona al cliente: ".  $db->error);

$agregamunicipio=$db->query("INSERT Into cliente_municipio(id_clientemunicipio, id_cliente, id_municipio, hect_cliente, hectsemb_cliente, tel_cliente, fcumpleanos_cliente, email_cliente, direccion_cliente, vtotalcompras_cliente, vtotalcomprasnutri_cliente, id_usuario, contacto_cliente) 
							values(NULL,'$id','$municipio','0','0','111','2016-01-01','a@g.com','cll 10', '0','0','$usu','NA')")|| die("Error al agregar el cliente al municipio: " . $db->error);


$agrecliente=$dbaudi->query
("INSERT Into cliente(id_cliente,nom_cliente,tipo_cliente,tiporeg_cliente,division_cliente,freg_cliente,usureg_cliente)
 values('$id','$nom','$tip','R','$div','$hoy','$usu')")|| die($dbaudi->error);

$agrecultivo=$dbaudi->query("INSERT Into cliente_cultivo(id_clientecultivo,id_cliente,id_cultivo,nhectsembradas_clientecultivo,tiporeg_clientecultivo,freg_clientecultivo,usureg_clientecultivo)
					 values(NULL,'$id','$cultivo','$numhect','R','$hoy','$usu')")|| die($dbaudi->error);

$agredepto=$dbaudi->query("INSERT Into cliente_zona(id_clientezona,id_cliente,id_zona,tiporeg_clientezona,freg_clientezona,usureg_clientezona) values(NULL,'$id','$depto','R','$hoy','$usu')")|| die($dbaudi->error);

$agremunicipio=$dbaudi->query("INSERT Into cliente_municipio(id_clientemunicipio, id_cliente, id_municipio, hect_cliente, hectsemb_cliente, tel_cliente, fcumpleanos_cliente, email_cliente, direccion_cliente, vtotalcompras_cliente, vtotalcomprasnutri_cliente, id_usuario, contacto_cliente,tiporeg_clientemunicipio,freg_clientemunicipio,usureg_clientemunicipio) 
	values(NULL,'$id','$municipio','0','0','111','2016-01-01','a@g.com','cll 10', '0','0','$usu','NA''R','$hoy','$usu')")|| die($dbaudi->error);

if($agregarcliente)
{
	if ($agremunicipio) 
	{
		echo "<script>document.location='../superuser/ventas/frmcliente.php';</script>";
	}
	else
	{
		echo "<script>alert(Error)</script>";
	}
	
}
else
{
	echo "<script>Error Cliente: alert(Error)</script>";
}



?>