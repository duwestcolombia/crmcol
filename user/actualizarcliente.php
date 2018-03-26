<?php 
session_start();
if(!$_SESSION)
{
	//header("location:../ingreso.php");
	echo "<script>location.href='../ingreso.php'</script>";
}
 ?>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/main.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700italic,100italic,300' rel='stylesheet' type='text/css'>
	<script src="../js/custom.js"></script>
	<script type="text/javascript" src="../js/consulclientajax.js"></script>
	<script type="text/javascript" src="../js/operacionesmat.js"></script>
	<script type="text/javascript" src="../js/pushNotification/push.min.js"></script>
	<script src="../js/jquery-migrate-1.4.1.js"></script>
	
	<link rel="icon" type="image/png" href="../img/logo.png">
	<title>Actualizar cliente</title>
	<style type="text/css">
			/* CSS used here will be applied after bootstrap.css */
	.modal-header-success {
	    color:#fff;
	    padding:9px 15px;
	    border-bottom:1px solid #eee;
	    background-color: #5cb85c;
	    -webkit-border-top-left-radius: 5px;
	    -webkit-border-top-right-radius: 5px;
	    -moz-border-radius-topleft: 5px;
	    -moz-border-radius-topright: 5px;
	     border-top-left-radius: 5px;
	     border-top-right-radius: 5px;
	}
	.modal-header-warning {
		color:#fff;
	    padding:9px 15px;
	    border-bottom:1px solid #eee;
	    background-color: #f0ad4e;
	    -webkit-border-top-left-radius: 5px;
	    -webkit-border-top-right-radius: 5px;
	    -moz-border-radius-topleft: 5px;
	    -moz-border-radius-topright: 5px;
	     border-top-left-radius: 5px;
	     border-top-right-radius: 5px;
	}
	.modal-header-danger {
		color:#fff;
	    padding:9px 15px;
	    border-bottom:1px solid #eee;
	    background-color: #d9534f;
	    -webkit-border-top-left-radius: 5px;
	    -webkit-border-top-right-radius: 5px;
	    -moz-border-radius-topleft: 5px;
	    -moz-border-radius-topright: 5px;
	     border-top-left-radius: 5px;
	     border-top-right-radius: 5px;
	}
	.modal-header-info {
	    color:#fff;
	    padding:9px 15px;
	    border-bottom:1px solid #eee;
	    background-color: #5bc0de;
	    -webkit-border-top-left-radius: 5px;
	    -webkit-border-top-right-radius: 5px;
	    -moz-border-radius-topleft: 5px;
	    -moz-border-radius-topright: 5px;
	     border-top-left-radius: 5px;
	     border-top-right-radius: 5px;
	}
	.modal-header-primary {
		color:#fff;
	    padding:9px 15px;
	    border-bottom:1px solid #eee;
	    background-color: #428bca;
	    -webkit-border-top-left-radius: 5px;
	    -webkit-border-top-right-radius: 5px;
	    -moz-border-radius-topleft: 5px;
	    -moz-border-radius-topright: 5px;
	     border-top-left-radius: 5px;
	     border-top-right-radius: 5px;
	}
	</style>
	<script type="text/javascript">
			
	    		$(document).ready(function(){
	    			Push.create("Novedades Actualización Clientes!", {
	    			    body: "Ahora puedes Agregar mas contactos a tus clientes y mantenerte actualizado.",
	    			    icon: '../img/logo.png',
	    			    timeout: 5000,
	    			    onClick: function () {
	    			       
	    			        this.close();
	    			    }
	    			});
	    		});

	    		$(function(){
					// Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
					//tr:eq(Aqui el numero de tr o fila a clonar) 
					$(document).on('click',"#adicional", function(){
					
						$("#tabHectareas tbody tr:eq(1)").clone().removeClass('fila-clonar').appendTo("#tabHectareas");
					});
				 
					// Evento que selecciona la fila y la elimina 
					$(document).on("click",".delete",function(){
						var parent = $(this).parents().get(0);
						$(parent).remove();
					});
				});



	    		
