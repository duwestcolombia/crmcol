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
.highcharts-tooltip h3 {
    margin: 0.3em 0;
}
        </style>
        <script type="text/javascript">
$(function () {
    $('#container').highcharts({

        chart: {
            type: 'bubble',
            //Tamaño del recuadro
            plotBorderWidth: 3,
            //Color del recuadro #346691=>azul
            plotBorderColor: '#346691',
            //Imagen de fondo para el grafico
            plotBackgroundImage: '../../../img/mapa.jpg',
            zoomType: 'xy'
        },

        legend: {
            enabled: false
        },

        title: {
            text: 'Grafico Portafolio de Clientes'
        },

        subtitle: {
            text: 'FUERTE ---------- RPN = FUERZA DE NUESTRA POSICION ---------- DÉBIL'
        },

        xAxis: {
            //Tamaño de lineas verticales 
            gridLineWidth: 0,
            title: {
                //este es el texto de la parte inferior del grafico
                text: ''
            },
            labels: {
                format: '{value}'
            },
            plotLines: [{
                //Color de linea y
                color: 'red',
                //este es el estilo de la linea - "dot" es linea punteada y "long" linea continua
                //dashStyle: 'dot',
                dashStyle: 'long',
                //grosor linea division en x
                width: 1,
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
            }]
        },

        yAxis: {
            startOnTick: false,
            endOnTick: false,
            //bORDES HORIZONTALES
            gridLineWidth: 0,
            title: {
                text: 'BAJO -------  POTENCIAL DE LA CUENTA  ------- ALTO'
            },
            labels: {
                format: '{value} '
            },
            maxPadding: 0.2,
            plotLines: [{
                //Color de linea horizontal
                color: 'red',
                //este es el estilo de la linea - "dot" es linea punteada y "long" linea continua
                //dashStyle: 'dot',
                dashStyle: 'long',
                //grosor linea division en x
                width: 1,
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

        tooltip: {
            useHTML: true,
            headerFormat: '<table ">',
            pointFormat: '<tr><th colspan="2"><h3>{point.nusuario}</h3></th></tr>' +
                '<tr><th>Total Potencial economico de la cuenta: </th><td>{point.x}</td></tr>' +
                '<tr><th>Total relacion personal negocios:</th><td>{point.y}</td></tr>' +
                '<tr><th>Tipo de Cliente:</th><td>{point.tcliente}</td></tr>' +
                '<tr><th>Tamaño circunferencia:</th><td>{point.z}</td></tr>',
            footerFormat: '</table>',
            followPointer: true
        },

        plotOptions: {
            series: {
                dataLabels: {
                    //cambiando esta propiedad muesto u oculto el nombre sobre el punto
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },

        credits: {
          enabled: false
      },

        series: [{

            data: [
            //aqui todos lo datos
            <?php
            // el valor de z: corresponde altamaño del circulo, el valor despues del . modificagrandemente el tamano
            require 'conexionbd.php';

            $tipcliente=$_POST['lst_tipcliente'];
            
            switch ($tipcliente) {
                case 1:

                    $consultotal=$db->query("SELECT c.id_cliente, c.nom_cliente, c.tipo_cliente, cc.total_peconomico,cc.total_rpersonal,cc.id_clientecalificacion FROM cliente c, cliente_calificacion cc Where c.id_cliente=cc.id_cliente and cc.id_usuario='$usu' GROUP BY cc.id_clientecalificacion")or die($db->error);

                    while ($resul = $consultotal ->fetch_array(MYSQLI_BOTH))
                    {
                    // $tamano1=100/mt_rand(10,20);
                     $tamanio=mt_rand(4,15);   
                        echo'
                        { x: -'.$resul['total_rpersonal'].', y: '.$resul['total_peconomico'].', z: '.$tamanio.', name: "'.$resul['nom_cliente'].' '.$resul['tipo_cliente'].'", nusuario: "'.$resul['nom_cliente'].'", tcliente: "'.$resul['tipo_cliente'].'" },
                       
                        ';
                        

                    }


                    
                    break;
                    case 2:
                    
                    $consultotal=$db->query("SELECT c.id_cliente, c.nom_cliente, c.tipo_cliente, cc.total_peconomico,cc.total_rpersonal FROM cliente c, cliente_calificacion cc Where c.id_cliente=cc.id_cliente and cc.id_usuario='$usu' and c.tipo_cliente='Distribuidor' GROUP BY cc.id_clientecalificacion")or die($db->error);

                    while ($resul = $consultotal ->fetch_array(MYSQLI_BOTH))
                    {
                        echo'
                        { x: -'.$resul['total_rpersonal'].', y: '.$resul['total_peconomico'].', z: 20.1, name: "'.$resul['nom_cliente'].'", nusuario: "'.$resul['nom_cliente'].'", tcliente: "'.$resul['tipo_cliente'].'" },
                       
                        ';

                    }

                    break;
                    case 3:

                    $consultotal=$db->query("SELECT c.id_cliente, c.nom_cliente, c.tipo_cliente, cc.total_peconomico,cc.total_rpersonal FROM cliente c, cliente_calificacion cc Where c.id_cliente=cc.id_cliente and cc.id_usuario='$usu' and c.tipo_cliente='Agricultor' GROUP BY cc.id_clientecalificacion")or die($db->error);

                    while ($resul = $consultotal ->fetch_array(MYSQLI_BOTH))
                    {
                        echo'
                        { x: -'.$resul['total_rpersonal'].', y: '.$resul['total_peconomico'].', z: 24.6, name: "'.$resul['nom_cliente'].'", nusuario: "'.$resul['nom_cliente'].'", tcliente: "'.$resul['tipo_cliente'].'" },
                       
                        ';

                    }

                    break;
                    case 4:
                    $consultotal=$db->query("SELECT c.id_cliente, c.nom_cliente, c.tipo_cliente, cc.total_peconomico,cc.total_rpersonal FROM cliente c, cliente_calificacion cc Where c.id_cliente=cc.id_cliente and cc.id_usuario='$usu' and c.tipo_cliente= 'otros'")or die($db->error);

                    while ($resul = $consultotal ->fetch_array(MYSQLI_BOTH))
                    {
                        echo'
                        { x:- '.$resul['totalpeconomico'].', y: '.$resul['totalrpersonal'].', z: 24.6, name: "'.$resul['nom_cliente'].'", nusuario: "'.$resul['nom_cliente'].'", tcliente: "'.$resul['tipo_cliente'].'" },
                       
                        ';

                    }

                    break;
                
                default:
                    # code...
                    break;
            }

            
            ?>

                
                 
            ],
            //con esta propiedad se da color a los circulos, el numero dentro de colors[2] es verde
            marker: {
                fillColor: {
                    radialGradient: { cx: 0.4, cy: 0.3, r: 0.7 },
                    stops: [
                        [0, 'rgba(255,255,255,0.5)'],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[2]).setOpacity(1).get('rgba')]
                    ]
                }
            } 

            //aqui termina propiedad para dar color a los circulos
            

        
        }]

    });
});
        </script>
    </head>
   <body>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
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
                <li><a href="../../../calendar/index.php">Reporte Programacion Semanal</a></li>
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
                        <li><a href="#">Cambiar Contraseña</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../../../php/cerrarsesion.php">Cerrar Sesion</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<!-- TERMINA EL MENU -->

<div id="container" style="height: 600px; min-width: 310px; max-width: 800px; margin: 0 auto"></div>

<div class="text-center">
    <div class="col-md-8 inline-block">
        <form name="frm_tipcliente"method="post" class="form-inline">
            <div class="form-group">
                <label >Tipo de cliente para graficar</label>
                <select name="lst_tipcliente" class="form-control" required="required">

                    <option value="1">Todos</option>
                    <option value="2">Distribuidores</option>
                    <option value="3">Agricultores</option>
                    
                </select>

            </div>
            <button type="submit" name="buscar" class="btn btn-default btn-success">Buscar</button>
        </form>
        


    </div>
    <img src="../../../img/mapa.jpg"> 
</div>

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

        <img src="../../../img/duwestfooter.png" height="100"><br>
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