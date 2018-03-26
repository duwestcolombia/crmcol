<?php
session_start();
/////CODIGO ERROR_REPORTING(0) EVITA TODOS LOS MENSAJES DE ERROR, EL CODIGO DE ABAJO MUESTRA
///// TODOS LOS MENSAJES DE ERROR MENOS LOS QUE NOTICIA, QUE SON CUANDO LAS VARIABLES ESTAN VACIAS.
error_reporting(E_ALL ^ E_NOTICE);
//////////////////CONEXION BD/////////////
require '../php/conexionbd.php';
/////////////////VARIABLES DE SESION////////////////

$usu=$_SESSION['usuario_sesion'];
$rol=$_SESSION['tipusuario_sesion'];
$zon=$_SESSION['zona_sesion'];

///////////////////////VARIABLES DE CONSULTA

$usuconsulta=$_POST['lst_usuario'];
$finicio=$_POST['fecha_inicio'];
$ffin=$_POST['fecha_fin'];



////////////////////CONSULTAS PARA TABLA Y PARA COMBOBOX////////////////////////
		switch ($rol) {
			case 1:
	
	$resultado=$db->query("SELECT v.id_visita,v.fecha_visita,v.id_cliente,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, cul.nom_cultivo, z.nom_zona ,v.id_usuario,v.actividad_visita,v.planaccion_visita,v.sitcompetencia_visita 
		FROM visita v, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
		WHERE v.id_cliente=c.id_cliente 
		and c.id_cliente=cc.id_cliente 
		and cul.id_cultivo=cc.id_cultivo 
		and mun.id_municipio=cm.id_municipio 
		and c.id_cliente=cm.id_cliente 
		and z.id_zona=cz.id_zona 
		and c.id_cliente=cz.id_cliente 
		and v.id_usuario='$usuconsulta' 
		and fecha_visita 
		BETWEEN '$finicio' AND '$ffin' 
		GROUP BY id_visita 
		ORDER By id_visita ASC") or die($db->error);

	$resultadousuario=$db->query("SELECT * FROM usuario WHERE id_usuario<>'$usu' and id_rol<>'2'") or die($db->error);

		//echo '<script>alert("Usuario seleccionado : '.$usuconsulta.'")</script>';


	
	
	break;
	case 2:

	$resultado=$db->query("SELECT v.id_visita,v.fecha_visita,v.id_cliente,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, cul.nom_cultivo, z.nom_zona ,v.id_usuario,v.actividad_visita,v.planaccion_visita,v.sitcompetencia_visita 
		FROM visita v, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
		WHERE v.id_cliente=c.id_cliente 
		and c.id_cliente=cc.id_cliente 
		and cul.id_cultivo=cc.id_cultivo 
		and mun.id_municipio=cm.id_municipio 
		and c.id_cliente=cm.id_cliente 
		and z.id_zona=cz.id_zona 
		and c.id_cliente=cz.id_cliente 
		and v.id_usuario='$usuconsulta' 
		and fecha_visita 
		BETWEEN '$finicio' AND '$ffin' 
		GROUP BY id_visita 
		ORDER By id_visita ASC") or die($db->error);
	$resultadousuario=$db->query("SELECT * FROM usuario WHERE id_zona='$zon' and id_usuario<>'$usu'") or die($db->error);
	//echo "<script>location.href='admrvisitas.php'</script>";
	//header("location:admrvisitas.php");
	/*if ($resultado) {
		echo "<script>location.href='admrvisitas.php'</script>";
	}
	else{
		header("location:admrvisitas.php");
	}*/
	break;
}


?>