
<?php
session_start();
require 'php/conexionbd.php';
$usu=$_SESSION['usuario_sesion'];
$rol=$_SESSION['tipusuario_sesion'];
$zon=$_SESSION['zona_sesion'];


switch ($rol) {
	case 1:
	

	if (isset($_POST['buscar'])) 
	{
		if (empty($_POST['lst_usuario'])) {
			$usuenc=$_POST['lst_usuario'];
			echo '<script>alert("Usuario seleccionado : '.$usu.'")</script>';
		}
		
	}
	$resultado=$db->query("SELECT v.id_visita,v.fecha_visita,v.id_cliente,v.id_usuario, c.nom_cliente, u.nom_usuario FROM visita v, cliente c, usuario u WHERE v.id_cliente=c.id_cliente and v.id_usuario='$usuenc' ORDER By id_visita ASC ") or die($db->error);
	
	$resultadousuario=$db->query("SELECT * FROM usuario WHERE id_usuario<>'$usu' and id_rol<>'2'") or die($db->error);
	break;
	case 2:
	$resultado=$db->query("SELECT v.id_visita,v.fecha_visita,v.id_cliente,v.id_usuario, c.nom_cliente, u.nom_usuario FROM visita v, cliente c, usuario u WHERE v.id_cliente=c.id_cliente and v.id_usuario=u.id_usuario ORDER By id_visita ASC ") or die($db->error);
	$resultadousuario=$db->query("SELECT * FROM usuario WHERE id_zona='$zon' and id_usuario<>'$usu'") or die($db->error);
	break;
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
	<link rel="stylesheet" href="css/main.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700italic,100italic,300' rel='stylesheet' type='text/css'>
	<script src="js/custom.js"></script>
	   

	<title>Ventas Duwest</title>
</head>
<body onload="nobackbutton();">

<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Duwest Colombia S.A.S</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Reporte Visitas<span class="sr-only">(current)</span></a></li>
					<li><a href="#">Reporte Programacion Semanal</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuracion <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Agregar Cliente</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">Separated link</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">One more separated link</a></li>
						</ul>
					</li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuario <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Cambiar Contraseña</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="php/cerrarsesion.php">Cerrar Sesion</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	
	<form method="post" class="form-inline text-center">
		<input trype="text" placeholder="Nombre usuario" name"txtusuario"/>
		<select name="lst_usuario" class="form-control">
			<option value="">Todos Registros</option>
			<?php
				while ($resulusuario = $resultadousuario ->fetch_array(MYSQLI_BOTH))
					echo '<option value"'.$resulusuario['id_usuario'].'">'.$resulusuario['nom_usuario'].'</option>';
			?>

		</select>
		
		<button name="buscar" trype="submit">Buscar</button>
	</form>
	
		
	
	
	<br>
	<br>
	
	<section>

	<br>
	<br>

	<section>
		<table class="table table-striped table-condensed">
						<tr>
							<th>Fecha de la Visita</th>
							<th>Actividad Desarrollada</th>
							<th>Plan de Accion</th>
							<th>Situacion Competencia</th>
							<th>Situacion Competencia</th>
							<th>Situacion Competencia</th>

						</tr>

						

							<?php 
							while ($resul = $resultado ->fetch_array(MYSQLI_BOTH))
							{
								echo'<tr>
								<td>'.$resul['id_visita'].'</td>
								<td>'.$resul['fecha_visita'].'</td>
								<td>'.$resul['id_cliente'].'</td>
								<td>'.$resul['nom_cliente'].'</td>
								<td>'.$resul['id_visita'].'</td>
								<td>'.$resul['id_visita'].'</td>

							</tr>';

							}



							?>
		
	</section>





</body>
</html>			