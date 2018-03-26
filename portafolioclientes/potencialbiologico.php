<?php 
require '../php/conexionbd.php';

$consulcultivo=$db->query("SELECT * FROM cultivo") or die($db->error);
$consultazona=$db->query("SELECT * FROM zona") or die($db->error);
$consultacliente=$db->query("SELECT * FROM cliente") or die($db->error);

 ?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/main.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700italic,100italic,300' rel='stylesheet' type='text/css'>
	<script src="../js/custom.js"></script>
	
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	
	<title>Potencial Biologico</title>
	


</head>

<script type="text/javascript">
function multiplicar(){
	num1=document.getElementById("numaplicaciones").value;
	num2=document.getElementById("dosisxaplicacion").value;
	num3=document.getElementById("precioxkg").value;
	resultado=parseInt(num1)*parseInt(num2)*parseInt(num3);
	if(isNaN(resultado))
	{
		document.getElementById("precio").value=0;
	}
	else
	{
		document.getElementById("precio").value=resultado;
	}
	
}

</script>

<body>
	
	<!-- EMPIEZA MENU -->
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
	<section>
		<!-- TERMINA MENU -->
		<div class="text-center">
			<div class="col-md-6 inline-block">
				<h1 style="color:green;">Potencial Biologico</h1>
				
				<div class="container-fluid">
					<form id="frm_potencial" name="frm_potencial">
						<div class="row">
							<label for="cliente">Cliente</label>
							<select class="form-control" name="lst_cliente">
								<option value="">Seleccionar</option>
								<?php 
								while ($resulcliente = $consultacliente ->fetch_array(MYSQLI_BOTH)){

									echo '

									<option value="'.$resulcliente['id_cliente'].'">'.$resulcliente['nom_cliente'].'</option>
									';
								}
								?>
								

							</select>
							<label for="cultivo">Cultivo</label>
							<select class="form-control" name="lst_cultivo">
								<option value="">Seleccionar</option>
								<?php 
								while ($resulcultivo = $consulcultivo ->fetch_array(MYSQLI_BOTH)){

									echo '

									<option value="'.$resulcultivo['id_cultivo'].'">'.$resulcultivo['nom_cultivo'].'</option>
									';
								}
								?>
								

							</select>
							<label for="Zona">Zona</label>
							<select class="form-control" name="lst_zona">
								<option value="">Seleccionar</option>
								<?php 
								while ($resulzona = $consultazona ->fetch_array(MYSQLI_BOTH)){

									echo '

									<option value="'.$resulzona['id_zona'].'">'.$resulzona['nom_zona'].'</option>
									';
								}
								?>
							</select>
							<label for="pbiologico">Problema Biologico</label>
							<input type="text" name="probiologico" id="probiologico" placeholder="Problema Biologico" class="form-control">
							<label for="producto">producto</label>
							<select class="form-control" name="lst_producto">
								<option value="">Seleccionar</option>
								<option value="">Manzate</option>						
							</select>
						</div>
						<br>
						<div class="row">
							<input type="text" name="numaplicaciones" id="numaplicaciones" placeholder="Número de aplicaciones" class="form-control" OnKeyUp="multiplicar()">
							<input type="text" name="dosisxaplicacion" id="dosisxaplicacion" placeholder="Dosis por aplicacion (kgs ó lit)" class="form-control" OnKeyUp="multiplicar()">
							<input type="text" name="precioxkg" id="precioxkg" placeholder="Precio por kilogramo o litro" class="form-control" OnKeyUp="multiplicar()">
							
							<div class="input-group">
								<span class="input-group-addon">$</span>
								<input type="text" name="precio" id="precio" class="form-control" readonly="readonly" placeholder="Precio en pesos"/>
							</div>

						</div>
						<br>
						<div class="form-group">
							<input type="button" class="btn btn-success" value="Guardar">
							<input type="button" class="btn btn-danger" value="Eliminar">
						</div>
						
					</form>


				</div>
								
			</div>
			
		</div>

	</section>
	<section>
		<div class="text-center">
			<div class="col-md-6 inline-block table-responsive">
				<table class="table table-bordered table-hover table-condensed" id="tablapotencial">
					<tr>
						<th>Cliente</th>
						<th>Cultivo</th>
						<th>Zona</th>
						<th>Problema Biologico</th>
						<th>Producto</th>
						<th># Aplicaciones</th>
						<th>Dosis x Aplicacion</th>
						<th>Precio x Kg o Lt</th>
						<th>Total en Pesos</th>
					</tr>
					<tr>
						<td>a</td>
						<td>a</td>
						<td>aaaaa</td>
						<td>a</td>
						<td>aaaaaaa</td>
						<td>aa</td>
						<td>aaa</td>
						<td>aa</td>
						<td>2000</td>
					</tr>
				</table>
			</div>

		</div>
	</section>

</body>
</html>