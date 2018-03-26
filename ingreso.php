<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">

	<link href='https://fonts.googleapis.com/css?family=Lato:400,700italic,100italic,300' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
	<link rel="icon" type="image/png" href="img/logo.png">


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
						<li><a href="index.html">Inicio<span class="sr-only">(current)</span></a></li>
						<li class="active"><a href="ingreso.php">Ingresar</a></li>
						
					</ul>
					
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</header>

	<section class="">
		<div class="text-center espacio-arriba">

			<div class="col-md-4 inline-block">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h1 class="panel-title">Datos de Ingreso al Sistema</h1>
					</div>	
					<div class="panel-body">
						<form action="php/validar.php" method="post" style="margin-top:1.5em;">
							<label for="Usuario">Nombre Usuario</label>
							<div data-tip="ingrese su usuario">
								<input type="text" name="txtidusuario" placeholder="Nombre de Usuario" required="required" class="form-control"/><br/>
							</div>

							<label for="pass">Digite su Contraseña</label>
							<input type="password" name="txtpass" placeholder="Password" required="required" class="form-control"/><br/>
							<input type="submit" value="Iniciar Sesion" class="btn btn-success btn-lg btn-block"/>
						</form>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- -->
	<footer class="pie-pagina">
		<strong>

			<div class="col-md-4 ">
				<h3>Acerca de Nosotros </h3>
				<p><a href="http://www.duwest.com/es/inicio" class="link-footer">Nuestro Corporativo</a></p>
				<p><a href="http://www.duwest.com/es/somos" class="link-footer">Quienes Somos</a></p>
				<p><a href="acercade.html" class="link-footer">Manual de uso</a></p>
	            <!--<p>Autopista Medellin Km 2 parque empesarial</p>
	            <p>Oikos - La florida, Bodega 5, 6 y 7</p>
	            <p>Diseñado por: David Zambrano</p>-->

	        </div>
	 		
	        <div class="col-md-4 text-center">

	        	<img src="img/duwestfooter.png" height="100" alt="logo duwest">
	        	
	        	<p>©2016. Duwest Colombia Todos los Derechos reservados.</p>

	        </div>
			
	        <div class="col-md-4 text-right">
	        	<h3>PBX: (57) 1 898 5064 </h3>
	        	<h5>Autopista Medellin Km 2 Parque Oikos La florida Bodega 5</h5>
	        	<h5><a href="mailto:servicioalcliente@duwest.com" class="link-verde">servicioalcliente@duwest.com</a></h5>
	        	<!--<ul class="">
	        		<li class="no-lista">Ayuda</li>
	        		<li></li>
	        	</ul>-->

	        </div>

	    </strong>
	</footer> 	

</body>
</html>