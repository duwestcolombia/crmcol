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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<!--<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<!--<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>-->
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

	<link href='https://fonts.googleapis.com/css?family=Lato:400,700italic,100italic,300' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="../css/main.css">

	<link rel="stylesheet" type="text/css" href="../DataTables/media/css/dataTables.bootstrap.css">

	<!-- JS DE DATATABLES -->
	<script type="text/javascript" src="../DataTables/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="../DataTables/media/js/dataTables.bootstrap.js"></script>

	<script src="../js/custom.js"></script>
	<script type="text/javascript" src="../js/admin/validaPlanNegocio.js"></script>
	
	<!-- Bootstrap Core CSS -->
	<link href="dashboard/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="dashboard/css/sb-admin.css" rel="stylesheet">

	<!-- Custom Fonts -->

	<link href="dashboard/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<link rel="icon" type="image/png" href="../img/logo.png">
	<!--
	<script type="text/javascript" src="../js/exportPdf.js"></script>
	<script type="text/javascript" src="../js/jsPdf.js"></script>

	-->
	<title>Vista plan negocio</title>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#tab_planNegocio').DataTable();


		} );

	</script>
</head>
<body>
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

						<li>
							<a href="frm_nuevatarea.php"><i class="fa fa-fw fa-edit"></i> Agregar Tarea</a>
						</li>
						<li class="active">
						    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-suitcase"></i> Portafolio de Clientes <i class="fa fa-fw fa-caret-down"></i></a>
						    <ul id="demo" class="collapse">
						        <li id="graf">
						            <a href="graficocuadrantes.php">Grafico de Cuadrantes</a>
						        </li>
						        <li class="active">
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
								Planes de Negocio
							</h1>
							<ol class="breadcrumb">
								<li>
									<i class="fa fa-dashboard"></i>  <a href="../../admin/dashboard/index.php">Dashboard</a>
								</li>
								<li class="active">
									<i class="fa fa-suitcase"></i> Portafolio de Clientes
								</li>
								<li class="active">
									<i class="fa fa-edit"></i> Planes de Negocio
								</li>
							</ol>
						</div>
					</div>
					<!-- /.row -->

					<!-- CONTENIDO -->

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
											<select name="lst_usuario" id="lst_usuario" class="form-control" required="required" onchange="cargaClientes();">
												<option value="todos">Todos</option>
												<?php
												while ($resulusuario = $resultadousuario ->fetch_array(MYSQLI_BOTH)){
													echo '<option value="'.$resulusuario['id_usuario'].'">'.utf8_encode($resulusuario['nom_usuario']).'</option>';
												}

												?>
											</select>
										
									</div>
									<div class="col-xs-6 col-md-4">
											<label for="lbl_cliente">Clientes:</label>
											<div id="lista_cliente" name="lista_cliente">
											<select name="lst_cliente" id="lst_cliente" class="form-control" required="required" onChange="cargaAnios();">
												<option value="0">Seleccione un usuario para ver los clientes</option>
												
											</select>
											</div>
										
									</div>

									<div class="col-xs-6 col-md-4">
										<label>Multiples registros:</label>
											<div class="radio">
												<label>
													<input type="radio" class="" id="radio1" value="allClient"  > Todos los clientes
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" class="" id="radio2" value="allUser" > Seleccionar cliente	
												</label>
											</div>
															
									</div>

									<script type="text/javascript">
									$("#radio1").on('click',function(){
										$("#radio2").attr('checked',false);
										$("#lst_cliente").attr('disabled', true);
										$("#lst_consulcliente").attr('disabled', true);
										/*var v=document.getElementById("radio1").value;
										alert(v);*/
									});
									$("#radio2").on('click',function(){
										$("#radio1").attr('checked',false);
										$("#lst_cliente").attr('disabled', false);
										$("#lst_consulcliente").attr('disabled', false);
										/*var v=document.getElementById("radio2").value;
										alert(v);*/
									});

									</script>
									<!--
									<div class="col-xs-6 col-md-3">
										<label for="exampleInputName2">Año inicio del plan de negocios</label>
										<div id="lista_anioini" name="lista_anioini">
										<select name="lst_anioini" id="lst_anioini" class="form-control" required="required" onChange="">
											<option value="0">Seleccione un cliente para cargar este valor</option>
											
										</select>
										</div>
									</div>

									<div class="col-xs-6 col-md-3">
										<label for="exampleInputName2">Año fin del plan de negocios</label>
										<div id="lista_aniofin" name="lista_aniofin">
										<select name="lst_aniofin" id="lst_aniofin" class="form-control" required="required" onChange="">
											<option value="0">Seleccione un usuario para ver los clientes</option>
											
										</select>
										</div>
									</div>-->
									<!--
									<div class="col-xs-6 col-md-3">
										<label for="exampleInputName2">Cultivo</label>
										<div id="lista_aniofin" name="lista_aniofin">
										<select name="lst_aniofin" id="lst_aniofin" class="form-control" required="required" onChange="">
											<option value="0">Seleccione un usuario para ver los clientes</option>
											
										</select>
										</div>
									</div>
									-->
								</div>
								<br>
								<input type="button" name="btn_buscar" id="btn_buscar" class="btn btn-success" value="Buscar" onclick="cargaTabPlanNegocio();">
								<input type="submit" name="exportar" class="btn btn-warning" value="Exportar a Excel"/>

							</div>
						</div>
			
					<br>
					<!-- Aqui empieza la tabala -->
					<div class="panel panel-success">
						<div class="panel-body">
							<div class="table-responsive">

								<div id="tabla_planNegocios" name="tabla_planNegocios"></div>

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
</div>

</body>
</html>