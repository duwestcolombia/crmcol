<?php 
ob_start();
session_start();

$inicio_normal=$_POST['from'];
$final_normal=$_POST['to'];
$usu=$_POST['usu'];
$cliente=$_POST['cliente'];
$clase=$_POST['tipo'];
$titulo=$_POST['titulo'];
$body=$_POST['descrip'];

$concatec = $titulo;

date_default_timezone_set("America/Bogota");

/*require '../conexionbd.php';
include '../../calendar/funciones.php';*/

include '../../calendar/config.php';

$consulEmail=$conexion->query("SELECT * FROM usuario WHERE id_usuario='$usu'")or die($conexion->error);

while ($res=$consulEmail->fetch_assoc()) {
	$email=$res['email_usuario'];
}

if ($inicio_normal!="" AND $final_normal!="") 
    {
    	$inicio=strtotime($inicio_normal)*1000;

		$final=strtotime($final_normal)*1000;

		$query="INSERT INTO eventos VALUES(null,'$concatec','$cliente','$usu','$body','','$clase','$inicio','$final','$inicio_normal','$final_normal')";

		$conexion->query($query) or die($conexion->error);


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

		//Verifico si el titulo existe y si esta lleno, igual para el cuerpor o body 
		if (isset($titulo) && !empty($titulo) && isset($body) && !empty($body)) 
		{
		 	
			$destinatario = $email; 
			
			$asunto = "Nueva Tarea, Revisa la programacion de visitas"; 
			$cuerpo = ' 
			<html> 
				<head> 
			   		<title>Nueva notificacion</title> 
				</head> 
			<body> 
				<h1>Tienes una nueva tarea!</h1> 
				<p> 
				<b>Ingresa a la plataforma <a href="http://duwestcolombia.com">duwestcolombia.com</a> y revisa tu calendario en la pestaña programacion de visitas.
			 	Recuerda que puedes identificarlo con un punto de color <strong>Rojo</strong> 
				</p> 
			</body> 
			</html> 
			'; 

			//para el envío en formato HTML 
			$headers = "MIME-Version: 1.0\r\n"; 
			$headers .= "Content-type: text/html; charset=UTF-8\r\n"; 

			//dirección del remitente 
			$headers .= "From: DuwestColombia.com <duwestcolombia@vps.duwestcolombia.com>\r\n"; 

			//dirección de respuesta, si queremos que sea distinta que la del remitente 
			$headers .= "Reply-To: master@duwestcolombia.com\r\n"; 

			//ruta del mensaje desde origen a destino 
			//$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

			//direcciones que recibián copia 
			//$headers .= "Cc: maria@desarrolloweb.com\r\n"; 

			//direcciones que recibirán copia oculta 
			//$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; 

			if (mail($destinatario,$asunto,$cuerpo,$headers))
			{
				echo "<script>alert('Bien se ingreso esta tarea y se notifico por correo electronico.')</script>";
			}
			else
			{
				echo "<script>alert('Algo paso y no se pudo enviar el correo.')</script>";
				
			}
		 	//----------------------------------------------------------------------
		 	/*$destino="david.zambrano@duwest.com.co";
		 	$desde= "From:" . "WebMaster";
		 	$asunto=$titulo;
		 	$mensaje=$body;

		 	mail($destino, $asunto, $mensaje, $desde);

		 	echo "<script>alert('Bien se ingreso esta tarea y se notifico por correo.')</script>";
		 }
		 else
		 {
		 	echo "<script>alert('Error, No se envio el correo, pero si se guardaron los datos.')</script>";
		 } */
		}
	}

/* cerrar la conexión */
$conexion->close();

ob_end_flush();
?>