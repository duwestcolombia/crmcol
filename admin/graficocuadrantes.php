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


$usuconsulta=$_POST['lst_usuario'];
$finicio=$_POST['fecha_inicio'];
$ffin=$_POST['fecha_fin'];
$inormal=date('d-m-y',strtotime($finicio));
$ifinal=date('d-m-y',strtotime($ffin));
//echo '<script>alert("Usuario seleccionado : '.date('d-m-y',strtotime($finicio)).'")</script>';

////////////////////CONSULTAS PARA TABLA Y PARA COMBOBOX////////////////////////
switch ($rol) {
	case 1:
	///////////////PRUEBA DE BOTON BUSCAR TODO/////////////////////////
	

	$resultadousuario=$db->query("SELECT * FROM usuario WHERE id_usuario<>'$usu' and id_rol<>'2'") or die($db->error);

		//echo '<script>alert("Usuario seleccionado : '.$usuconsulta.'")</script>';
	
	break;
	case 2:

	$resultadousuario=$db->query("SELECT * FROM usuario WHERE id_zona='$zon' and id_usuario<>'$usu'") or die($db->error);
	break;
	case 3:

	$resultadousuario=$db->query("SELECT * FROM usuario WHERE id_zona>='2'and id_zona<='3' and id_usuario<>'$usu' and sector_usuario<>'Flores'") or die($db->error);
	break;
	case 4:

	$resultadousuario=$db->query("SELECT * FROM usuario WHERE id_zona>='1'and id_zona<='3' and id_usuario<>'$usu' and sector_usuario<>'Periferia'") or die($db->error);
	break;
	case 5:

	$resultadousuario=$db->query("SELECT * FROM usuario WHERE id_zona>='5'and id_zona<='7' and id_usuario<>'$usu'") or die($db->error);
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
	<link rel="stylesheet" href="../css/main.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700italic,100italic,300' rel='stylesheet' type='text/css'>
	
	<!-- Bootstrap Core CSS -->
	<link href="dashboard/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="dashboard/css/sb-admin.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="dashboard/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="../js/admin/cargagraficocuadrantes.js"></script>

	<!-- Librerias del grafico -->

	<script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

	<script src="../js/custom.js"></script>
	

	<title>Ventas Duwest</title>
	
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
								<a href="#"><i class="fa fa-fw fa-gear"></i> Ajustes</a>
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
						<li >
							<a href="rprogramacion.php"><i class="fa fa-fw fa-bar-chart-o"></i> Reporte de programacion semanal</a>
						</li>

						<li>
							<a href="frm_nuevatarea.php"><i class="fa fa-fw fa-edit"></i> Agregar Tarea</a>
						</li>
						<li class="active">
						    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Portafolio de Clientes <i class="fa fa-fw fa-caret-down"></i></a>
						    <ul id="demo" class="collapse">
						        <li class="active" id="btn_grafcuadrante">
						            <a href="graficocuadrantes.php" >Grafico de Cuadrantes</a>
						        </li>
						        <li>
						            <a href="#">Planes de Negocio</a>
						        </li>
						    </ul>
						</li>
		            <!--<li>
		                <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tablas</a>
		            </li>
		            <li>
		                <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
		            </li>
		            <li>
		                <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
		            </li>
		            <li>
		                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
		                <ul id="demo" class="collapse">
		                    <li>
		                        <a href="#">Dropdown Item</a>
		                    </li>
		                    <li>
		                        <a href="#">Dropdown Item</a>
		                    </li>
		                </ul>
		            </li>
		            <li>
		                <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
		            </li>
		            <li>
		                <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
		            </li>-->
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
								Grafico de cuadrantes
							</h1>
							<ol class="breadcrumb">
								<li>
									<i class="fa fa-dashboard"></i>  <a href="dashboard/index.php">Dashboard</a>
								</li>
								<li class="active">
									<i class="fa fa-fw fa-caret-down"></i>  Portafolio de clientes
								</li>
								<li class="active">
									<i class="fa fa-edit"></i> Reporte programacion de Visitas
								</li>
							</ol>
						</div>
					</div>
					<!-- /.row -->

					<form>
						<div class="panel panel-primary">
							<div class="panel-heading">
								<strong>
									<h4>Filtro de Busqueda</h4>
								</strong>
								<span>Los campos de usuario, fecha de inicio y fecha de fin son obligatorios. Por favor llenar estos campos y pulsar sobre el boton Buscar.</span>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-xs-6 col-md-3">
										<label for="exampleInputName2">Elegir Usuario:</label>
										<select name="lst_usuario" id="lst_usuario" class="form-control" required="required">
											<option value="0"></option>
											<?php
											while ($resulusuario = $resultadousuario ->fetch_array(MYSQLI_BOTH))
												echo '<option value="'.$resulusuario['id_usuario'].'">'.utf8_encode($resulusuario['nom_usuario']).'</option>';
											?>


										</select>
										<input type="button" class="btn btn-success" value="Buscar" onClick="graficar();">
									</div>
								</div>
							</div>	
						</form>


					<div id="container" style="height: 600px; min-width: 310px; max-width: 800px; margin: 0 auto"></div>

				</div>	
			</div>	


		</section>

	</body>

</html>