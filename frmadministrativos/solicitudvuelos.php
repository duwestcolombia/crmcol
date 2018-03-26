<?php
//session_start();

	//validar si el usuario se Logeo, de lo contrario no lo deje ingresar
/*if(!$_SESSION)
{
	header("location:ingreso.php");
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
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<title>Ventas Duwest - Solicitud Tiquetes</title>
</head>
<body onload="nobackbutton();">
	
	 <!-- Aqui empieza el menu -->
	<section>
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
	                    <li class="active"><a href="repvisitas.php">Reporte Visitas<span class="sr-only">(current)</span></a></li>
	                    <li><a href="calendar/index.php">Reporte Programacion Semanal</a></li>
	                    <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Utilitarios <span class="caret"></span></a>
	                        <ul class="dropdown-menu">
	                            <li><a href="#">Solicitud de tiquetes</a></li>
	                            <li role="separator" class="divider"></li>
	                            <li><a href="php/cerrarsesion.php">Cerrar Sesion</a></li>
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
	</section>
	 <!-- aqui termina el menu -->

	<br>

	<section>
		<div class="text-center">
			<h1 class="grande">Solicitud de tiquetes</h1>
			<nav>
				

				<div class="col-md-3 inline-block ibody">
					<div class="col-md-3 inline-block ibodybanda">
						<h4>Datos Personales</h4>
					</div>
					<form action="php/regvisita.php" method="post" style="margin-top:1.5em;">

						<label for="id">Identificacion</label>
						<input type="text" name="txtid" required="required" class="form-control" autofocus value=""> 

						<label for="nom">Nombre</label>
						<input type="text" name="txtnombre" required="required" class="form-control" autofocus value=""> 

						<label for="fnacimiento">Fecha de Nacimiento</label>
						<input type="text" name="txtfnacimiento" required="required" class="form-control" autofocus value=""> 

						<label for="tel">Telefono</label>
						<input type="text" name="txttelefono" required="required" class="form-control" autofocus value="">

						<label for="npasaporte"># Pasaporte</label>
						<input type="text" name="txtnpasaporte" required="required" class="form-control" autofocus value="">

						<label for="objviaje">Objetivo del viaje</label>
						<input type="text" name="txtobjviaje" required="required" class="form-control" autofocus value="">
						<br>
						<div class="col-md-3 inline-block se-beige ibodybanda">
							<h4>Informacion del Viaje</h4>
						</div>
						<br>
						<br>

						<label for="fechavisita">Fecha de Ida</label>
						<input type="date" name="" required="required" class="form-control" autofocus>

						<label for="fechavisita">Fecha de Regreso</label>
						<input type="date" name="" required="required" class="form-control" autofocus>

						

						<label for="actividad">Actividad Desarrollada</label>
						<textarea name="txtactividad" required="required" class="form-control"></textarea> 

						<label for="planaccion">Plan de Accion</label>
						<textarea name="txtplanaccion" required="required" class="form-control"></textarea> 

						<label for="stcompetencia">Situacion de la Competencia</label>
						<textarea name="txtscompetencia" required="required" class="form-control"></textarea>


						<label for="Usuario">Usuario</label>
					
												
					<br>
					<input type="submit" class="btn btn-primary" value="Registrar"/>

				</form>
				<br>
				<form action="cregistros.php">
					<input type="submit" class="btn btn-default" value="Ver Registros"/>
				</form>
			</div>
		</nav>
	</div>
</section>
