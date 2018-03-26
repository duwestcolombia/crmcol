<?php
ob_start();
//Con la linea anterior ya puedo usar los headers online
session_start();
//validar si el usuario se Logeo, de lo contrario no lo deje ingresar
/*if(!$_SESSION)
{
	//header("location:../../ingreso.php");
	echo "<script>location.href='../../ingreso.php'</script>";
}
else

{*/
	
	require '../../php/conexionbd.php';
	header('Content-type: application/vnd.ms-excel');
	//echo "<script>location.href='Content-type: application/vnd.ms-excel'</script>";
	header("Content-Disposition: attachment; filename=registros de visita ".$_SESSION['usuario_sesion'].".xls");
	//echo "<script>location.href='Content-Disposition: attachment; filename=registros de visita '".$_SESSION['usuario_sesion']."'.xls'</script>";
	header("Pragma: no-cache");
	//echo "<script>location.href='Pragma: no-cache'</script>";
	header("Expires: 0");
	//echo "<script>location.href='Expires: 0'</script>";
	
	$usuario=$_SESSION['usuario_sesion'];

	$resultado=$db->query("SELECT v.fecha_visita,c.nom_cliente,v.sitzona_visita,v.sitcompetencia_visita,v.rvisita_visita,v.nomesporadico_visita
		FROM visita v, cliente c WHERE v.id_usuario='$usuario'
		and v.id_cliente = c.id_cliente
		ORDER By fecha_visita DESC LIMIT 15") or die($db->error);
//}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!--
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/main.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700italic,100italic,300' rel='stylesheet' type='text/css'>
	<title>Ventas Duwest</title>-->
</head>
<body>
	
	<!--Dentro del primer nav esta el menu con alineacion centrada-->
	<!--
	<nav class="se-gris padding-largo">
		<ul class="no-lista text-center">
			<li class="col-md-4 inline-block"><a href="repvisitas.php">Regresar</a></li>
			<li class="col-md-4 inline-block"><a href="php/cerrarsesion.php">Cerrar Sesion</a></li>
		</ul>
		
	</nav>
-->
	<!--Aqui empieza la estructura-->
	<section class="container-fluid espacio-arriba1">
		<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<h1 class="padding-largo grande">Ultimos Registros</h1>
					</dvi>
					<div class="panel-body">
						<div>
							<table class="table table-striped table-condensed">
								<tr>
									<th>Fecha de la Visita</th>
									<th>Cliente</th>
									<th>Nombre del esporadico</th>
									<th>Situación Zona</th>
									<th>Situación Competencia</th>
									<th>Reporte de la Visita</th>

								</tr>

								<tr>
									
									<?php while ($row=$resultado->fetch_array())  {?>
									<tr>
										<td><?php echo $row['fecha_visita']; ?></td>
										<td><?php echo $row['nom_cliente']; ?></td>
										<td><?php echo $row['nomesporadico_visita']; ?></td>
										<td><?php echo $row['sitzona_visita']; ?></td>
										<td><?php echo $row['sitcompetencia_visita']; ?></td>
										<td><?php echo $row['rvisita_visita']; ?></td>
									</tr>
									<?php
								}

								?>	

							</tr>

							</table>
						</div>
					</div>

				</div>

			</div>

		</div>

	</section>
</body>
</html>
<?php
ob_end_flush();
//Con esta linea ya puedo utilizar los headers
?>