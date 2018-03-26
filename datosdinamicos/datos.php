<?php 
$servidor='localhost';//Tu servidor
$usuario='root';//Nombre de usuario de la base de dato
$pass='andres21';//Clave de tu usuario
$bd='datos';//Nombre de la base de datos
$conexion = new mysqli($servidor, $usuario, $pass, $bd);//Nos conectamos a la bas de dato
$conexion->set_charset('utf8');//Codificamos los caracteres en UTF8
if ($conexion->connect_errno) {//Preguntamos si hubi un error
	echo "Error al conectar la base de datos {$conexion->connect_errno}";//Si hay un error, lo mostramos
}


  if (isset($_POST['datosForm'])) {//Comprobamos que se haya enviado el form, ID del Boton enviar
      for($i=0;$i<=count($_POST["nombre"])-1;$i++)://Cambiar por el name del primer input de tu form sin []
    $conexion->query("INSERT INTO datos VALUES (NULL, '".$conexion->real_escape_string($_POST["nombre"][$i])."', '".$conexion->real_escape_string($_POST["telefono"][$i])."', '".$conexion->real_escape_string($_POST["direccion"][$i])."')");

  echo "Nombre:&nbsp".$_POST["nombre"][$i]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telefono:&nbsp;".$_POST["telefono"][$i]."<br>";
  endfor; 
  } 
 ?>




