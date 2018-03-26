<?php 
session_start();
if(!$_SESSION)
{
	//header("location:../ingreso.php");
	echo "<script>location.href='../ingreso.php'</script>";
}
$usuactivo=$_SESSION['usuario_sesion'];
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/main.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700italic,100italic,300' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/validaPass.js"></script>
	<script src="../js/custom.js"></script>
	<script type="text/javascript" src="../js/consulclientajax.js"></script>
	<link rel="icon" type="image/png" href="../img/logo.png">
	<title>Ingreso | Duwest</title>
	</head>
<body>
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
							<li class="active"><a href="../user/repvisitas.php">Reporte Visitas<span class="sr-only">(current)</span></a></li>
							<li><a href="../calendar/index.php">Reporte Programacion Semanal</a></li>
							<li><a href="../user/actualizarcliente.php">Actualizar Cliente</a></li>
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
									<li><a href="cambiarpass.php">Cambiar Contraseña</a></li>
									
									<li role="separator" class="divider"></li>


									<li><a href="cerrarsesion.php">Cerrar Sesion</a></li>
								</ul>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</header>
		<!-- aqui termina el menu -->
	<section>
		<div class="text-center espacio-arriba">

			<div class="col-md-4 inline-block">
				<!--AQUI MUESTRA MENSAJE DESPUES DE VALIDACION PASSWORD-->
				<div id="mensajealerta"></div>
				<!--aqui termina el mensaje-->
				<div class="panel panel-success">
					<div class="panel-heading">
						<h1 class="panel-title">Cambiar contraseña de Usuario</h1>
					</div>	
					<div class="panel-body">
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