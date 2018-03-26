<?php
session_start();
/////CODIGO ERROR_REPORTING(0) EVITA TODOS LOS MENSAJES DE ERROR, EL CODIGO DE ABAJO MUESTRA
///// TODOS LOS MENSAJES DE ERROR MENOS LOS QUE NOTICIA, QUE SON CUANDO LAS VARIABLES ESTAN VACIAS.
error_reporting(E_ALL ^ E_NOTICE);

require '../controller/conexionbd.php';
$usu=$_SESSION['usuario_sesion'];
$res=$db->query("SELECT * FROM usuario where id_usuario='$usu'")or die($db->error);

if(!$_SESSION)
{
	//header("location:../ingreso.php");
	echo "<script>location.href='../../../ingreso.php'</script>";
}
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
	<title>Dashboard | Perfil</title>

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

	<script type="text/javascript" src="../js/consultas.js"></script>

	
	
</head>
<body >
	

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
		            	<li class="active">
		            	    <a href="../index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
		            	</li>
		            	 
		            	
		            	<li>
		            	    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-files-o" aria-hidden="true"></i> Reportes <i class="fa fa-fw fa-caret-down"></i></a>
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

		            	<?php  
		            	    if ($_SESSION['tipusuario_sesion']==0) {
		            	?>
		            	<li>
		            	    <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-cogs" aria-hidden="true"></i> Ajustes <i class="fa fa-fw fa-caret-down"></i></a>
		            	    <ul id="demo3" class="collapse">
		            	        <li id="">
		            	            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Usuarios</a>
		            	        </li>
		            	        <li>
		            	            <a href="consulClientesView.php" ><i class="fa fa-users" ></i> Clientes</a>
		            	        </li>


		            	    </ul>
		            	</li>
		            	<?php 
		            	}
		            	?>
		            	<?php  
		            	    if ($_SESSION['tipusuario_sesion']==0) {
		            	?>
		            	<li>
		            	    <a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-database" aria-hidden="true"></i> Base de datos <i class="fa fa-fw fa-caret-down"></i></a>
		            	    <ul id="demo4" class="collapse">
		            	        <li>
		            	            <a href="cargarCSV.php" ><i class="fa fa-cloud-upload" aria-hidden="true" ></i> Carga Masiva</a>
		            	        </li>


		            	    </ul>
		            	</li>
		            	<?php 
		            	}
		            	?>

		            </ul>

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
						Información de peril
					</h1>
					<ol class="breadcrumb">
						<li>
							<i class="fa fa-dashboard"></i>  <a href="dashboard/index.php">Dashboard</a>
						</li>
						<li class="active">
							<i class="fa fa-fw fa-user"></i> Perfil
						</li>

					</ol>
				</div>
			</div>
			<!-- /.row -->

			<?php 
				while ($r=$res->fetch_assoc()) {
					echo' <div class="">
							<div class="jumbotron">
								<h1>Información de su perfil</h1>
								<p>Puede actualizarla informacion contenida en esta pantalla.</p>
								<div class="row">
									<div class="col-xs-6 col-md-4"><strong>Nombre de usuario:</strong></div>
									<div class="col-xs-6 col-md-4"><input type="text" class="form-control" value="'.$r['nom_usuario'].'"></div>
									
								</div>
								<div class="row">
									<div class="col-xs-6 col-md-4"><strong>Email:</strong></div>
									<div class="col-xs-6 col-md-4"><input type="text" class="form-control" value="'.$r['email_usuario'].'"></div>
								</div>	
								<div class="row">
									<div class="col-xs-6 col-md-4"></div>
									<div class="col-xs-6 col-md-4"><input type="button" class="btn btn-success" value="Actualizar"></div>
								</div>
						</div>
						';
				}
			 ?>
				

	</section>

	<!-- jQuery -->
	<script src="../js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>


</div>
</body>
</html>			