<?php
session_start();
//validar si el usuario se Logeo, de lo contrario no lo deje ingresar
if(!$_SESSION)
{
	//header("location:../ingreso.php");
	echo "<script>location.href='../../../ingreso.php'</script>";
}
/////CODIGO ERROR_REPORTING(0) EVITA TODOS LOS MENSAJES DE ERROR, EL CODIGO DE ABAJO MUESTRA
///// TODOS LOS MENSAJES DE ERROR MENOS LOS QUE NOTICIA, QUE SON CUANDO LAS VARIABLES ESTAN VACIAS.
error_reporting(E_ALL ^ E_NOTICE);
//////////////////CONEXION BD/////////////
require '../model/consulClientesModel.php';
/////////////////VARIABLES DE SESION////////////////


?>
<!DOCTYPE html>
<html>
<head>
	
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" href="../img/logo.png">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700italic,100italic,300' rel='stylesheet' type='text/css'>
	<title>Dashboard | Clientes</title>

	<!-- Bootstrap Core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../css/sb-admin.css" rel="stylesheet">

	<!-- Morris Charts CSS -->
	<link href="../css/plugins/morris.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>

	<link rel="stylesheet" href="../css/main.css">

	<script src="../js/custom.js"></script>
	<!--
	<script type="text/javascript" src="../../js/tablepagination.js"></script>

	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/jquery-1.12.3.min.js">

	<script type="text/javascript" src="../../DataTables/media/js/jquery.dataTables.js"></script>
	<script type="stylesheet" src="../../DataTables/media/js/dataTables.bootstrap.js"></script>
	<link rel="stylesheet" href="../../DataTables/media/css/dataTables.bootstrap.css">-->
	
	

	
	
	</script>

	
