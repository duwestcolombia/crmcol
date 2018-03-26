<?php
session_start();
/////CODIGO ERROR_REPORTING(0) EVITA TODOS LOS MENSAJES DE ERROR, EL CODIGO DE ABAJO MUESTRA
///// TODOS LOS MENSAJES DE ERROR MENOS LOS QUE NOTICIA, QUE SON CUANDO LAS VARIABLES ESTAN VACIAS.
error_reporting(E_ALL ^ E_NOTICE);
//////////////////CONEXION BD/////////////
$usu=$_SESSION['usuario_sesion'];
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
	<title>Dashboard | Graf Uso</title>

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

	<script type="text/javascript">
			//$(function () {
				function graficar(){
				var anio=document.getElementById('lst_anio').value;
				//alert(anio);
				$.ajax({
					type:'POST',
					url:'../model/consulCantRegistros.php',
					data:{anio},
					success:function(data){
						//alert(data2);
						//se evalua el json
						var valores = eval(data);

						//se decodifica el json tomando la posicion del arreglo y la variable
						var ene = valores[0]["r"];
						var feb = valores[1]["r"];
						var mar = valores[2]["r"];
						var abr = valores[3]["r"];
						var may = valores[4]["r"];
						var jun = valores[5]["r"];
						var jul = valores[6]["r"];
						var ago = valores[7]["r"];
						var sep = valores[8]["r"];
						var oct = valores[9]["r"];
						var nov = valores[10]["r"];
						var dic = valores[11]["r"];
						/*DATA DE LA PROGRAMACION*/
						var enep = valores[12]["rp"];
						var febp = valores[13]["rp"];
						var marp = valores[14]["rp"];
						var abrp = valores[15]["rp"];
						var mayp = valores[16]["rp"];
						var junp = valores[17]["rp"];
						var julp = valores[18]["rp"];
						var agop = valores[19]["rp"];
						var sepp = valores[20]["rp"];
						var octp = valores[21]["rp"];
						var novp = valores[22]["rp"];
						var dicp = valores[23]["rp"];


							//--------------------------
							$(function () {
								$('#container').highcharts({
								    chart: {
								        type: 'column'

								    },
								    title: {
								        text: 'Cantidad de visitas programadas y reportadas'
								    },
								    subtitle: {
								        text: 'La cantidad de visitas visualizadas mes a mes corresponde a todas las zonas'
								    },
								    credits: {
								        enabled: false
								    },
								    /*Quito el boton imprimir grafico*/
								    exporting: { 
								        enabled: false 
								    },
								    xAxis: {
								        categories: [
								            'Ene',
								            'Feb',
								            'Mar',
								            'Abr',
								            'May',
								            'Jun',
								            'Jul',
								            'Ago',
								            'Sep',
								            'Oct',
								            'Nov',
								            'Dic'
								        ],
								        crosshair: true
								    },
								    yAxis: {
								        min: 0,
								        title: {
								            text: 'Cantidad'
								        }
								    },
								    tooltip: {
								        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
								        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
								            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
								        footerFormat: '</table>',
								        shared: true,
								        useHTML: true
								    },
								    plotOptions: {
								        column: {
								            pointPadding: 0.2,
								            borderWidth: 0
								        },
								        series: {
								            dataLabels: {
								                enabled: true

								                /*Estas propiedades son para dar estilo a los datalabels*/
								                /*borderRadius: 5,
								                backgroundColor: 'rgba(252, 255, 197, 0.7)',
								                borderWidth: 1,
								                borderColor: '#AAA',
								                y: -6*/
								            }
								        }
								    },
								    series: [{
								        name: 'Visitas Reportadas',
								        data: [ene, feb, mar, abr, may, jun, jul, ago, sep, oct, nov, dic]
								        

								    }, {
								        name: 'Visitas Programadas',
								        data:[enep,febp,marp,abrp,mayp,junp,julp,agop,sepp,octp,novp,dicp]

								    }]
								});

								//fin de la funcion que dibuja el grafico
							});	
						//----------------------------


					//fin del success
					}
				//Fin del ajax	
				})

			//fin de la funcion   
			//});
		}
