<?php
session_start();
$usuSesion=$_SESSION['usuario_sesion'];

/*session_start();

	//validar si el usuario se Logeo, de lo contrario no lo deje ingresar
if(!$_SESSION)
{
	header("location:ingreso.php");
}*/
require '../php/conexionbd.php';
$consulCli=$db->query("SELECT c.id_cliente,c.nom_cliente,u.id_usuario,u.nom_usuario,cm.id_cliente,cm.id_usuario
					   FROM cliente c, usuario u, cliente_municipio cm
					   WHERE cm.id_cliente = c.id_cliente
					   and cm.id_usuario = '$usuSesion'
					   GROUP BY c.id_cliente
					   ORDER By c.nom_cliente ASC")or die($db->error);

?>
<!DOCTYPE html>
<html lang="es">
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
	<script type="text/javascript" src="../js/validaPlanNegocios.js"></script>
	<script type="text/javascript" src="../js/pushNotification/push.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	       <link rel="icon" type="image/png" href="../img/logo.png">
	<title>Ventas Duwest</title>
</head>
<script type="text/javascript">
				
	    		$(function(){
					// Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
					//tr:eq(Aqui el numero de tr o fila a clonar) 
					$(document).on('click',".adicional", function(){
						$("#tabMetasProducto tbody tr:eq(1)").clone().removeClass('fila-fija').appendTo("#tabMetasProducto");
					});
				 
					// Evento que selecciona la fila y la elimina 
					$(document).on("click",".eliminar",function(){
						var parent = $(this).parents().get(0);
						$(parent).remove();
					});
				});
</script>
<script type="text/javascript">
				
	    		$(function(){
					// Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
					//tr:eq(Aqui el numero de tr o fila a clonar) 
					$(document).on('click',".adicional2", function(){
						$("#tabrpn tbody tr:eq(1)").clone().removeClass('fila-fija2').appendTo("#tabrpn");
					});
				 
					// Evento que selecciona la fila y la elimina 
					$(document).on("click",".eliminar2",function(){
						var parent = $(this).parents().get(0);
						$(parent).remove();
					});
				});
</script>
<script type="text/javascript">


	Push.create("Novedades en Plan de Negocio", {
	    body: "La fecha para registrar los planes de negocio termino. Si tiene alguna duda por favor comuniquese con el area de sistemas",
	    icon: '../img/logo.png',
	    timeout: 5000,

	    onClick: function () {
	       
	        this.close();
	    }
	    
	});
	
</script>
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
		 					<li><a href="../user/repvisitas.php">Reporte Visitas<span class="sr-only">(current)</span></a></li>
		 					<li><a href="../calendar/index.php">Reporte Programacion Semanal</a></li>
		 					<li ><a href="../user/actualizarcliente.php">Actualizar Cliente</a></li>

		 					<li class="dropdown">
		 					    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Portafolio de Clientes <span class="caret"></span></a>
		 					    <ul class="dropdown-menu">
		 					        <li><a href="../graficos/grafico/bubble/index.php">Grafico Cuadrantes</a></li>
		 					        <li role="separator" class="divider"></li>
		 					        <li class="active"><a href="plannegocios.php">Plan de Negocio X Cliente</a></li>
		 					        
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

	 <br>
	 <section class="seccion">
	 	<div>
	 		<h1 class="grande">Plan de Negocios por Cliente</h1>
	 		<hr>
	 		
	 			<!--***************FORM CONSUL CLIENTE**************-->
	 		<div class="panel panel-primary">
	 			<div class="panel-heading"><strong><h4>Filtro de Busqueda</h4></strong></div>
	 				<div class="panel-body">
	 					<div class="row">
	 						<div class="col-md-6">
	 							<label id="lblcliente" >Cliente a Buscar</label>
	 							<select class="form-control" id="lst_cliente" onChange="cargaFiltroCultivos();">
	 								<option value="0">Seleccione un cliente...</option>
	 								<?php 
	 								while ($res=$consulCli->fetch_assoc()) {?>
	 								<option value="<?php echo $res['id_cliente']?>" ><?php echo utf8_encode($res['nom_cliente']);?></option>

	 								<?php
	 							}
	 							?>
	 						</select>

	 					</div>
	 					<div class="col-md-6" id="lsta_cultivo">
	 						<label id="lblcultivo">Cultivo a consultar</label>
	 						<select class="form-control" id="lst_cultivo">

	 						</select>	
	 					</div>

	 				</div>
	 				<br>

	 				<input type="button" class="btn btn-success" value="Consultar" id="btn_consultar" onClick="gestionPlanNegocio();">
	 				<input type="button" class="btn btn-primary" value="Ver plan de negocio" id="btn_verplannegocio" onClick="verPlanNegocio();">
	 			</div>

	 		</div>
	 			<!-- *****************FIN FORM *********************-->
	 			<!--***************FORM Resultado**************-->
	 			<div class="panel panel-primary">
	 				<div class="panel-heading"><strong><h4>Formalario de Plan de Negocio</h4></strong></div>
	 				<div class="panel-body">
	 					<div id="frmPlanNegocio">

	 					</div>
	 					
	 				</div>

	 			</div>
	 			<!-- *****************FIN FORM *********************-->

	 			
	 			
					<br>
					<!--<form action="cregistros.php">
						<input type="submit" class="btn btn-default" value="Ver Registros"/>
					</form>-->

				
			</div>
		</section>
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