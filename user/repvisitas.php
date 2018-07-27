<?php
session_start();
//validar si el usuario se Logeo, de lo contrario no lo deje ingresar
if(!$_SESSION)
{
	//header("location:../ingreso.php");
	echo "<script>location.href='../ingreso.php'</script>";
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
	<script src="../js/custom.js"></script>
	<script src="../js/jquery-migrate-1.4.1.js"></script>
	<script type="text/javascript" src="../Tools/maxLength/maxLength.js"></script>
	<link rel="icon" type="image/png" href="../img/logo.png">

	<title>Ventas Duwest</title>
</head>

<body onload="nobackbutton();">
	<!-- Aqui empieza el menu -->
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
						<li class="active"><a href="repvisitas.php">Reporte Visitas<span class="sr-only">(current)</span></a></li>
						<li><a href="../calendar/index.php">Programacion Semanal</a></li>
						<li><a href="actualizarcliente.php">Actualizar Cliente</a></li>
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
								<li><a href="../php/cambiarpass.php">Cambiar Contraseña</a></li>
								
								<li role="separator" class="divider"></li>


								<li><a href="../php/cerrarsesion.php">Cerrar Sesion</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</header>
	<!-- aqui termina el menu -->

	<section>
		<!--
		***********************VENTANA MODAL**********************
	-->
		<div class="container">
		 
		  		  <!-- Modal -->
		  <div class="modal fade" id="myModal" role="dialog">
		    <div class="modal-dialog modal-lg">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        
		        <div class="modal-body">
		          
		        	<img src="../img/cambiaContrasena.jpg"  class="img-responsive" alt="Responsive image">

		         
		        </div>
		        <div class="modal-footer">
		        	<button type="button" class="btn btn-success btn-md" id="myBtn">Entendido !!</button>
		        </div>
		      </div>
		      
		    </div>
		  </div>
		</div>

	<!--
		***********************FIN VENTANA MODAL**********************
	-->
		<div class="text-center">
			<h1 class="grande">Reporte de Visitas</h1>
			<hr>
			<nav>
				<div class="col-md-4 inline-block">

					<form action="../php/regvisita.php" method="post" style="margin-top:1.5em;">
						<label for="Usuario">Usuario</label>
						<input type="text" name="txt_nomusuario" required="required" readonly="readonly" class="form-control" value="<?php echo $_SESSION['usuario_sesion']; ?>"/><br/>
						
						<label for="Usuario">Seleccione un Cliente <span style="color:red;">*</span></label>
						<select name="lst_cliente" id="lst_cliente" class="form-control" onChange="idCliente()">
							<option value=""></option>
							<?php 
							require '../php/llenarcombos.php';

							foreach ($resultado as $value) {?>
							<option value="<?php echo $value['id_cliente'];?>"><?php echo utf8_encode ($value['nom_cliente']);?></option>
							<?php
						}

						?>
					</select>
					<hr> 
					<input type="text" class="form-control" placeholder="Escriba el nombre de su Esporadico" name="nom_esporadico" id="nomEsporadico" autocomplete=on>
					<label for="fechavisita">Fecha de Visita<span style="color:red;">*</span></label>
					<input type="date" name="fvisita" required="required" class="form-control" autofocus>
					
					<label for="actividad">Situación Zona <span style="color:red;">*</span></label>
					<textarea name="txtsitzona" id="txtsitzona" required="required" class="form-control" ></textarea> 
					<p style="color:red;">Cantidad de caracteres permitidos: <div id="cont1">300</div></p>
					
					<label for="planaccion">Situación Competencia <span style="color:red;">*</span></label>
					<textarea name="txtcompetencia" id="txtcompetencia" required="required" class="form-control"></textarea> 
					<p style="color:red;">Cantidad de caracteres permitidos: <div id="cont2">300</div></p>
					
					<label for="stcompetencia">Reporte de la Visita <span style="color:red;">*</span></label>
					<textarea name="txtvisita" id="txtvisita" required="required" class="form-control"></textarea>
					<p style="color:red;">Cantidad de caracteres permitidos: <div id="cont3">300</div></p>

					<br>
					<input type="submit" class="btn btn-success" value="Registrar"/>

				</form>
				<br>
				<form action="cregistros.php">
					<input type="submit" class="btn btn-primary" value="Ver Registros"/>
				</form>
			</div>
		</nav>
	</div>
</section>

<script>
$(document).ready(function(){
	document.getElementById("nomEsporadico").disabled=true; 
	/*
    // Inicia la ventana modal al iniciar la pagina
    $("#myModal").modal({backdrop: "static"});
   
   

    // oculta la ventana modal el boton
    $("#myBtn").click(function(){
        $("#myModal").modal("hide");
    });*/
});

function idCliente(){
	console.log(document.getElementById("lst_cliente").value);
	
	var num =  document.getElementById("lst_cliente").value;
	console.log(num.length);
	 
	if (num.length < 8) 
	{
		
			
			document.getElementById("nomEsporadico").disabled=false;
			document.getElementById("txtsitzona").value="NA";
			document.getElementById("txtcompetencia").value="NA"; 
				 
	}
	else
	{
		document.getElementById("nomEsporadico").disabled=true;
		document.getElementById("txtsitzona").value="";
		document.getElementById("txtcompetencia").value=""; 
	}
	

}

$(function(){
	$("#txtsitzona").maxLength(300, {showNumber:"#cont1"});
	$("#txtcompetencia").maxLength(300, {showNumber:"#cont2"});
	$("#txtvisita").maxLength(300, {showNumber:"#cont3"});
})
</script>

<footer class="pie-pagina">
	<strong>

		<div class="col-md-4 ">
			<h3>Acerca de Nosotros </h3>
			<p><a href="http://www.duwest.com/es/inicio" class="link-footer">Nuestro Corporativo</a></p>
			<p><a href="http://www.duwest.com/es/somos" class="link-footer">Quienes Somos</a></p>
			
            <!--<p>Autopista Medellin Km 2 parque empesarial</p>
            <p>Oikos - La florida, Bodega 5, 6 y 7</p>
            <p>Diseñado por: David Zambrano</p>-->

        </div>
 		
        <div class="col-md-4 text-center">

        	<img src="../img/duwestfooter.png" height="100" alt="logo duwest">
        	
        	<p>©2016. Duwest Colombia Todos los Derechos reservados.</p>
        	<p>Desarrollado por: <strong>David Zambrano</strong></p>


        </div>
		
        <div class="col-md-4 text-right">
        	<h3>PBX: (57) 1 898 5064 </h3>
        	<h5>Autopista Medellin Km 2 Parque Oikos La florida Bodega 5</h5>
        	<h5><a href="mailto:soporteit@duwest.com" class="link-verde">soporteit@duwest.com</a></h5>
        	<!--<ul class="">
        		<li class="no-lista">Ayuda</li>
        		<li></li>
        	</ul>-->

        </div>

    </strong>
</footer> 		
</body>
</html>			