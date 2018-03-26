<?php
session_start();
//validar si el usuario se Logeo, de lo contrario no lo deje ingresar
if(!$_SESSION)
{
	header("location:../../ingreso.php");
}
/////CODIGO ERROR_REPORTING(0) EVITA TODOS LOS MENSAJES DE ERROR, EL CODIGO DE ABAJO MUESTRA
///// TODOS LOS MENSAJES DE ERROR MENOS LOS QUE NOTICIA, QUE SON CUANDO LAS VARIABLES ESTAN VACIAS.
error_reporting(E_ALL ^ E_NOTICE);
//////////////////CONEXION BD/////////////
require '../../php/conexionbd.php';
/////////////////VARIABLES DE SESION////////////////

$usu=$_SESSION['usuario_sesion'];
$rol=$_SESSION['tipusuario_sesion'];
$zon=$_SESSION['zona_sesion'];
$departamento=$_POST['lst_zona'];

$consulclientes=$db->query("SELECT * FROM cliente ORDER By id_cliente ASC") or die($db->error);
$consulusuarios=$db->query("SELECT * FROM usuario WHERE id_rol<>2 and id_rol<>1") or die($db->error);
$consulcultivo=$db->query("SELECT * FROM cultivo")or die($db->error);


$consulzona=$db->query("SELECT * FROM zona")or die($db->error);
$consulmunicipio=$db->query("SELECT * FROM municipio")or die($db->error);

/*if (isset($_POST['lst_zona']))
{
//hago aqui cuando apreto actualizar
	$consulmunicipio=$db->query("SELECT * FROM municipio WHERE id_zona='$departamento'")or die($db->error);
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
	<link rel="stylesheet" href="../../css/main.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700italic,100italic,300' rel='stylesheet' type='text/css'>
	<script src="../../js/custom.js"></script>
	<!--
	<script type="text/javascript" src="../../js/tablepagination.js"></script>

	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/jquery-1.12.3.min.js">

	<script type="text/javascript" src="../../DataTables/media/js/jquery.dataTables.js"></script>
	<script type="stylesheet" src="../../DataTables/media/js/dataTables.bootstrap.js"></script>
	<link rel="stylesheet" href="../../DataTables/media/css/dataTables.bootstrap.css">-->
	
	

	
	
	</script>


	<title>Ventas Duwest</title>
	
</head>
<body onload="">
	
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
					<li class="active"><a href="../index.php">Reporte Visitas<span class="sr-only">(current)</span></a></li>
					<li><a href="../surprogramacion.php">Reporte Programacion Semanal</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuracion <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="frmcliente.php">Administrar Clientes</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">Separated link</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">One more separated link</a></li>
						</ul>
					</li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuario <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Cambiar Contraseña</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="../../php/cerrarsesion.php">Cerrar Sesion</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<section>
		<br>
		<h1 class="text-center">Administracion de Cliente</h1>
		<button class="btn btn-primary" data-toggle="modal" data-target="#editusuario" >Agregar Cliente</button>
		<div class="panel-body">

			<div class="table-responsive" id="div1">
				<table class="table table-striped table-bordered table-condensed display" id="tabcliente" cellspacing="0" width="100%">
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
							<td>'.$resulcliente['nom_cliente'].'</td>
							<td>'.$resulcliente['tipo_cliente'].'</td>
							<td><a href="../../php/modifcliente.php?id_cliente='.$resulcliente['id_cliente'].'" class="btn btn-warning">Editar</a>
								<a href="../../php/eliminarclienteconfirm.php?id_cliente='.$resulcliente['id_cliente'].'" class="btn btn-danger">Eliminar</a>
							</td>
							</tr>
							</tbody>';

						}

						?>
						
					
					</tbody>
				</table>
			</div>
		</div>
	</section>
	<section>
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

	</section>

</body>
</html>	