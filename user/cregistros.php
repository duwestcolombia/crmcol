<?php
session_start();
//validar si el usuario se Logeo, de lo contrario no lo deje ingresar
if(!$_SESSION)
{
	header("location:../ingreso.php");
}
else
{
	require '../php/conexionbd.php';
	$usuario=$_SESSION['usuario_sesion'];

	$resultado=$db->query("SELECT v.fecha_visita,c.nom_cliente,v.sitzona_visita,v.sitcompetencia_visita,v.rvisita_visita,v.nomesporadico_visita
	 FROM visita v, cliente c WHERE v.id_usuario='$usuario'
	 and v.id_cliente = c.id_cliente
	 ORDER By fecha_visita DESC LIMIT 15") or die($db->error);
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700italic,100italic,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../css/main.css">
	<script src="../js/custom.js"></script>
	<link rel="icon" type="image/png" href="../img/logo.png">
	<title>Ventas Duwest</title>
</head>
<body>
	
	<!--Dentro del primer nav esta el menu con alineacion centrada-->

	<nav class="se-gris padding-largo">
		<ul class="no-lista text-center">
			<li class="col-md-4 inline-block"><a href="repvisitas.php">Regresar</a></li>
			<li class="col-md-4 inline-block"><a href="../php/cerrarsesion.php">Cerrar Sesion</a></li>
		</ul>
		
	</nav>
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
							<form action="exportar/exportarexcel.php" method="post">
								<input type="submit" name="exportar" class="btn btn-success" value="Exportar a Excel"/>
							</form>
						</div>
					</div>

				</div>

			</div>

		</div>

	</section>
</body>
</html>