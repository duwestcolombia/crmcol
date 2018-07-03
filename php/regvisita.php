<?php
error_reporting(0);
session_start();
require 'conexionbd.php';
require 'conexionbdaudi.php';

$fvisita=$_POST['fvisita'];
$sitzona=$_POST['txtsitzona'];
$scompetencia=$_POST['txtcompetencia'];
$rvisita=$_POST['txtvisita'];
$usuario=$_POST['txt_nomusuario'];
$cliente=$_POST['lst_cliente'];
$esporadico=$_POST['nom_esporadico'];
$usu=$_SESSION['usuario_sesion'];
date_default_timezone_set("America/Bogota");
$hoy=date("Y-m-d h:i:sa");


//comprobar que los campos obligatorios no esten vacios en el if
// en el else se indica que hacer si esta vacio.
if (!empty($cliente)) {//Si contiene un valor, entra aqui
	if (!empty($fvisita)) {//Si contiene un valor, entra aqui
		if (!empty($sitzona)) {
			if (!empty($scompetencia)) {
				if (!empty($rvisita)) {

					#Insertar datos a través de la sentencia INSERT
					$insertar = "INSERT INTO visita(id_visita, fecha_visita, sitzona_visita, sitcompetencia_visita, rvisita_visita,id_usuario, id_cliente,nomesporadico_visita)
					VALUES(NULL, '$fvisita', '$sitzona', '$scompetencia', '$rvisita', '$usuario', '$cliente','$esporadico')";
					$resultado = $db -> query($insertar)|| die($db->error);

					/*$insertauditoria="INSERT INTO visita(id_visita, fecha_visita, sitzona_visita, sitcompetencia_visita, rvisita_visita,id_usuario, id_cliente,nomesporadico_visita, tiporeg_visita, freg_visita, usureg_visita) 
						VALUES(NULL, '$fvisita', '$sitzona','$scompetencia', '$rvisita', '$usuario','$cliente','$esporadico','R','$hoy','$usu')";
						$resultauditoria = $dbaudi->query($insertauditoria)|| die($dbaudi->error);
					*/
					if($resultado)
						{
							/*if ($resultauditoria) {
								//echo '<script>alert("Datos Insertados Correctamente")</script>';
							echo "<script>location.href='../user/repvisitas.php'</script>";
							#echo "Enhorabuena, la acción ha sido llevada a cabo con éxito";
							}
							else
							{
								echo "Error en registro Camp Auditoria";
							}*/
							echo "<script>location.href='../user/repvisitas.php'</script>";
						}

					else
						{

							echo "Ha ocurrido un error al insertar el registro";
						}
				}
				else
				{
					echo '<script>alert("El campo reporte de visita esta vacio, por favor diligenciar antes de continuar.");</script>';
				}
			}
			else
			{
				echo '<script>alert("La situación de la competencia no se ha diligenciado, por favor diligenciar antes de continuar.");</script>';
			}
		}
		else
		{
			echo '<script>alert("La situación de la zona no se ha diligenciado, por favor diligenciar antes de continuar.");</script>';
		}
	}
	else
	{
		echo '<script>alert("El campo fecha esta vacio, seleccione una fecha para continuar.");</script>';
	}
}
else
{
	echo '<script>alert("Seleccione un cliente para esta visita.");</script>';
}




?>