</script>

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
		                <li><a href="repvisitas.php">Reporte Visitas<span class="sr-only">(current)</span></a></li>
		                <li><a href="../calendar/index.php">Programacion Semanal</a></li>
		                <li class="active"><a href="actualizarcliente.php">Actualizar Cliente</a></li>

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
	<br>
	<section class="seccion">
			<div class="text-center"><h1>Actualización de datos del cliente</h1></div>
			
			<div class="panel panel-primary">
				<div class="panel-heading"><strong><h4>Filtro de Busqueda</h4></strong></div>
			  	<div class="panel-body">
			  		<div class="row">
			  			<div class="col-md-6">
			  					<select name="lst_tipusuario" class="form-control" id="lst_tipusuario">
			  						<option value=""></option>
			  						<?php 
			  						require '../php/llenarcombos.php';
			  						foreach ($resultado as $value) {?>
			  						<option value="<?php echo $value['id_cliente'];?>"><?php echo utf8_encode($value['nom_cliente']);?>
			  						</option>
			  						<?php
			  					}
			  					?>
			  					</select>
			  					<br>
			  					<!--FUNCION BUSCARCLIENTE() ES AJAX-->
			  					<input type="button" value="Buscar" class="btn btn-success" onclick="buscarcliente();">
			  			</div>
			  		</div>
			  	</div>
			 </div> 		

		<div class="text-center">	
			
				
				<!--SE MUESTRAN Confirmacion de Actualizacion-->
				<div class="container-fluid" id="mensaje"></div>
				<!--SE MUESTRAN LOS DATOS DE LA CONSULTA AJAX-->
				<div class="" id="mostrardatos">

				</div>
				
		

		</div>
	</section>
	<script type="text/javascript">
		    		//Abrrir modal para agregar contactos
					$(document).on('click',"#btn_agergarcontacto",function(){
			        	/*$("#modalcontacto").modal({backdrop: "static"});*/
			        	$("#modalcontacto").modal("show");

			    	});
					//cerrar modal contactos
					$(document).on('click',"#btn_cerrarmodal",function(){
					       
					       $("#modalcontacto").modal("hide");
					       /*Al momento de cerrar la ventana modal, actualice el cliente*/
					       $("#modalcontacto").on('hidden.bs.modal', function () {
					            buscarcliente();
					        });
					       /*buscarcliente();*/
					 });

					$(document).on('click',"#btn_agregaCultivo",function(){
			        	/*$("#modalcontacto").modal({backdrop: "static"});*/
			        	$("#modalCultivo").modal("show");
			        	
			    	});
			    	$(document).on('click',"#btn_cerrarmodalCultivo",function(){
			    		$("#modalCultivo").modal("hide");
			    		$("#modalCultivo").on('hidden.bs.modal', function () {
					            buscarcliente();
					    });
			    	})

					$(document).on('click',"#btn_registrar",function(){
							var nom=document.getElementById("txt_nomModal").value;
							var tel=document.getElementById("txt_telModal").value;
							var cel=document.getElementById("txt_celModal").value; 
							var email=document.getElementById("txt_emailModal").value;
							var fcumple=document.getElementById("txt_fcumpleModal").value;
							var cliente=document.getElementById("lst_clienteModal").value;
							/*Busco si el email cumple con el formato*/
							var comp = email.indexOf("@");


							if (nom==0) {
								alert("Debe Colocar un nombre para este contacto");
								document.getElementById("txt_nomModal").focus();
								return false;
							}
							if (cel==0) {
								alert("Debe asociar un numero de telefono para este cliente");
								document.getElementById("txt_celModal").focus();
								return false;
							}
							if (comp<0) {
								alert("La cuenta de correo es incorrecta, verifique que cumpla con el formato 'abc@cde.com'");
								document.getElementById("txt_emailModal").focus();
								return false;
								
							}
							if (fcumple==0) {
								alert("Ingrese una fecha de cumpleaños para este cliente");
								document.getElementById("txt_fcumpleModal").focus();
								return false;
							}
							if (cliente==0) {
									alert("Debe Seleccionar un Cliente");
									document.getElementById("lst_clienteModal").focus();
									return false;
							}
							else
							{
								var url='../php/cliente/gestionContacto.php';

								$.ajax({
									type:'POST',
									url:url,
									data:{
										nom:nom,
										tel:tel,
										cel:cel,
										email:email,
										fcumple:fcumple,
										cliente:cliente
									},
									/*beforeSend:function(){
										$("#mensajeModal").html("Espera un momento, estamos almacenando la informacion.");
									},	*/
									success:function(response){
										document.getElementById("txt_nomModal").value="";
										document.getElementById("txt_telModal").value="";
										document.getElementById("txt_celModal").value=""; 
										document.getElementById("txt_emailModal").value="";
										document.getElementById("txt_fcumpleModal").value="";
										document.getElementById("lst_clienteModal").value="";
										$("#mensajeModal").html(response);
										/*buscarcliente();
										/*$("#modalcontacto").modal("hide");*/

									}
								})
							}

									
							
					});
		

			
			function eliminarContacto(idContacto){

				var id=idContacto;
				var url='../php/cliente/deleteContacto.php';

				var confi=confirm("Se va a elimiar este Contacto");

				if (confi==true) {
					$.ajax({
						type:'POST',
						url:url,
						data:{
							idContacto:id
						},
						success:function(response){

							$("#mensaje").html(response);

							buscarcliente();

						}
					})
				}
				else
				{
					return false;
				}
			}
					
					
						
				
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