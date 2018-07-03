<?php
session_start();
$usu=$_SESSION['usuario_sesion'];
    //validar si el usuario se Logeo, de lo contrario no lo deje ingresar
if(!$_SESSION)
{
    //header("location:../../../ingreso.php");
    echo "<script>location.href='../../../ingreso.php'</script>";
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" type="image/png" href="../../../img/logo.png">
        <title>Grafico PPTO</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
                
                
                <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
                
                <link href='https://fonts.googleapis.com/css?family=Lato:400,700italic,100italic,300' rel='stylesheet' type='text/css'>
                <link rel="stylesheet" href="../../../css/main.css">
                <script src="../../../js/custom.js"></script>
                <style type="text/css">
                .highcharts-tooltip h4 {
                    margin: 0.3em 0;
                }
                .highcharts-plot-background {
                    opacity: 80;
                }
                
                .scroll{
                    height: 570px;
                    
                    overflow: auto;
                }

                </style>
                <script type="text/javascript">
                $(function () {

                    $('#container').highcharts({
                        chart: {
                            //type: 'bubble',
                            //Tamaño del recuadro
                            plotBorderWidth: 3,
                            //Color del recuadro #346691=>azul
                            plotBorderColor: '#346691',
                            
                            //Imagen de fondo para el grafico
                            plotBackgroundImage: '../../../img/flecha.jpg',
                            zoomType: 'xy'

                        },
                        title: {
                            text: 'Grafico Portafolio de Clientes'
                        },
                        subtitle: {
                            text: 'FUERTE ---------- RPN = FUERZA DE NUESTRA POSICION ---------- DÉBIL'
                        },
                        //DATOS EN EJE X
                        xAxis: {
                            //Tamaño de lineas verticales 
                            gridLineWidth: 1,
                            allowDecimals: false,
                            max: -4,
                            min: -20,
                            //intervalo de los puntos
                            pointInterval:4,
                            tickInterval: 4,
                            title: {
                                //este es el texto de la parte inferior del grafico
                                enabled: false,
                                text: ''
                            },
                            plotLines: [{
                                //Color de linea y
                                color: 'blue',
                                //este es el estilo de la linea - "dot" es linea punteada y "long" linea continua
                                //dashStyle: 'dot',
                                dashStyle: 'long',
                                //grosor linea division en x
                                width: 3,
                                value: -12,
                                label: {
                                    rotation: 0,
                                    y: 12,
                                    style: {
                                        fontStyle: 'arial'
                                    },
                                    text: ''
                                },
                                zIndex: 3
                            }],
                       
                            startOnTick: true,
                            endOnTick: true,
                            showLastLabel: true
                            
                        },
                        yAxis: {
                            //Tamaño de lineas horizontales 
                            gridLineWidth: 1,
                            allowDecimals: false,
                            //numero maximo del eje
                            max: 20,
                            //numero minimo del eje
                            min: 4,
                            pointInterval:4,
                            tickInterval: 4,
                            title: {
                                text: 'BAJO -------  POTENCIAL DE LA CUENTA  ------- ALTO'
                            },
                            plotLines: [{
                                //Color de linea horizontal
                                color: 'blue',
                                //este es el estilo de la linea - "dot" es linea punteada y "long" linea continua
                                //dashStyle: 'dot',
                                dashStyle: 'long',
                                //grosor linea division en x
                                width: 3,
                                value: 12,
                                label: {
                                    align: 'right',
                                    style: {
                                        fontStyle: 'arial'
                                    },
                                    //este texto esta sobre el eje x en el plano
                                    text: '',
                                    x: -12
                                },
                                zIndex: 3
                            }]
                        },
                        //esto es las leyendas que aparecen en la parte derecha de la pantalla
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle'
                        },
                        //oculta los creditos de highcharts
                        credits: {
                            enabled: false
                        },
                        /*Quito el boton imprimir grafico*/
                        exporting: { 
                            enabled: false 
                        },
                        //aqui las series de datos
                        series: [ {
                            //con esta propiedad oculto el nombre de la serie

                            showInLegend: false, 
                            name: 'Clientes',
                            type: 'scatter',
                            color: Highcharts.getOptions().colors[3],
                            data: [
                            //aqui todos lo datos
                            <?php
                            require 'conexionbd.php';

                            if (isset($_POST["buscar"])) 
                            {
                                $tipcliente=$_POST['lst_tipcliente'];
                                

                                switch ($tipcliente) {
                                case 1:
                                $consultotal=$db->query("SELECT c.id_cliente, c.nom_cliente, c.tipo_cliente, 
                                                                cc.total_peconomico,cc.total_rpersonal,
                                                                cc.id_clientecalificacion 
                                                            FROM cliente c, cliente_calificacion cc 
                                                            Where c.id_cliente=cc.id_cliente 
                                                            and cc.id_usuario='$usu' 
                                                            GROUP BY cc.id_clientecalificacion")or die($db->error);

                                $tab=$db->query("SELECT c.id_cliente, c.nom_cliente, c.tipo_cliente, 
                                                        cc.total_peconomico,cc.total_rpersonal,
                                                        cc.id_clientecalificacion 
                                                    FROM cliente c, cliente_calificacion cc 
                                                    Where c.id_cliente=cc.id_cliente 
                                                    and cc.id_usuario='$usu' 
                                                    GROUP BY cc.id_clientecalificacion")or die($db->error);
                               
                                while ($resul = $consultotal ->fetch_array(MYSQLI_BOTH))
                                {
                                
                                    
                                    echo'{x:-'.$resul['total_rpersonal'].', y:'.$resul['total_peconomico'].',  name:"'.$resul['nom_cliente'].'",idCliente:"'.$resul['id_cliente'].'", tcliente:"'.$resul['tipo_cliente'].'"},';

                                }
                                break;
                                case 2:
                                
                                $consultotal=$db->query("SELECT c.id_cliente, c.nom_cliente, c.tipo_cliente, cc.total_peconomico,cc.total_rpersonal,cc.id_clientecalificacion  FROM cliente c, cliente_calificacion cc Where c.id_cliente=cc.id_cliente and cc.id_usuario='$usu' and c.tipo_cliente='Distribuidor'")or die($db->error);
                                $tab=$db->query("SELECT c.id_cliente, c.nom_cliente, c.tipo_cliente, cc.total_peconomico,cc.total_rpersonal,cc.id_clientecalificacion FROM cliente c, cliente_calificacion cc Where c.id_cliente=cc.id_cliente and cc.id_usuario='$usu' and c.tipo_cliente='Distribuidor' GROUP BY cc.id_clientecalificacion")or die($db->error);
                               
                                while ($resul = $consultotal ->fetch_array(MYSQLI_BOTH))
                                {
                                    
                                    echo'{x:-'.$resul['total_rpersonal'].', y:'.$resul['total_peconomico'].', name:"'.$resul['nom_cliente'].'",idCliente:"'.$resul['id_cliente'].'", tcliente:"'.$resul['tipo_cliente'].'"},';

                                }

                                break;
                                case 3:
                                    $consultotal=$db->query("SELECT c.id_cliente, c.nom_cliente, c.tipo_cliente, cc.total_peconomico,cc.total_rpersonal,cc.id_clientecalificacion FROM cliente c, cliente_calificacion cc Where c.id_cliente=cc.id_cliente and cc.id_usuario='$usu' and c.tipo_cliente='Agricultor'")or die($db->error);
                                    $tab=$db->query("SELECT c.id_cliente, c.nom_cliente, c.tipo_cliente, cc.total_peconomico,cc.total_rpersonal,cc.id_clientecalificacion FROM cliente c, cliente_calificacion cc Where c.id_cliente=cc.id_cliente and cc.id_usuario='$usu' and c.tipo_cliente='Agricultor' GROUP BY cc.id_clientecalificacion")or die($db->error);
                                    
                                    while ($resul = $consultotal ->fetch_array(MYSQLI_BOTH))
                                    {
                                       
                                        echo'{x:-'.$resul['total_rpersonal'].', y:'.$resul['total_peconomico'].', name:"'.$resul['nom_cliente'].'", idCliente:"'.$resul['id_cliente'].'", tcliente:"'.$resul['tipo_cliente'].'"},';

                                    }
                                break;

                                }
                               
                            }

                            
                            
                            ?>

                            ]
                        }],
                        tooltip: {

                            //dentro de{point.?} el point corresponde a los valores impresos con la consulta php y lo que sigue es el titulo del campo
                            useHTML: true,
                            headerFormat: '<table ">',
                            pointFormat: '<tr><th colspan="2"><h3>{point.name}</h3></th></tr>' +
                            '<tr><th>Total Potencial economico de la cuenta: </th><td>{point.y}</td></tr>' +
                            '<tr><th>Total relacion personal negocios:</th><td>{point.x}</td></tr>' +
                            '<tr><th>Tipo de Cliente:</th><td>{point.tcliente}</td></tr>',
                            footerFormat: '</table>',
                            followPointer: true
                        },
                        plotOptions: {
                            series: {
                                dataLabels: {
                                    //cambiando esta propiedad muesto u oculto el nombre sobre el punto
                                    enabled: true,
                                    format: '{point.idCliente}'
                                },
                                showCheckbox: true
                            }
                        }
                         /*plotOptions: {
                            bubble: {
                                minSize: 3,
                                maxSize: 50,
                                zMin: 0,
                                zMax: 100
                            }
                        }*/
                    });
});


</script>
	</head>
	<body>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>

        
        <header>
            <!-- EMPIEZA EL MENU -->
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
                            <li ><a href="../../../user/repvisitas.php">Reporte Visitas<span class="sr-only">(current)</span></a></li>
                            <li><a href="../../../calendar/index.php">Programacion Semanal</a></li>
                            <li><a href="../../../user/actualizarcliente.php">Actualizar Cliente</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Portafolio de Clientes <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="active"><a href="index.php">Grafico Cuadrantes</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="../../../portafolioclientes/plannegocios.php">Plan de Negocio X Cliente</a></li>
                                    
                                </ul>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuario <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="../../../php/cambiarpass.php">Cambiar Contraseña</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="../../../php/cerrarsesion.php">Cerrar Sesion</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

            <!-- TERMINA EL MENU -->
        </header>
        <section class="seccion">
            <div class="text-center">
                <div class="col-md-8 inline-block">
                    <form name="frm_tipcliente"method="post" class="form-inline">
                        <div class="form-group">
                            <label >Tipo de cliente para graficar</label>
                            <select name="lst_tipcliente" id="lst_tipcliente" class="form-control" required="required">

                                <option value="1">Todos</option>
                                <option value="2">Distribuidores</option>
                                <option value="3">Agricultores</option>
                                
                            </select>

                        </div>
                        <?php 
                            echo ' <input type="hidden" id="usuOcul" value="'.$usu.'">';
                         ?>
                       
                        <button type="submit" name="buscar" class="btn btn-success">Buscar</button>
                        <input type="button" name="buscar" class="btn btn-primary " value="Imprimir" onclick="imprimirGrafico();" >

                </div>
                
            </div>
            <hr>
         
            <div id="objectPrint">
            <div class="row">
                <div class="col-md-8">
                    <!--AQUI SE MUESTRA EL GRAFICO -->
                    <div id="container" style="height: 600px; min-width: 310px; max-width: 800px; margin: 0 auto"></div>
                     <!--FINALIZA EL GRAFICO -->
                </div>
                <div class="col-md-4 scroll">
                    <table class="table table">
                        <tr>
                            <th>NIT/Cedula</th>
                            <th>Cliente</th>
                            <th>Total Potencial economico</th>
                            <th>Total Relacion Personal</th>
                        </tr>
                            <?php 
                            if ($tab) {
                                while ($resul = $tab ->fetch_assoc()){
                                    if ($resul['total_peconomico']>0 ){
                                        echo '
                                    <tr>
                                        <td>'.$resul['id_cliente'].'</td>
                                        <td>'.utf8_encode( $resul['nom_cliente']).'</td>
                                        <td>'.$resul['total_peconomico'].'</td>
                                        <td>'.$resul['total_rpersonal'].'</td>
                                    </tr>';
                                    }
                                    
                                  }  
                            }
                            else
                            {
                                echo 'No se encontraron registros, intente con otro filtro.';
                            }
                                
                                
                             ?>

                    </table>
                </div>
            </div>
            </div>
            
        </section>

        <script type="text/javascript">
            function imprimirGrafico(){
                  var objeto=document.getElementById('objectPrint');  //obtenemos el objeto a imprimir
                  var usu = document.getElementById("usuOcul").value; //Consigo el usuario
                  
                  var ventana=window.open('','_blank');  //abrimos una ventana vacía nueva
                  
                  ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
                  ventana.document.title= "Grafico generado por: " + usu ;
                  ventana.document.close();  //cerramos el documento
                  ventana.print();  //imprimimos la ventana
                  ventana.close();  //cerramos la ventana
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

                    <img src="../../../img/duwestfooter.png" height="100" alt="logo duwest">
                    
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