</head>
<body onload="">
	
	<header>
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
		            <a class="navbar-brand" href="index.html">Duwest Colombia | Administrador</a>
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

		            <input type="hidden" id="nom_usuario" value="<?php echo $usu?>">
		            
		            <!-- SECCION DEL USUARIO -->
		            <li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $usu?><b class="caret"></b></a>
		                <ul class="dropdown-menu">
		                    <li>
		                        <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
		                    </li>
		                    <li>
		                        <a href="#"><i class="fa fa-fw fa-envelope"></i> Bandeja Entrada</a>
		                    </li>
		                    <li>
		                        <a href="../cambiarpass.php"><i class="fa fa-fw fa-gear"></i> Cambiar Contraseña</a>
		                    </li>
		                    
		                    <li class="divider"></li>
		                    <li>
		                        <a href="../controller/cerrarsesion.php"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesion</a>
		                    </li>
		                </ul>
		            </li>
		        </ul>
		        <!-- FIN SECCION DEL USUARIO -->

		        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
		        <div class="collapse navbar-collapse navbar-ex1-collapse">
		            <ul class="nav navbar-nav side-nav">
		                <li >
		                    <a href="../index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
		                </li>
		                <?php  
	                        if ($_SESSION['tipusuario_sesion']==0) {
	                    	?>
		                <li class="active">

		                    <a href="consulClientesView.php" ><i class="fa fa-users" ></i> Clientes</a>
		                </li>
		                <li>
		                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Usuarios</a>
		                </li>
		               <?php 
		               		}
		                ?>

		                <li >
		                    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Reportes <i class="fa fa-fw fa-caret-down"></i></a>
		                    <ul id="demo" class="collapse">
		                        <li id="">
		                            <a href="repVisitaView.php">Reporte de visitas</a>
		                        </li>
		                        <li>
		                            <a href="repProgramacionView.php">Reporte programacion semanal</a>
		                        </li>
		                        <li>
		                            <a href="#">Reporte planes de negocio</a>
		                        </li>
		                        <li>
		                            <a href="#">Reporte uso de la plataforma</a>
		                        </li>

		                    </ul>
		                </li>
		                <li>
		                    <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-area-chart"></i> Graficos <i class="fa fa-fw fa-caret-down"></i></a>
		                    <ul id="demo2" class="collapse">
		                        <li id="">
		                            <a href="grafUsoPlataforma.php">Uso de la plataforma</a>
		                        </li>
		                        <li>
		                            <a href="#">Grafico de cuadrantes</a>
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
							Reporte Programacion de Visitas
						</h1>
						<ol class="breadcrumb">
							<li>
								<i class="fa fa-dashboard"></i>  <a href="../index.php">Dashboard</a>
							</li>
							<li class="active">
								<i class="fa fa-users"></i> Clientes
							</li>

						</ol>
					</div>
				</div>

			<div class="table-responsive" id="div1">
				<table class="table table-striped table-bordered table-condensed display" id="tabcliente" cellspacing="0" width="100%">
					<?php 
						$num=mysqli_num_rows($consulclientes);
						echo 'Se encontraron '. $num . ' clientes';
					 ?>
					<thead class="">	
						<tr>
							<th>Id Cliente</th>
							<th>Nombre Cliente</th>
							<th>Tipo Cliente</th>
							<th>Accion</th>

						</tr>
					</thead>
					<tbody class="">		
						<?php 
						while ($resulcliente = $consulclientes ->fetch_array(MYSQLI_BOTH))
						{

							echo'<tbody>
							<tr>
							<td>'.$resulcliente['id_cliente'].'</td>
							<td>'.utf8_encode($resulcliente['nom_cliente']).'</td>
							<td>'.$resulcliente['tipo_cliente'].'</td>
							<td><a href="../model/modifClienteModel.php?id_cliente='.$resulcliente['id_cliente'].'" class="btn btn-warning">Editar</a>
								<a href="../model/eliminarClienteModel.php?id_cliente='.$resulcliente['id_cliente'].'" class="btn btn-danger">Eliminar</a>
							</td>
							</tr>
							</tbody>';

						}

						?>
						
					
					</tbody>
				</table>
			</div>
	
	
		<!-- /boton que llama ventana modal -->
				<button class="btn btn-primary" data-toggle="modal" data-target="#editusuario" >Agregar Cliente</button>
				<!-- /los 3 div son la estructura de la ventana modal -->
				<div class="modal fade" id="editusuario" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<!-- /encabezado ventana modal -->
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4>Datos del Cliente</h4>
							</div>
							<!-- /cuerpo ventana modal -->
							<div class="modal-body">
								
									<?php
											echo '
											<form action="../../php/agregarcliente.php" method="POST">
											<div class="form-group">
											<label for="idcliente">Identificacion del cliente</label>
											<input type="text" name="txtidcliente" required="required" class="form-control" placeholder="12345" value=""/>
											</div>
											<div class="form-group">
											<label for="nomcliente">Nombre Cliente</label>
											<input type="text" name="txtnomcliente" required="required" class="form-control" value=""/>
											</div>
											<div class="form-group">
											<label for="tipcliente">Tipo de Cliente</label>
											<select name="lst_tipcliente" class="form-control boton">
												<option value=""></option>
												<option value="Distribuidor">Distribuidor</option>
												<option value="Agricultor">Agricultor</option>
											</select>
											</div>
											<div class="form-group">
											
											';
											?>
											<label for="tipcultivo">Division a la que pertenece</label>
											<select name="lst_division" class="form-control boton" onchange="">
												<option value=""></option>
												<option value="Periferia">Periferia</option>
												<option value="Flores">Flores</option>
											</select>
											<label for="tipclientes">Asociar un usuario</label>
											<select name="lst_usuario" class="form-control boton" onchange="">
												<option value=""></option>
												<?php 												
												foreach ($consulusuarios as $value) {?>
												<option value="<?php echo $value['id_usuario'];?>"><?php echo $value['id_usuario'];?></option>
												<?php
											}

											?>
											</select>

											<label for="tipcultivo">Asociar un cultivo</label>
											<select name="lst_cultivo" class="form-control boton" onchange="">
												<option value=""></option>
												<?php 
												
												foreach ($consulcultivo as $value) {?>
												<option value="<?php echo $value['id_cultivo'];?>"><?php echo $value['nom_cultivo'];?></option>
												<?php
											}

											?>
											</select>
											<label for="numhect">Numero de hectareas en este cultivo</label>
											<input type="number" name="txtnumhect" required="required" class="form-control" placeholder="0" value=""/>


											
											<label for="tipzona">Asociar un Departamento</label>
											
											<select name="lst_zona" class="form-control boton" onchange="mostrarValor(this.options[this.selectedIndex].innerHTML);">
												<option value=""></option>
												<?php 


												foreach ($consulzona as $value) {?>
												<option value="<?php echo $value['id_zona'];?>"><?php echo $value['nom_zona'];?></option>

												<?php
											}

											?>
										</select>

										<!-- Este es el codigo que recoge el nombre del cliente seleccionado -->
										<input type="hidden" name="ususelect" id="ususelect" value="" />

										<script type="text/javascript">
										var mostrarValor = function(x){
											document.getElementById('ususelect').value=x;
										}

										</script>
										<!-- Aqui termina el codigo de recolectar el cliente -->
										<br>
											<label for="tipmunicipio">Asociar un Municipio</label>
											<select name="lst_municipio" class="form-control boton" onchange="">
												<option value=""></option>
												<?php foreach ($consulmunicipio as $value) {?>
												<option value="<?php echo $value['id_municipio'];?>"><?php echo $value['nom_municipio'];?></option>	
												<?php
												}

												?>
												
											</select>

											</div>
												
												<button tyrpe="submit" class="btn btn-success">Agregar</button>
											</form>

							<!-- /Pie de Pagina ventana modal -->	
							<div class="modal-footer">
								<button tyrpe="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
																

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- jQuery -->
	<script src="../js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>


</body>
</html>	