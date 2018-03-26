<?php
session_start();
/////CODIGO ERROR_REPORTING(0) EVITA TODOS LOS MENSAJES DE ERROR, EL CODIGO DE ABAJO MUESTRA
///// TODOS LOS MENSAJES DE ERROR MENOS LOS QUE NOTICIA, QUE SON CUANDO LAS VARIABLES ESTAN VACIAS.
error_reporting(E_ALL ^ E_NOTICE);
//////////////////CONEXION BD/////////////
require 'conexionbd.php';
/////////////////VARIABLES DE SESION////////////////

$usu=$_SESSION['usuario_sesion'];
$rol=$_SESSION['tipusuario_sesion'];
$zon=$_SESSION['zona_sesion'];

$idcliente=$_GET['id_cliente'];

$consulcliente=$db->query("SELECT * FROM cliente WHERE id_cliente='$idcliente'") or die($db->error);
$consulusuarios=$db->query("SELECT * FROM usuario WHERE id_rol<>2") or die($db->error);

/*while ($resulcliente = $consulcliente ->fetch_array())
{
	
	echo '<script>alert("Fecha fin : '.$resulcliente['id_cliente'].'")</script>';
	echo '<script>alert("Fecha fin : '.$resulcliente['nom_cliente'].'")</script>';

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
	<script src="../js/jquery-migrate-1.4.1.js" type="text/javascript"></script>

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
					<li class="active"><a href="../superuser/index.php">Reporte Visitas<span class="sr-only">(current)</span></a></li>
					<li><a href="../superuser/surprogramacion.php">Reporte Programacion Semanal</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuracion <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="../superuser/ventas/frmcliente.php">Agregar Cliente</a></li>
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
	<section>
		
		<div class="text-center">
			<h1>Modificar datos de Cliente</h1>
			<nav>
					<div class="col-md-4 inline-block">
						<form action="editcliente.php" method="post" style="margin-top:1.5em;">
							
							
							<?php
							while ($resulcliente = $consulcliente ->fetch_array())
							{


								echo '
								<div class="form-group">
								<label for="idcliente">Identificacion del cliente</label>
								<input type="text" name="txtidcliente" required="required" class="form-control" readonly="readonly" value="'.$resulcliente['id_cliente'].'"/>
								</div>
								<div class="form-group">
								<label for="idcliente">Nueva identificacion del cliente</label>
								<input type="text" name="txtidnuevocliente" class="form-control"/>
								</div>
								<div class="form-group">
								<label for="nomcliente">Nombre Cliente</label>
								<input type="text" name="txtnomcliente" required="required" class="form-control" value="'.$resulcliente['nom_cliente'].'"/>
								</div>
								<div class="form-group">
								<label for="tipcliente">Tipo de Cliente</label>
								<input type="text" name="txttipcliente" required="required" class="form-control" value="'.$resulcliente['tipo_cliente'].'"/>
								</div>
								<div class="form-group">
								<label for="tipcliente">Usuario Asociado</label>
								<input type="text" name="txtusuasociado" required="required" class="form-control" readonly="readonly" value="'.$resulcliente['id_usuario'].'"/>
								</div>					


								';

							}

							?>
							<div class="form-group">
								<label for="tipcliente">Seleccione si desea asociar nuevo usuario</label>
								<select name="lst_usuario" class="form-control boton" onchange="">
									<option value=""></option>
									<?php 
									
									foreach ($consulusuarios as $value) {?>
									<option value="<?php echo $value['id_usuario'];?>"><?php echo $value['id_usuario'];?></option>
									<?php
								}

								?>
								</select>
							</div>
							<br>
							<input type="submit" name="exportar" class="btn btn-success" value="Modificar"/>

					</form>
				</div>



			</nav>
				


		</div>
		
	
</section>

</body>
</html>	