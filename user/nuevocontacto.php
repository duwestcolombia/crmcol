<?php
//session_start();
//validar si el usuario se Logeo, de lo contrario no lo deje ingresar
/*if(!$_SESSION)
{
	//header("location:../ingreso.php");
	echo "<script>location.href='../ingreso.php'</script>";
}*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/main.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700italic,100italic,300' rel='stylesheet' type='text/css'>
	<script src="../js/custom.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<link rel="icon" type="image/png" href="../img/logo.png">
	<title>Ventas Duwest</title>
</head>
<body onload="nobackbutton();">
	<!-- Aqui empieza el menu -->
	<header>
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
						<li class="active"><a href="repvisitas.php">Reporte Visitas<span class="sr-only">(current)</span></a></li>
						<li><a href="../calendar/index.php">Reporte Programacion Semanal</a></li>
						<li><a href="actualizarcliente.php">Actualizar Cliente</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Portafolio de Clientes <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="../graficos/grafico/bubble/index.php">Grafico Cuadrantes</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="../portafolioclientes/plannegocios.php">Plan de Negocio X Cliente</a></li>

							</ul>
						</li>

					</ul>


					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuario <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="../php/cambiarpass.php">Cambiar Contraseña</a></li>
								
								<li role="separator" class="divider"></li>


								<li><a href="../php/cerrarsesion.php">Cerrar Sesion</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</header>
	<!-- aqui termina el menu -->

	<section class="seccion">

			<h1 class="text-center">Agregar un nuevo Contacto.</h1>
			<br>

		<div class="row">
			<div class="col-md-6">
				<input type="text" class="form-control" placeholder="Numero de documento de identificacion.">
			</div>
			<div class="col-md-6">
				<input type="text" class="form-control" placeholder="Nombre completo.">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-6">
				<input type="number" class="form-control" placeholder="Numero de Telefono.">
			</div>
			<div class="col-md-6">
				<input type="email" class="form-control" placeholder="Correo Electronico">
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<label>Fecha cumpleaños:</label>
				<input type="date" class="form-control" >
			</div>
			<div class="col-md-6">
				<label>Cliente:</label>
				<select class="form-control">
					<option value=""></option>
					<?php 
					require '../php/llenarcombos.php';

					foreach ($resultado as $value) {?>
					<option value="<?php echo $value['id_cliente'];?>"><?php echo utf8_encode ($value['nom_cliente']);?></option>
					<?php
				}

				?>
				</select>
			</div>
		</div>
		<hr>
		<input type="button" class="btn btn-primary" value="Registrar" onClick="alert('pulsaste registrar')">
	</section>
	<footer class="pie-pagina">
		<div class="row">
			<div class="col-md-4">
			<!--
				<p>Autopista Medellin Km 2 parque empesarial</p>
				<p>Oikos - La florida, Bodega 5, 6 y 7</p>
				<p>Diseñado por: David Zambrano</p>
			-->	
		</div>
		<div class="col-md-4">

			<img src="../img/duwestfooter.png" height="100"><br>
			<p>©2016. Duwest Colombia Todos los Derechos reservados.</p>
			<p>Diseñado por: <strong>David Zambrano</strong></p>


		</div>
		<div class="col-md-4">
			<!--	
				<ul class="">
					<li>Ayuda</li>
					<li></li>
				</ul>
			-->					
		</div>
	</div>

	</footer>	
</body>
</html>