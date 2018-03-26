<?php 
session_start();
if(!$_SESSION)
{
	header("location:../ingreso.php");
}
require '../php/conexionbd.php';

$usu=$_SESSION['usuario_sesion'];

/*echo '<div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->';*/



?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="../img/logo.png">
	<title>Cambiar Contraseña</title>
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
	<script type="text/javascript" src="../js/validaPass.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			document.getElementById("btn_update").disabled=true;
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
								 Cambiar Contraseña
							</h1>
							<ol class="breadcrumb">
								<li>
									<i class="fa fa-dashboard"></i>  <a href="dashboard/index.php">Dashboard</a>
								</li>
								<li class="active">
									<i class="fa fa-edit"></i> Cambiar Contraseña
								</li>
							</ol>
						</div>
					</div>
					<!-- /.row -->
					
					<div class="row">
						<div class="panel panel-success">

							<div class="panel-heading">
								<h1 class="panel-title">Cambiar contraseña de Usuario</h1>
							</div>		
							<div class="panel-body">
								<!--AQUI MUESTRA MENSAJE DESPUES DE VALIDACION PASSWORD-->
								<div id="mensajealerta"></div>
								<!--aqui termina el mensaje-->
								<form method="post" style="margin-top:1.5em;" id="frm_cambiarpass">
									<label for="Usuario">Nombre Usuario</label>
									<div data-tip="ingrese su usuario">
										<input type="text" name="txtidusuario" id="txtidusuario" value="<?php echo $_SESSION['usuario_sesion']; ?>" readonly="readonly" class="form-control"/><br/>
									</div>

									<label for="pass">Nueva Contraseña</label>
									<input type="password" name="txtpass" id="txtpass" placeholder="Password" required="required" class="form-control" onkeyup="validapass();"/><br/>
									<label for="pass">Repita la Contraseña</label>
									<input type="password" name="txtpass2"  id="txtpass2" placeholder="Confirme su Password" required="required" class="form-control" onkeyup="validapass();"/><br/>
									<input type="button" value="Modificar Contraseña" class="btn btn-primary" id="btn_update" onclick="actualizapass();"/>
								</form>
							</div>
						</div>

					</div>


				</div>
			</div>
		</section>
	</div>

</body>
</html>