/*------------------------SEGUNDA GRAFICA-----------------------------*/	    
				/*$(function () {
			    $('#container2').highcharts({
			        chart: {
			            type: 'bar'
			        },
			        title: {
			            text: 'Stacked bar chart'
			        },
			        xAxis: {
			            categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
			        },
			        yAxis: {
			            min: 0,
			            title: {
			                text: 'Total fruit consumption'
			            }
			        },
			        legend: {
			            reversed: true
			        },
			        plotOptions: {
			            series: {
			                stacking: 'normal'
			            }
			        },
			        series: [{
			            name: 'John',
			            data: [5, 3, 4, 7, 2]
			        }, {
			            name: 'Jane',
			            data: [2, 2, 3, 2, 1]
			        }, {
			            name: 'Joe',
			            data: [3, 4, 4, 2, 5]
			        }]
			    });
			});
			*/

	</script>

	
</head><body >
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
		                <li >
		                    <a href="../index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
		                </li>
		                <?php  
	                        if ($_SESSION['tipusuario_sesion']==0) {
	                    	?>
		                <li >

		                    <a href="consulClientesView.php" ><i class="fa fa-users" ></i> Clientes</a>
		                </li>
		                <li>
		                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Usuarios</a>
		                </li>
		               <?php 
		               		}
		                ?>

		                <li class="active">
		                    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Reportes <i class="fa fa-fw fa-caret-down"></i></a>
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
		                <!--<li>
		                    <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tablas</a>
		                </li>
		                <li>
		                    <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
		                </li>
		                <li>
		                    <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
		                </li>
		                <li>
		                    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
		                    <ul id="demo" class="collapse">
		                        <li>
		                            <a href="#">Dropdown Item</a>
		                        </li>
		                        <li>
		                            <a href="#">Dropdown Item</a>
		                        </li>
		                    </ul>
		                </li>
		                <li>
		                    <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
		                </li>
		                <li>
		                    <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
		                </li>-->
		            </ul>
		        </div>
		        <!-- /.navbar-collapse -->
		    </nav>



	</header>

	<section class="">
		<div id="page-wrapper">
			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">
							Uso de la Plataforma
						</h1>
						<ol class="breadcrumb">
							<li>
								<i class="fa fa-dashboard"></i>  <a href="../index.php">Dashboard</a>
							</li>
							<li class="active">
								<i class="fa fa-fw fa-arrows-v"></i> Graficos
							</li>
							<li class="active">
								<i class="fa fa-edit"></i> Uso plataforma
							</li>
						</ol>
					</div>
				</div>
				<!-- /.row -->
				<form name="frm_consulta"method="post" class="form-inline ">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<strong>
								<h4>Filtro de Busqueda</h4>
							</strong>
							<span>Selecciona un año a graficar, la grafica se mostrara a continuacion.</span>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-xs-6 col-md-3">
									<label for="exampleInputName2">Año a graficar:</label>
									<select name="lst_anio" id="lst_anio" class="form-control" required="required" onChange="graficar()">
										<?php 
											for ($i=2015; $i < 2050 ; $i++) { 
												echo '<option value='.$i.'>'.$i.'</option>';
											}
										 ?>
									</select>
								</div>
								<input type="button" class="btn btn-success" value="Imprimir" onClick="imprimirGrafico();">
							</div>
							<br>
							
						</div>
					</div>
				</form>
				<div class="row">
					<div class="">
						<!-- Aqui empieza la tabala -->
						<div class="panel panel-success">
							<div class="panel-body">
								<div class="table-responsive">
									<div id="printChart">
										<div id="container"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--
					<div class="col-md-4">-->
						<!-- Aqui empieza la tabala -->
						<!--<div class="panel panel-success">
							<div class="panel-body">
								<div class="table-responsive">

									<div id="container2"></div>

								</div>
							</div>
						</div>
					</div>-->
				</div>

				<script type="text/javascript">
				    function imprimirGrafico(){
				          var objeto=document.getElementById('printChart');  //obtenemos el objeto a imprimir
				          //var usu = document.getElementById("usuOcul").value; //Consigo el usuario
				          
				          var ventana=window.open('','_blank');  //abrimos una ventana vacía nueva
				          
				          ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
				          //ventana.document.title= "Grafico generado por: " + usu ;

				          ventana.document.close();  //cerramos el documento
				          ventana.print();  //imprimimos la ventana
				          ventana.close();  //cerramos la ventana
				    }
				</script>
			</div>
		</div>
		</section>

	<!-- jQuery -->
	<script src="../js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>

	<!-- Char -->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/highcharts-more.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>

</body>
</html>