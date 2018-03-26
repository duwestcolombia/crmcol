<?php
ob_start();
session_start();
//validar si el usuario se Logeo, de lo contrario no lo deje ingresar
/*if(!$_SESSION)
{
	header("location:../ingreso.php");
}
else
{*/
	date_default_timezone_set("America/Bogota");
	$hoy=date("Y-m-d h:i:sa");
	require '../../php/conexionbd.php';
	header('Content-type: application/vnd.ms-excel');
	//echo "<script>location.href='Content-type: application/vnd.ms-excel'</script>";
	header("Content-Disposition: attachment; filename=registros de visita ".$hoy.".xls");
	//echo "<script>location.href='Content-Disposition: attachment; filename=registros de visita '".$_SESSION['usuario_sesion']."'.xls'</script>";
	header("Pragma: no-cache");
	//echo "<script>location.href='Pragma: no-cache'</script>";
	header("Expires: 0");
	//echo "<script>location.href='Expires: 0'</script>";

$usu=$_SESSION['usuario_sesion'];
$rol=$_SESSION['tipusuario_sesion'];
$zon=$_SESSION['zona_sesion'];

///////////////////////VARIABLES DE CONSULTA
/*$usuconsulta=$_POST['usu'];
$fini=$_POST['finicio'];
$ffin=$_POST['ffin'];
$rol=$_POST['rol'];*/

$usuconsulta=$_POST['lst_usuario'];
$fini=$_POST['fecha_inicio'];
$ffin=$_POST['fecha_fin'];

