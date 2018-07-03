<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require '../php/conexionbd.php';
require '../php/conexionbdaudi.php';

if(!$_SESSION)
{
    //header("location:../ingreso.php");
    echo "<script>location.href='../ingreso.php'</script>";
}
// Definimos nuestra zona horaria
date_default_timezone_set("America/Bogota");

//Lleno una variable con la sesion
$usu=$_SESSION['usuario_sesion']; 

// incluimos el archivo de funciones
include 'funciones.php';

// incluimos el archivo de configuracion
include 'config.php';

// Verificamos si se ha enviado el campo con name from
if (isset($_POST['from'])) 
{

    // Si se ha enviado verificamos que no vengan vacios
    if ($_POST['from']!="" AND $_POST['to']!="") 
    {
        $i=$_POST['from'];
        $f=$_POST['to'];


        // Recibimos el fecha de inicio y la fecha final desde el form

        //$inicio = _formatear($_POST['from']);
        $inicio=strtotime($i)*(1000);
        // y la formateamos con la funcion _formatear

        //$final  = _formatear($_POST['to']);
        $final=strtotime($f)*(1000);

        // Recibimos el fecha de inicio y la fecha final desde el form

        $inicio_normal = $i;

        //se crea el formato a la fecha de inicio normal ya que no corresponde al formato que menaj mysql
       
        //$fini_normal=date_format($dini_normal,'Y-m-d H:i:s');
        
        // y la formateamos con la funcion _formatear
        
        $final_normal  = $f;
        //echo $final_normal;
        //se crea el formato a la fecha de final normal ya que no corresponde al formato que menaj mysql
 
        /*$ffin_normal=date_format($dfin_normal,'Y-m-d H:i');
        echo $ffin_normal;
        echo '<br>';*/
        //Recibimo la opcion si  va a repetir o no un evento
        $repetir=$_POST['op'];

        // Recibimos los demas datos desde el form
        $titulo = evaluar($_POST['title']);

        // Recibimos los demas datos desde el form
        $cliente = evaluar($_POST['lst_cliente']);
      
        //Concateno el ritulo con el nomnbre del cliente para que se muestren los dos

        $nomusuario=evaluar($_POST['ususelect']);

        $concatec = $titulo . " ". $nomusuario;
        
        //usuario de sesion activa
        $usu=$_SESSION['usuario_sesion'];

        //cuerpo del mensaje
        $body   = evaluar($_POST['event']);

        // reemplazamos los caracteres no permitidos
        $clase  = evaluar($_POST['class']);

       if ($repetir=="nunca") {
            // insertamos el evento
            $query="INSERT INTO eventos VALUES(null,'$concatec','$cliente','$usu','$body','','$clase','$inicio','$final','$inicio_normal','$final_normal')";

            // Ejecutamos nuestra sentencia sql
            $conexion->query($query)|| die($conexion->error); 

            //INSERTAR EVENTO DENTRO DE LA BASE DE DATOS DE AUDITORIA
            //sacar fecha y hora actual
            $hoy=date("Y-m-d h:i:sa");
            $regevento="INSERT INTO eventos VALUES(null,'$concatec','$cliente','$usu','$body','','$clase','$inicio','$final','$inicio_normal','$final_normal','R','$hoy','$usu')";
            //ejecuto conexion
            // $dbaudi->query($regevento)|| die($dbaudi->error);

            // Obtenemos el ultimo id insetado
            $im=$conexion->query("SELECT MAX(id) AS id FROM eventos");
            $row = $im->fetch_row();  
            $id = trim($row[0]);

            // para generar el link del evento
            $link = "$base_url"."descripcion_evento.php?id=$id";

            // y actualizamos su link
            $query="UPDATE eventos SET url = '$link' WHERE id = $id";

            // Ejecutamos nuestra sentencia sql
            $conexion->query($query)|| die($conexion->error); 
            // $dbaudi->query($query)|| die($dbaudi->error);
                

            // redireccionamos a nuestro calendario
            //header("Location:$base_url");
            echo "<script>location.href='$base_url'</script>";
        }

        //---------------------- PRUEBA PARA REPETIR UN EVENTO DE MANERA SEMANAL----------------------- //
        if ($repetir=="semanal") {

            //168 horas = 7 dias
            for($i=$inicio_normal;$i<=$final_normal;$i = date("Y-m-d H:i", strtotime($i ."+ 7 days"))){
                
                //a la fecha de inicio de la repeticion le sacamos los microsegundos
                $iniRep=strtotime($i)*(1000);
                // le sumamos una hora de diferencia para que pueda tener una agenda definida
                $ff=date("Y-m-d H:i", strtotime($i ."+ 1 hours"));
                //a la fecha de fin le sacamos los microsegundos
                $finRep=strtotime($ff)*(1000);



                // insertamos el evento
                $query="INSERT INTO eventos VALUES(null,'$concatec','$cliente','$usu','$body','','$clase','$iniRep','$finRep','$i','$ff')";

                // Ejecutamos nuestra sentencia sql
                
                $conexion->query($query)|| die($conexion->error); 

                //INSERTAR EVENTO DENTRO DE LA BASE DE DATOS DE AUDITORIA
                //sacar fecha y hora actual
                $hoy=date("Y-m-d h:i:sa");
                $regevento="INSERT INTO eventos VALUES(null,'$concatec','$cliente','$usu','$body','','$clase','$iniRep','$finRep','$i','$ff','R','$hoy','$usu')";
                //ejecuto conexion
                $dbaudi->query($regevento)|| die($dbaudi->error);

                // Obtenemos el ultimo id insertado
                $im=$conexion->query("SELECT MAX(id) AS id FROM eventos");
                $row = $im->fetch_row();  
                $id = trim($row[0]);

                // para generar el link del evento
                $link = "$base_url"."descripcion_evento.php?id=$id";

                // y actualizamos su link
                $query="UPDATE eventos SET url = '$link' WHERE id = $id";

                // Ejecutamos nuestra sentencia sql
                $conexion->query($query)|| die($conexion->error); 
                $dbaudi->query($query)|| die($dbaudi->error);
                    

            }
            echo "<script>location.href='$base_url'</script>";
        }
        //---------------------- FIN DE PRUEBA ----------------------- //

         
    }
}

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="../img/logo.png">
        <title>Calendario | Duwest</title>
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=$base_url?>css/calendar.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/main.css">
        <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Lato:400,700italic,100italic,300' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <script type="text/javascript" src="<?=$base_url?>js/es-ES.js"></script>
        <script src="<?=$base_url?>js/jquery.min.js"></script>
        <script src="<?=$base_url?>js/moment.js"></script>
        <script src="<?=$base_url?>js/bootstrap.min.js"></script>
        <script src="<?=$base_url?>js/bootstrap-datetimepicker.js"></script>
        <link rel="stylesheet" href="<?=$base_url?>css/bootstrap-datetimepicker.min.css" />
       <script src="<?=$base_url?>js/bootstrap-datetimepicker.es.js"></script>
       <script type="text/javascript" src="../Tools/maxLength/maxLength.js"></script>
    </head>

