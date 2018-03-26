<?php 
ob_start();
$correo=$_POST['correo'];
$asun=$_POST['asunto'];
$contenido=$_POST['contenido'];

if (isset($correo) && !empty($correo) && isset($asun) && !empty($asun) && isset($contenido) && !empty($contenido)) 
{

	$destinatario = $correo; 
	
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
		echo 'se envio el mensaje' . $correo;
	}
	else
	{
		echo 'Algo paso y no se envio el correo';
	}
	/*$destino=$correo;
	$asunto=$asun;
	$mensaje=$contenido;
	$desde="From:"."WebMaster";

	mail($destino, $asunto, $mensaje, $desde);*/
	
}
else
{
	echo 'Error, no se envio el correo';
}
ob_end_flush();
?>