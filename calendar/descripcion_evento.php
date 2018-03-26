<?php
session_start();
    require '../php/conexionbdaudi.php';
    //incluimos nuestro archivo config
    include 'config.php'; 

    // Incluimos nuestro archivo de funciones
    include 'funciones.php';

    //Fecha y horas actuales
    date_default_timezone_set("America/Bogota");
    $hoy=date("Y-m-d h:i:sa");

    //Usuario activo por sesion
    $usu=$_SESSION['usuario_sesion'];

    // Obtenemos el id del evento
    $id  = evaluar($_GET['id']);

    // y lo buscamos en la base de dato
    $bd  = $conexion->query("SELECT * FROM eventos WHERE id=$id");

    // Obtenemos los datos
    $row = $bd->fetch_assoc();

    // titulo 
    $titulo=$row['title'];

    //Obtener id cliente
    $idcliente=$row['id_cliente'];

    //obtener id usuario
    $idusuario=$row['id_usuario'];

    // cuerpo
    $evento=$row['body'];

    //obtener URL
    $url=$row['url'];

      //obtener clase
    $clase=$row['class'];

      //obtener inicio microsegundos
    $iniciomicro=$row['start'];

      //obtener fin microsegundos
    $finmicro=$row['end'];

      // Fecha inicio
    $inicio=$row['inicio_normal'];

    // Fecha Termino
    $final=$row['final_normal'];

// Eliminar evento
if (isset($_POST['eliminar_evento'])) 
{
    $id  = evaluar($_GET['id']);
    $sql = "DELETE FROM eventos WHERE id = $id";
    if ($conexion->query($sql)) 
    {
        $inserevento="INSERT INTO eventos VALUES(null,'$titulo','$idcliente','$idusuario','$evento','$url','$clase','$iniciomicro','$finmicro','$inicio','$final','E','$hoy','$usu')";
        $dbaudi->query($inserevento)|| die($dbaudi->error);
        echo '<div class="alert alert-warning fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Evento eliminado!</strong> Carga la pagina para actualizar.
        </div>';    
        //echo "Evento eliminado";

    }
    else
    {
        echo '<div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> No se pudo eliminar este registro.
        </div>'; 
        //echo "El evento no se pudo eliminar";
    }
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700italic,100italic,300' rel='stylesheet' type='text/css'>
    

	<title><?=$titulo?></title>
</head>
<body>
	 <b><h3><?=$titulo?></h3></b>
	 <hr>
     <b>Fecha inicio:</b> <?php echo $inicio?>
     &nbsp;
     &nbsp;
     &nbsp;
     <b>Fecha Finalización:</b> <?=$final?>
     <hr>
 	 <p><?=$evento?></p>
    
</body>
<form action="" method="post">
    <button type="submit" class="btn btn-danger" name="eliminar_evento">Eliminar Evento</button>
</form>
</html>