</head>
<body style="background: white;">
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
                    <li class="active"><a href="index.php">Reporte Programacion Semanal</a></li>
                    <li><a href="../user/actualizarcliente.php">Actualizar Cliente</a></li>

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
        <div class="container">

                <div class="row">
                        <div class="page-header"><h2></h2></div>
                                <div class="pull-left form-inline"><br>
                                        <div class="btn-group">
                                            <button class="btn btn-primary" data-calendar-nav="prev">Anterior</button>
                                            <button class="btn" data-calendar-nav="today">Hoy</button>
                                            <button class="btn btn-primary" data-calendar-nav="next">Siguiente</button>
                                        </div>
                                        <div class="btn-group">
                                            <button class="btn btn-warning" data-calendar-view="year">Año</button>
                                            <button class="btn btn-warning active" data-calendar-view="month">Mes</button>
                                            <button class="btn btn-warning" data-calendar-view="week">Semana</button>
                                            <button class="btn btn-warning" data-calendar-view="day">Dia</button>
                                        </div>

                                </div>
                                    <div class="pull-right form-inline" rel="tooltip" data-original-title="Pulsa aqui para programar una visita."><br>
                                        <button class="btn btn-info" id="btn_addEvento" data-toggle='modal' data-target='#add_evento'>Añadir Evento</button>
                                    </div>

                </div><hr>
                <script>
                $( document ).ready(function () {
                    $("#btn_addEvento").focus();
                    //$("*[rel=tooltip]").tooltip("show",{title: "Hooray", placement: "left",animation: true,trigger: "focus"});
                    $("*[rel=tooltip]").tooltip("show");
                    //$("*[rel=tooltip]").tooltip("show",{title: "Hooray", placement: "left",animation: true,trigger: "focus"});
                });
                </script>
                <div class="row">
                        <div id="calendar"></div> <!-- Aqui se mostrara nuestro calendario -->
                        <br><br>
                </div>

                <!--ventana modal para el calendario abre el evento registrado al hacer clic-->
                <div class="modal fade" id="events-modal">
                    <div class="modal-dialog">
                            <div class="modal-content">
                                    <div class="modal-body" style="height: 400px">
                                        <p>One fine body&hellip;</p>
                                    </div>
                                <div class="modal-footer">
                                    
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
        </div>

    <script src="<?=$base_url?>js/underscore-min.js"></script>
    <script src="<?=$base_url?>js/calendar.js"></script>
    <script type="text/javascript">
        (function($){
                //creamos la fecha actual
                var date = new Date();
                var yyyy = date.getFullYear().toString();
                var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
                var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

                //establecemos los valores del calendario
                var options = {

                    // definimos que los eventos se mostraran en ventana modal
                        modal: '#events-modal', 

                        // dentro de un iframe
                        modal_type:'iframe',    

                        //obtenemos los eventos de la base de datos
                        events_source: '<?=$base_url?>obtener_eventos.php', 

                        // mostramos el calendario en el mes
                        view: 'month',             

                        // y dia actual
                        day: yyyy+"-"+mm+"-"+dd,   


                        // definimos el idioma por defecto
                        language: 'es-ES', 

                        //Template de nuestro calendario
                        tmpl_path: '<?=$base_url?>tmpls/', 
                        tmpl_cache: false,


                        // Hora de inicio
                        time_start: '05:00', 

                        // y Hora final de cada dia
                        time_end: '22:00',   

                        // intervalo de tiempo entre las hora, en este caso son 30 minutos
                        time_split: '30',    

                        // Definimos un ancho del 100% a nuestro calendario
                        width: '100%', 

                        onAfterEventsLoad: function(events)
                        {
                                if(!events)
                                {
                                        return;
                                }
                                var list = $('#eventlist');
                                list.html('');

                                $.each(events, function(key, val)
                                {
                                        $(document.createElement('li'))
                                                .html('<a href="' + val.url + '">' + val.title + '</a>')
                                                .appendTo(list);
                                });
                        },
                        onAfterViewLoad: function(view)
                        {
                                $('.page-header h2').text(this.getTitle());
                                $('.btn-group button').removeClass('active');
                                $('button[data-calendar-view="' + view + '"]').addClass('active');
                        },
                        classes: {
                                months: {
                                        general: 'label'
                                }
                        }
                };

                
                
                // id del div donde se mostrara el calendario
                var calendar = $('#calendar').calendar(options); 

                $('.btn-group button[data-calendar-nav]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.navigate($this.data('calendar-nav'));
                        });
                });

                $('.btn-group button[data-calendar-view]').each(function()
                {
                        var $this = $(this);
                        $this.click(function()
                        {
                                calendar.view($this.data('calendar-view'));
                        });
                });


                $('#first_day').change(function()
                {
                        var value = $(this).val();
                        value = value.length ? parseInt(value) : null;
                        calendar.setOptions({first_day: value});
                        calendar.view();
                });
        }(jQuery));
    </script>

