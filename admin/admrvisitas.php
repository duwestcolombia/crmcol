<?php
session_start();
//validar si el usuario se Logeo, de lo contrario no lo deje ingresar
if(!$_SESSION)
{
	header("location:../ingreso.php");
}
/////CODIGO ERROR_REPORTING(0) EVITA TODOS LOS MENSAJES DE ERROR, EL CODIGO DE ABAJO MUESTRA
///// TODOS LOS MENSAJES DE ERROR MENOS LOS QUE NOTICIA, QUE SON CUANDO LAS VARIABLES ESTAN VACIAS.
//error_reporting(E_ALL ^ E_NOTICE);
//////////////////CONEXION BD/////////////

require '../php/conexionbd.php';
/////////////////VARIABLES DE SESION////////////////

$usu=$_SESSION['usuario_sesion'];
$rol=$_SESSION['tipusuario_sesion'];
$zon=$_SESSION['zona_sesion'];
var_dump($usu);

////////////////////CONSULTAS PARA TABLA Y PARA COMBOBOX////////////////////////
// 	switch ($rol) {
// 	case 1:

// 	$resultadousuario=$db->query("SELECT * FROM usuario WHERE id_usuario<>'$usu' and id_rol<>'2' ORDER BY nom_usuario ASC") or die($db->error);

// 	break;
// 	case 2:
// 	//Consulta para los lideres con 1 Zona

// 	$resultadousuario=$db->query("SELECT * FROM usuario WHERE id_zona='$zon' and id_usuario<>'$usu' and sector_usuario<>'Administrador' and sector_usuario<>'Flores' ORDER BY nom_usuario ASC") or die($db->error);
// 	break;
// 	case 3:
// 	//Consulta para el lider Periferia cundinamarca y Periferia Boyaca.

// 	$resultadousuario=$db->query("SELECT * FROM usuario WHERE id_zona>='2'and id_zona<='3' and id_usuario<>'$usu' and sector_usuario<>'Flores' ORDER BY nom_usuario ASC") or die($db->error);
// 	break;
// 	case 4:
// 	//Consulta Para el Lider de Flores Sabana y flores Antioquia.

// 	$resultadousuario=$db->query("SELECT * FROM usuario WHERE id_zona>='1'and id_zona<='3' and id_usuario<>'$usu' and sector_usuario<>'Periferia' ORDER BY nom_usuario ASC") or die($db->error);
// 	break;
// 	case 5:
// 		//Consulta Para el Lider de Nariño, Cauca y Huila.

// 	$resultadousuario=$db->query("SELECT * FROM usuario WHERE id_zona>='5'and id_zona<='7' and id_usuario<>'$usu' ORDER BY nom_usuario ASC") or die($db->error);
// 	break;
// }

	$resultadousuario = $db->query("SELECT * FROM usuario WHERE jefe_usuario='$usu'") or die($db->error);


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
	<script type="text/javascript" src="../js/pushNotification/push.min.js"></script>
	<script type="text/javascript" src="../js/admin/cargareportevisitas.js"></script>
	<!--
	<script type="text/javascript" src="../DataTables/media/js/jquery.js"></script>
	-->
	<script type="text/javascript">
	$(document).ready(function(){
		Push.create("Novedad Reporte de Visitas!", {
		    body: "Ahora puedes exportar los registros a Excel.",
		    icon: '../img/logo.png',
		    timeout: 4000,
		    onClick: function () {
		       	document.getElementById("btn_exportar").focus();
		        this.close();
		    }
		});
	});

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
					<li class="active">

						<a href="admrvisitas.php" ><i class="fa fa-fw fa-bar-chart-o" ></i> Reporte de Visitas</a>
					</li>
					<li>
						<a href="rprogramacion.php"><i class="fa fa-fw fa-bar-chart-o"></i> Reporte de programacion semanal</a>
					</li>

					<li>
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

	<section class=" ">
		<div id="page-wrapper">

			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">
							Reporte de Visitas
						</h1>
						<ol class="breadcrumb">
							<li>
								<i class="fa fa-dashboard"></i>  <a href="dashboard/index.php">Dashboard</a>
							</li>
							<li class="active">
								<i class="fa fa-edit"></i> Reporte de Visitas
							</li>
						</ol>
					</div>
				</div>
				<!-- /.row -->


				<form name="frm_consulta" method="post" action="exportar/excelrvisitas.php" class="form-inline ">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<strong>
								<h4>Filtro de Busqueda</h4>
							</strong>
							<span>Los campos de usuario, fecha de inicio y fecha de fin son obligatorios. Por favor llenar estos campos y pulsar sobre el boton Buscar.</span>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-xs-6 col-md-4">
									
										<label for="exampleInputName2">Elegir Usuario:</label>
										<select name="lst_usuario" id="lst_usuario" class="form-control" required="required">
											<option value="todos">Todos</option>
											<?php
											while ($resulusuario = $resultadousuario ->fetch_array(MYSQLI_BOTH)){
												echo '<option value="'.$resulusuario['id_usuario'].'">'.utf8_encode($resulusuario['nom_usuario']).'</option>';
											}

											?>
										</select>
									
								</div>
								<div class="col-xs-6 col-md-4">
									<label for="exampleInputName2">Fecha de Inicio:</label><br>
									<input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required="required" >
								</div>

								<div class="col-xs-6 col-md-4">
									<label for="exampleInputEmail2">Fecha de Fin:</label><br>
									<input type="date" name="fecha_fin" id="fecha_fin" class="form-control" required="required">
								</div>
							</div>
							
						</div>
						
						<input type="button" name="btn_buscar" id="btn_buscar" class="btn btn-success" value="Buscar" onclick="cargarReporteVisita();">
						<!--<input type="button" name="exportar" id="btn_exportarExcel" class="btn btn-warning" value="Exportar a Excel" onclick="exportarExcel();">-->
						<button type="submir" id="btn_exportar" class="btn btn-warning">Exportar a Excel</button>
					</div>
				</form>
				<br>
				<!-- Aqui empieza la tabala -->
				<div class="panel panel-success">
					<div class="panel-body">
						<div class="table-responsive">

							<div id="tabla_repvisita" name="tabla_repvisita"></div>

						</div>
					</div>
				</div>
				<?php 
				echo '<input type="hidden" id="txt_rol" value="'.$rol.'">';
				?>


			</section>

		</div>
	</div> 
	

</div>
<!-- /#wrapper -->	



</body>
</html>			