<?php 
session_start();
//validar si el usuario se Logeo, de lo contrario no lo deje ingresar
if(!$_SESSION)
{
	header("location:../ingreso.php");
}
require '../php/conexionbd.php';
$usu=$_SESSION['usuario_sesion'];
$rol=$_SESSION['tipusuario_sesion'];
$zon=$_SESSION['zona_sesion'];

////////////////////CONSULTAS PARA TABLA Y PARA COMBOBOX////////////////////////
	switch ($rol) {
	case 1:

	$resultadousuario=$db->query("SELECT * FROM usuario WHERE id_usuario<>'$usu' and id_rol<>'2' ORDER BY nom_usuario ASC") or die($db->error);

	break;
	case 2:
	//Consulta para los lideres con 1 Zona

	$resultadousuario=$db->query("SELECT * FROM usuario WHERE id_zona='$zon' and id_usuario<>'$usu' and sector_usuario<>'Administrador' and sector_usuario<>'Flores' ORDER BY nom_usuario ASC") or die($db->error);
	break;
	case 3:
	//Consulta para el lider Periferia cundinamarca y Periferia Boyaca.

	$resultadousuario=$db->query("SELECT * FROM usuario WHERE id_zona>='2'and id_zona<='3' and id_usuario<>'$usu' and sector_usuario<>'Flores' ORDER BY nom_usuario ASC") or die($db->error);
	/*while ($res=$resultadousuario->fetch_assoc()){

	}*/
	break;
	case 4:
	//Consulta Para el Lider de Flores Sabana y flores Antioquia.

	$resultadousuario=$db->query("SELECT * FROM usuario WHERE id_zona>='1'and id_zona<='3' and id_usuario<>'$usu' and sector_usuario<>'Periferia' ORDER BY nom_usuario ASC") or die($db->error);
	break;
	case 5:
		//Consulta Para el Lider de Nariño, Cauca y Huila.

	$resultadousuario=$db->query("SELECT * FROM usuario WHERE id_zona>='5'and id_zona<='7' and id_usuario<>'$usu' ORDER BY nom_usuario ASC") or die($db->error);
	break;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="../img/logo.png">
	<title>Ventas Duwest</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/main.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700italic,100italic,300' rel='stylesheet' type='text/css'>

	<!-- Bootstrap Core CSS -->
	<link href="dashboard/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="dashboard/css/sb-admin.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="dashboard/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<script src="../js/custom.js"></script>
	<script type="text/javascript" src="../js/admin/validaNuevaTarea.js"></script>
	
	<script type="text/javascript">
		/*$(document).ready(function(){
			var d = new Date();
			//conseguir el dia
			var dia = d.getDate();
			var mes = d.getMonth();
			var anio = d.getFullYear();

			alert(dia + "/" + mes + "/" + anio);
		});*/
	</script>
	
</head>
<body onload="nobackbutton();">

	<div id="wrapper">
		<header>
			<!-- Navigation -->
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">Duwest Colombia | Administrador</a>
				</div>

				<!-- Top Menu Items -->
				<!-- SECCION DE LOS MENSAJES-->
				<ul class="nav navbar-right top-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
						<ul class="dropdown-menu message-dropdown">
							<li class="message-preview">
								<a href="#">
									<div class="media">
										<span class="pull-left">
											<!-- ESTA ES UNA IMAGEN QUE SE PUEDE PONER JUNTO A LOS MENSAJES DE NOTIFICACION -->
											<img class="media-object" src="http://placehold.it/50x50" alt="">
										</span>
										<div class="media-body">
											<h5 class="media-heading"><strong><?php echo $usu?></strong>
											</h5>
											<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
											<p>Lorem ipsum dolor sit amet, consectetur...</p>
										</div>
									</div>
								</a>
							</li>
							<!-- SECCION 2 DE LOS MENSAJES-->
							<li class="message-preview">
								<a href="#">
									<div class="media">
										<span class="pull-left">
											<img class="media-object" src="http://placehold.it/50x50" alt="">
										</span>
										<div class="media-body">
											<h5 class="media-heading"><strong><?php echo $usu?></strong>
											</h5>
											<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
											<p>Lorem ipsum dolor sit amet, consectetur...</p>
										</div>
									</div>
								</a>
							</li>
							<!-- SECCION 3 DE LOS MENSAJES-->
							<li class="message-preview">
								<a href="#">
									<div class="media">
										<span class="pull-left">
											<img class="media-object" src="http://placehold.it/50x50" alt="">
										</span>
										<div class="media-body">
											<h5 class="media-heading"><strong>John Smith</strong>
											</h5>
											<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
											<p>Lorem ipsum dolor sit amet, consectetur...</p>
										</div>
									</div>
								</a>
							</li>
							<!-- SECCION LEER TODOS LOS MENSAJES-->
							<li class="message-footer">
								<a href="#">Leer todos los nuevos mensajes</a>
							</li>
						</ul>
					</li>
					<!-- FIN SECCION MENSAJES-->


					<!-- SECCION DE LAS ALERTAS-->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
						<ul class="dropdown-menu alert-dropdown">
							<li>
								<a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
							</li>
							<li>
								<a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
							</li>
							<li>
								<a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
							</li>
							<li>
								<a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
							</li>
							<li>
								<a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
							</li>
							<li>
								<a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">View All</a>
							</li>
						</ul>
					</li>
					<!-- FIN SECCION ALERTAS-->

					<!-- SECCION DEL USUARIO -->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $usu?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li>
								<a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
							</li>
							<li>
								<a href="#"><i class="fa fa-fw fa-envelope"></i> Bandeja Entrada</a>
							</li>
							<li>
								<a href="cambiarpass.php"><i class="fa fa-fw fa-gear"></i> Cambiar Contraseña</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="../php/cerrarsesion.php"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesion</a>
							</li>
						</ul>
					</li>
				</ul>
				<!-- FIN SECCION DEL USUARIO -->

				<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav side-nav">
						<li >
							<a href="dashboard/index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
						</li>
						<li >

							<a href="admrvisitas.php" ><i class="fa fa-fw fa-bar-chart-o" ></i> Reporte de Visitas</a>
						</li>
						<li>
							<a href="rprogramacion.php"><i class="fa fa-fw fa-bar-chart-o"></i> Reporte de programacion semanal</a>
						</li>

						<li class="active">
							<a href="frm_nuevatarea.php"><i class="fa fa-fw fa-edit"></i> Agregar Tarea</a>
						</li>
						<li>
							<a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Portafolio de Clientes <i class="fa fa-fw fa-caret-down"></i></a>
							<ul id="demo" class="collapse">
								<li id="graf">
									<a href="graficocuadrantes.php">Grafico de Cuadrantes</a>
								</li>
								<li>
									<a href="vistaPlanNegocio.php">Planes de Negocio</a>
								</li>
							</ul>
						</li>

					</ul>
				</div>
				<!-- /.navbar-collapse -->

			</nav>
		</header>
		<section>
			<div id="page-wrapper">
				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">
								 Agregar nueva Tarea
							</h1>
							<ol class="breadcrumb">
								<li>
									<i class="fa fa-dashboard"></i>  <a href="dashboard/index.php">Dashboard</a>
								</li>
								<li class="active">
									<i class="fa fa-edit"></i> Agregar nueva tarea
								</li>
							</ol>
						</div>
					</div>
					<!-- /.row -->
					<form role="form">
						<div class="panel panel-primary">
							<div class="panel-heading">

								<span></span>
							</div>
							<div class="panel-body">
								<div class="form-group">
									<label>Seleccione el usuario:</label>
									<select name="lst_usuario" id="lst_usuario" class="form-control" required="required" onChange="cargaClientes();">
										<option value="0"></option>
										<?php
										while ($resulusuario = $resultadousuario ->fetch_array(MYSQLI_BOTH))
											echo '<option value="'.$resulusuario['id_usuario'].'">'.utf8_encode($resulusuario['nom_usuario']).'</option>';

										?>
									</select>
								</div>
								<div class="form-group">
									<label>Cliente:</label>

									<div id="lista_cliente" name="lista_cliente">
									<select name="lst_usuario" id="lst_usuario" class="form-control" required="required" onChange="">
										<option value="0">Seleccione un usuario para ver los clientes</option>
										
									</select>
									</div>

								</div>
								<div class="form-group">
									<label>Fecha de Inicio:</label>
									<input type="datetime-local" id="from" name="from" class="form-control" placeholder="Enter text" >
								</div>

								<div class="form-group">
									<label>Fecha Finalizacion:</label>
									<input type="datetime-local" name="to" id="to" class="form-control" placeholder="Enter text" >
									<!--<p class="form-control-static">email@example.com</p>-->
								</div>
								<div class="form-group">
									<label for="tipo">Tipo de evento:</label>
									<select class="form-control" name="class" id="tipo">
										<!--ESTE ES EL EVENTO COLOR ROJO<option value="event-important">Muy importantante</option>-->
										<option value="event-important">Muy importantante</option>
									</select>
								</div>
								<div class="form-group">
									<label>Tutilo de la tarea:</label>
									<input type="text" required autocomplete="off" name="title" class="form-control" id="title" placeholder="Introduce un título">
									<p class="help-block">Este titulo es el encabezado de la tarea.</p>
								</div>

								<div class="form-group">
									<label>Descripcion de la tarea:</label>
									<textarea class="form-control" id="body" name="event" rows="3" required></textarea>
								</div>
								<div class="form-group">
									<div id="response"></div>
									<input type="button" class="btn btn-primary" id="btn_agregar" value="Agregar una nueva tarea" onClick="addTarea();">

								</div>
							</div>
						</div>	
					</form>	

				</div>
			</div>
		</section>
	</div>

</body>
</html>