<div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success">
        <h4 class="modal-title" id="myModalLabel">Agregar nuevo evento</h4>
        
        <span>Todos los campos marcados con * son obligatorios</span>
      </div>
      <div class="modal-body">
        <form action="" method="post">
                    <label for="from">Inicio <span style="color:red;">*</span></label>
                    <div class='input-group date' id='from'>
                        <input type='text' id="from" name="from" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>

                    <br>

                    <label for="to">Final <span style="color:red;">*</span></label>
                    <div class='input-group date' id='to'>
                        <input type='text' name="to" id="to" class="form-control" readonly />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </div>

                    <br>
                    <label for="rep">Repetir Evento</label>
                    <span class="label label-danger">Para repetir evento seleccione la fecha de inicio en el dia a repetir y establesca una fecha de fin.</span>
                    
                    <select class="form-control" id="op" name="op">
                        <option value="nunca">Nunca</option>
                        <option value="semanal">Semanal</option>

                    </select>
                    <br>

                    <label for="tipo">Tipo de evento <span style="color:red;">*</span></label>
                    <select class="form-control" name="class" id="tipo">
                        <option value="event-info">Informativo</option>
                        <option value="event-success">Normal</option>
                        <!--ESTE ES EL EVENTO COLOR ROJO<option value="event-important">Muy importantante</option>-->
                        <option value="event-warning">Importante </option><!--evento amarillo-->
                        <option value="event-special">Especial</option>
                    </select>

                    <br>


                    <label for="title">Título <span style="color:red;">*</span></label>
                    <input type="text" required="required" autocomplete="off" name="title" class="form-control" id="title" placeholder="Introduce un título">

                    <br>

                    <br>
                    <label for="id_cliente">Seleccione un Cliente <span style="color:red;">*</span></label>
                    <select name="lst_cliente" class="form-control boton" onchange="mostrarValor(this.options[this.selectedIndex].innerHTML);">
                        <option value=""></option>
                        <?php 
                         require '../php/llenarcombos.php';

                         foreach ($resultado as $value) {?>
                         <option value="<?php echo $value['id_cliente'];?>"><?php echo utf8_encode($value['nom_cliente']);?></option>
                         
                        <?php
                    }

                    ?>
                    </select>

                    <br>
                     <!-- Este es el codigo que recoge el nombre del cliente seleccionado -->
                    <input type="hidden" name="ususelect" id="ususelect" value="" />
                    <script type="text/javascript">
                                     var mostrarValor = function(x){
                                        document.getElementById('ususelect').value=x;
                                        }
                    
                    </script>
                 
                    <!-- Aqui termina el codigo de recolectar el cliente -->
                    <label for="body">Evento <span style="color:red;">*</span></label>
                    <textarea id="body" name="event" required="required" class="form-control" rows="3"></textarea>
                    <center><label >Cantidad de caracteres permitidos: <div id="cont1" style="color:red;">300</div></label></center>

    <script type="text/javascript">
        $(function () {
            $('#from').datetimepicker({
                format: 'YYYY-MM-DD HH:mm',
                language: 'es',
               // daysOfWeekDisabled: [0, 5],

                minDate: new Date()
            });
            $('#to').datetimepicker({
                format: 'YYYY-MM-DD HH:mm',
                language: 'es',
                //daysOfWeekDisabled: [0, 5],

                minDate: new Date()
            });

        });
        $(function(){
            $("#body").maxLength(300, {showNumber:"#cont1"});

        });
    </script>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
        </form>
    </div>
  </div>
</div>
</div>
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