////////////////////CONSULTAS PARA TABLA Y PARA COMBOBOX////////////////////////
if ($usuconsulta=="todos") {
switch ($rol) {	
	case 2:
		//Consulta para los lideres con 1 Zona
		$resultado=$db->query("SELECT v.fecha_visita,v.id_cliente,v.nomesporadico_visita,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, cul.nom_cultivo, z.nom_zona ,v.id_usuario,v.sitzona_visita,v.sitcompetencia_visita,v.rvisita_visita 
				FROM visita v, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
				WHERE v.id_cliente=c.id_cliente 
				and c.id_cliente=cc.id_cliente 
				and cul.id_cultivo=cc.id_cultivo 
				and mun.id_municipio=cm.id_municipio 
				and c.id_cliente=cm.id_cliente 
				and z.id_zona=cz.id_zona 
				and c.id_cliente=cz.id_cliente 
				and z.id_zona='$zon'
				and v.fecha_visita 
				BETWEEN '$fini' AND '$ffin' 
				GROUP BY v.id_visita 
				ORDER By v.fecha_visita ASC") or die($db->error);
			$cantDatos = mysqli_num_rows($resultado);
		
		break;
		case 3:
		//Consulta para el lider Periferia cundinamarca y Periferia Boyaca.
		$resultado=$db->query("SELECT v.fecha_visita,v.id_cliente,v.nomesporadico_visita,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, 
			cul.nom_cultivo, z.nom_zona ,v.id_usuario,v.sitzona_visita,v.sitcompetencia_visita,v.rvisita_visita,u.sector_usuario
			FROM visita v, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
			WHERE v.id_cliente=c.id_cliente 
			and c.id_cliente=cc.id_cliente 
			and cul.id_cultivo=cc.id_cultivo 
			and mun.id_municipio=cm.id_municipio 
			and c.id_cliente=cm.id_cliente 
			and z.id_zona=cz.id_zona 
			and c.id_cliente=cz.id_cliente 
			and v.id_usuario=u.id_usuario
			and z.id_zona>='2'
			and z.id_zona<='3'
			and u.sector_usuario<>'Flores'
			and v.fecha_visita 
			BETWEEN '$fini' AND '$ffin' 
			GROUP BY v.id_visita 
			ORDER By v.fecha_visita ASC") or die($db->error);
		$cantDatos = mysqli_num_rows($resultado);

		break;
		case 4:
		//Consulta Para el Lider de Flores Sabana y flores Antioquia.
		$resultado=$db->query("SELECT v.fecha_visita,v.id_cliente,v.nomesporadico_visita,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, 
			cul.nom_cultivo, z.nom_zona ,v.id_usuario,v.sitzona_visita,v.sitcompetencia_visita,v.rvisita_visita,u.sector_usuario
			FROM visita v, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
			WHERE v.id_cliente=c.id_cliente 
			and c.id_cliente=cc.id_cliente 
			and cul.id_cultivo=cc.id_cultivo 
			and mun.id_municipio=cm.id_municipio 
			and c.id_cliente=cm.id_cliente 
			and z.id_zona=cz.id_zona 
			and c.id_cliente=cz.id_cliente 
			and v.id_usuario=u.id_usuario
			and z.id_zona>='1'
			and z.id_zona<='3'
			and u.sector_usuario<>'Periferia'
			and v.fecha_visita 
			BETWEEN '$fini' AND '$ffin' 
			GROUP BY v.id_visita 
			ORDER By v.fecha_visita ASC") or die($db->error);
		$cantDatos = mysqli_num_rows($resultado);

		break;
		case 5:
			//Consulta Para el Lider de Nariño, Cauca y Huila.
			$resultado=$db->query("SELECT v.fecha_visita,v.id_cliente,v.nomesporadico_visita,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, cul.nom_cultivo, z.nom_zona ,v.id_usuario,v.sitzona_visita,v.sitcompetencia_visita,v.rvisita_visita 
			FROM visita v, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
			WHERE v.id_cliente=c.id_cliente 
			and c.id_cliente=cc.id_cliente 
			and cul.id_cultivo=cc.id_cultivo 
			and mun.id_municipio=cm.id_municipio 
			and c.id_cliente=cm.id_cliente 
			and z.id_zona=cz.id_zona 
			and c.id_cliente=cz.id_cliente 
			and z.id_zona>='5'
			and z.id_zona<='7' 
			and v.fecha_visita 
			BETWEEN '$fini' AND '$ffin' 
			GROUP BY v.id_visita ASC") or die($db->error);
			$cantDatos = mysqli_num_rows($resultado);
		break;
	}


	
}
else
{

$resultado=$db->query("SELECT v.fecha_visita,v.id_cliente,v.nomesporadico_visita,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, 
	cul.nom_cultivo, z.nom_zona ,v.id_usuario,v.sitzona_visita,v.sitcompetencia_visita,v.rvisita_visita 
	FROM visita v, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
	WHERE v.id_cliente=c.id_cliente 
	and c.id_cliente=cc.id_cliente 
	and cul.id_cultivo=cc.id_cultivo 
	and mun.id_municipio=cm.id_municipio 
	and c.id_cliente=cm.id_cliente 
	and z.id_zona=cz.id_zona 
	and c.id_cliente=cz.id_cliente 
	and v.id_usuario='$usuconsulta' 
	and v.fecha_visita 
	BETWEEN '$fini' AND '$ffin' 
	GROUP BY v.id_visita 
	ORDER By v.fecha_visita ASC") or die($db->error);
$cantDatos = mysqli_num_rows($resultado);
}	





?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/main.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700italic,100italic,300' rel='stylesheet' type='text/css'>
	<script src="../js/custom.js"></script>
	

	<title>Ventas Duwest</title>-->
	
</head>
<body>
	
	<section>
		<!-- Aqui empieza la tabala -->
		<div class="panel-body">
			<div class="table-responsive">
				
					<?php 
					if ($cantDatos==0) {
						echo 'No se encontraron resultados en la base de datos, intenta con un nuevo filtro.';
					}
					else
					{

					echo '<table class="table table-striped table-bordered table-condensed " id="tab_repvisitas" name="tab_repvisitas" cellspacing="0" width="100%">

							<tr>
							<th class="success">Fecha Visita</th>
							<th class="success">Id Cliente</th>
							<th class="success">Nombre Cliente</th>
							<th class="success">Nombre Cliente Esporadico</th>
							<th class="success">Tipo Cliente</th>
							<th class="success">Zoná</th>
							<th class="success">Municipio</th>
							<th class="success">Cultivo</th>
							<th class="success">Nombre Usuario</th>
							<th class="success">Situacion zoná</th>
							<th class="success">Situación Competencia</th>
							<th class="success">Reporte de Visita</th>


							</tr>';

						while ($resul = $resultado ->fetch_array(MYSQLI_BOTH))
						{

							echo '<tr>
							<td>'.$resul['fecha_visita'].'</td>
							<td>'.$resul['id_cliente'].'</td>
							<td>'.$resul['nom_cliente'].'</td>
							<td>'.$resul['nomesporadico_visita'].'</td>
							<td>'.$resul['tipo_cliente'].'</td>
							<td>'.$resul['nom_zona'].'</td>
							<td>'.utf8_encode($resul['nom_municipio']).'</td>
							<td>'.$resul['nom_cultivo'].'</td>
							<td>'.$resul['id_usuario'].'</td>
							<td>'.$resul['sitzona_visita'].'</td>
							<td>'.$resul['sitcompetencia_visita'].'</td>
							<td>'.$resul['rvisita_visita'].'</td>
							</tr>';

						}



					echo'	</table>'; 

					 }
					 ?>
			
			</div>
		</div>
	</section>
	
</body>
</html>
<?php 
ob_end_flush();
//Con esta linea ya puedo utilizar los headers
?>			