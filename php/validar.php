<?php
session_start();
ob_start();
//Con la linea anterior ya puedo usar los headers online
require 'conexionbd.php';
require 'conexionbdaudi.php';
error_reporting(0);
//meta charset="utf-8"
//$usuario=$_POST['txtidusuario'];
$usuario=$_POST['txtidusuario'];
$password=md5($_POST['txtpass']);

$resultado=$db->query("SELECT * FROM usuario WHERE sesion_usuario='$usuario'");

if ($resultado->num_rows > 0) {
	foreach ($resultado as $res) {
		if ($res['password'] == $password) {
			
			switch ($res['id_rol']) {
							case 0:
								//echo '<script>alert("Bienvenido '.$usuenc.'")</script>';
								$_SESSION['usuario_sesion'] =$res['id_usuario'];
								$_SESSION['password_sesion']=$res['password'];
								$_SESSION['tipusuario_sesion']=$res['id_rol'];
								$_SESSION['zona_sesion']=$res['id_zona'];
								$usuok=$_SESSION['usuario_sesion'];
								date_default_timezone_set("America/Bogota");
								$hoy=date("Y-m-d h:i:sa");
								$reglog=$dbaudi->query("INSERT Into log(id_log,nom_log,fecha_log,id_usuario) values(NULL,'Ingreso al sistema','$hoy','$usuok')")or die($dbaudi->error);
								if ($reglog) {
									header("location:../superuser/dashboard/index.php");
									//echo "<script>location.href='../repvisitas.php'</script>";
								}
								else
								{
									echo $dbaudi->error;
								}
										
							break;
							case 1:
								//echo '<script>alert("Bienvenido '.$usuenc.'")</script>';
								$_SESSION['usuario_sesion'] =$res['id_usuario'];
								$_SESSION['password_sesion']=$res['password'];
								$_SESSION['tipusuario_sesion']=$res['id_rol'];
								$_SESSION['zona_sesion']=$res['id_zona'];
								$usuok=$_SESSION['usuario_sesion'];
								date_default_timezone_set("America/Bogota");
								$hoy=date("Y-m-d h:i:sa");
								$reglog=$dbaudi->query("INSERT Into log(id_log,nom_log,fecha_log,id_usuario) values(NULL,'Ingreso al sistema','$hoy','$usuok')")or die($dbaudi->error);
								if ($reglog) {
									header("location:../superuser/dashboard/index.php");
									//echo "<script>location.href='../repvisitas.php'</script>";
								}
								else
								{
									echo $dbaudi->error;
								}
										
							break;
							case 2:
							//VALIDA LIDER CON UN TERRITORIO
								//echo '<script>alert("Bienvenido Lider territorio")</script>';
								$_SESSION['usuario_sesion'] =$res['id_usuario'];
								$_SESSION['password_sesion']=$res['password'];
								$_SESSION['tipusuario_sesion']=$res['id_rol'];
								$_SESSION['zona_sesion']=$res['id_zona'];
								$usuok=$_SESSION['usuario_sesion'];
								date_default_timezone_set("America/Bogota");
								$hoy=date("Y-m-d h:i:sa");
								$reglog=$dbaudi->query("INSERT Into log(id_log,nom_log,fecha_log,id_usuario) values(NULL,'Ingreso al sistema','$hoy','$usuok')")or die($dbaudi->error);
								if ($reglog) {
									header("location:../admin/dashboard/index.php");
									//echo "<script>location.href='../repvisitas.php'</script>";
								}
								else
								{
									echo $dbaudi->error;
								}
								//echo "<script>location.href='../repvisitas.php'</script>";
				
							break;
							case 3:
							//VALIDA LIDER BOYACA Y CUNDINAMARCA
								//echo '<script>alert("Bienvenido Lider territorio")</script>';
								$_SESSION['usuario_sesion'] =$res['id_usuario'];
								$_SESSION['password_sesion']=$res['password'];
								$_SESSION['tipusuario_sesion']=$res['id_rol'];
								$_SESSION['zona_sesion']=$res['id_zona'];
								$usuok=$_SESSION['usuario_sesion'];
								date_default_timezone_set("America/Bogota");
								$hoy=date("Y-m-d h:i:sa");
								$reglog=$dbaudi->query("INSERT Into log(id_log,nom_log,fecha_log,id_usuario) values(NULL,'Ingreso al sistema','$hoy','$usuok')")or die($dbaudi->error);
								if ($reglog) {
									header("location:../admin/dashboard/index.php");
									//echo "<script>location.href='../repvisitas.php'</script>";
								}
								else
								{
									echo $dbaudi->error;
								}
								//echo "<script>location.href='../repvisitas.php'</script>";
							break;
							case 4:
							//VALIDA LIDER FLORES SABANA Y FLORES ANTIOQUIA
								//echo '<script>alert("Bienvenido Lider territorio")</script>';
								$_SESSION['usuario_sesion'] =$res['id_usuario'];
								$_SESSION['password_sesion']=$res['password'];
								$_SESSION['tipusuario_sesion']=$res['id_rol'];
								$_SESSION['zona_sesion']=$res['id_zona'];
								$usuok=$_SESSION['usuario_sesion'];
								date_default_timezone_set("America/Bogota");
								$hoy=date("Y-m-d h:i:sa");
								$reglog=$dbaudi->query("INSERT Into log(id_log,nom_log,fecha_log,id_usuario) values(NULL,'Ingreso al sistema','$hoy','$usuok')")or die($dbaudi->error);
								if ($reglog) {
									header("location:../admin/dashboard/index.php");
									//echo "<script>location.href='../repvisitas.php'</script>";
								}
								else
								{
									echo $dbaudi->error;
								}
								//echo "<script>location.href='../repvisitas.php'</script>";
							break;	
							case 5:
								//VALIDA LIDER NARIÑO CAUCA Y HUILA
									//echo '<script>alert("Bienvenido Lider territorio")</script>';
									$_SESSION['usuario_sesion'] =$res['id_usuario'];
									$_SESSION['password_sesion']=$res['password'];
									$_SESSION['tipusuario_sesion']=$res['id_rol'];
									$_SESSION['zona_sesion']=$res['id_zona'];
									$usuok=$_SESSION['usuario_sesion'];
									date_default_timezone_set("America/Bogota");
									$hoy=date("Y-m-d h:i:sa");
									$reglog=$dbaudi->query("INSERT Into log(id_log,nom_log,fecha_log,id_usuario) values(NULL,'Ingreso al sistema','$hoy','$usuok')")or die($dbaudi->error);
									if ($reglog) {
										header("location:../admin/dashboard/index.php");
										//echo "<script>location.href='../repvisitas.php'</script>";
									}
									else
									{
										echo $dbaudi->error;
									}
									//echo "<script>location.href='../repvisitas.php'</script>";
							break;
							case 6:
								//echo '<script>alert("Bienvenido Representante tecnico")</script>';
								$_SESSION['usuario_sesion'] =$res['id_usuario'];
								$_SESSION['password_sesion']=$res['password'];
								$usuok=$_SESSION['usuario_sesion'];
								date_default_timezone_set("America/Bogota");
								$hoy=date("Y-m-d h:i:sa");
								$reglog=$dbaudi->query("INSERT Into log(id_log,nom_log,fecha_log,id_usuario) values(NULL,'Ingreso al sistema','$hoy','$usuok')")or die($dbaudi->error);
								if ($reglog) {
									header("location:../user/repvisitas.php");
									//echo "<script>location.href='../repvisitas.php'</script>";
								}
								else
								{
									echo $dbaudi->error;
								}
								
								//echo "<script>location.href='../repvisitas.php'</script>";
							break;
							case 7:
								//echo '<script>alert("Bienvenido Promotor")</script>';
								$_SESSION['usuario_sesion'] =$res['id_usuario'];
								$_SESSION['password_sesion']=$res['password'];
								$usuok=$_SESSION['usuario_sesion'];
								date_default_timezone_set("America/Bogota");
								$hoy=date("Y-m-d h:i:sa");
								$reglog=$dbaudi->query("INSERT Into log(id_log,nom_log,fecha_log,id_usuario) values(NULL,'Ingreso al sistema','$hoy','$usuok')")or die($dbaudi->error);
								if ($reglog) {
									header("location:../user/repvisitas.php");
									//echo "<script>location.href='../repvisitas.php'</script>";
								}
								else
								{
									echo $dbaudi->error;
								}
								
								//echo "<script>location.href='../repvisitas.php'</script>";
							break;
						}
			


		} else {
			echo '<script>alert("Contraseña Incorrecta")</script>';
			echo "<script>location.href='../ingreso.php'</script>";
		}
		


	}
} else {
	echo '<script>alert("Usuario no encontrado")</script>';
	echo "<script>location.href='../ingreso.php'</script>";
}
	
// }
// if ($usuenc==$usuario) 
// {
// 	if ($passenc==$password) 
// 	{
// 		switch ($tipusuario) {
// 			case 0:
// 				//echo '<script>alert("Bienvenido '.$usuenc.'")</script>';
// 				$_SESSION['usuario_sesion'] =$_POST['txtidusuario'];
// 				$_SESSION['password_sesion']=$_POST['txtpass'];
// 				$_SESSION['tipusuario_sesion']=$tipusuario;
// 				$_SESSION['zona_sesion']=$zona;
// 				$usuok=$_SESSION['usuario_sesion'];
// 				date_default_timezone_set("America/Bogota");
// 				$hoy=date("Y-m-d h:i:sa");
// 				$reglog=$dbaudi->query("INSERT Into log(id_log,nom_log,fecha_log,id_usuario) values(NULL,'Ingreso al sistema','$hoy','$usuok')")or die($dbaudi->error);
// 				if ($reglog) {
// 					header("location:../superuser/dashboard/index.php");
// 					//echo "<script>location.href='../repvisitas.php'</script>";
// 				}
// 				else
// 				{
// 					echo $dbaudi->error;
// 				}
						
// 			break;
// 			case 1:
// 				//echo '<script>alert("Bienvenido '.$usuenc.'")</script>';
// 				$_SESSION['usuario_sesion'] =$_POST['txtidusuario'];
// 				$_SESSION['password_sesion']=$_POST['txtpass'];
// 				$_SESSION['tipusuario_sesion']=$tipusuario;
// 				$_SESSION['zona_sesion']=$zona;
// 				$usuok=$_SESSION['usuario_sesion'];
// 				date_default_timezone_set("America/Bogota");
// 				$hoy=date("Y-m-d h:i:sa");
// 				$reglog=$dbaudi->query("INSERT Into log(id_log,nom_log,fecha_log,id_usuario) values(NULL,'Ingreso al sistema','$hoy','$usuok')")or die($dbaudi->error);
// 				if ($reglog) {
// 					header("location:../superuser/dashboard/index.php");
// 					//echo "<script>location.href='../repvisitas.php'</script>";
// 				}
// 				else
// 				{
// 					echo $dbaudi->error;
// 				}
						
// 			break;
// 			case 2:
// 			//VALIDA LIDER CON UN TERRITORIO
// 				//echo '<script>alert("Bienvenido Lider territorio")</script>';
// 				$_SESSION['usuario_sesion'] =$_POST['txtidusuario'];
// 				$_SESSION['password_sesion']=$_POST['txtpass'];
// 				$_SESSION['tipusuario_sesion']=$tipusuario;
// 				$_SESSION['zona_sesion']=$zona;
// 				$usuok=$_SESSION['usuario_sesion'];
// 				date_default_timezone_set("America/Bogota");
// 				$hoy=date("Y-m-d h:i:sa");
// 				$reglog=$dbaudi->query("INSERT Into log(id_log,nom_log,fecha_log,id_usuario) values(NULL,'Ingreso al sistema','$hoy','$usuok')")or die($dbaudi->error);
// 				if ($reglog) {
// 					header("location:../admin/dashboard/index.php");
// 					//echo "<script>location.href='../repvisitas.php'</script>";
// 				}
// 				else
// 				{
// 					echo $dbaudi->error;
// 				}
// 				//echo "<script>location.href='../repvisitas.php'</script>";

// 			break;
// 			case 3:
// 			//VALIDA LIDER BOYACA Y CUNDINAMARCA
// 				//echo '<script>alert("Bienvenido Lider territorio")</script>';
// 				$_SESSION['usuario_sesion'] =$_POST['txtidusuario'];
// 				$_SESSION['password_sesion']=$_POST['txtpass'];
// 				$_SESSION['tipusuario_sesion']=$tipusuario;
// 				$_SESSION['zona_sesion']=$zona;
// 				$usuok=$_SESSION['usuario_sesion'];
// 				date_default_timezone_set("America/Bogota");
// 				$hoy=date("Y-m-d h:i:sa");
// 				$reglog=$dbaudi->query("INSERT Into log(id_log,nom_log,fecha_log,id_usuario) values(NULL,'Ingreso al sistema','$hoy','$usuok')")or die($dbaudi->error);
// 				if ($reglog) {
// 					header("location:../admin/dashboard/index.php");
// 					//echo "<script>location.href='../repvisitas.php'</script>";
// 				}
// 				else
// 				{
// 					echo $dbaudi->error;
// 				}
// 				//echo "<script>location.href='../repvisitas.php'</script>";
// 			break;
// 			case 4:
// 			//VALIDA LIDER FLORES SABANA Y FLORES ANTIOQUIA
// 				//echo '<script>alert("Bienvenido Lider territorio")</script>';
// 				$_SESSION['usuario_sesion'] =$_POST['txtidusuario'];
// 				$_SESSION['password_sesion']=$_POST['txtpass'];
// 				$_SESSION['tipusuario_sesion']=$tipusuario;
// 				$_SESSION['zona_sesion']=$zona;
// 				$usuok=$_SESSION['usuario_sesion'];
// 				date_default_timezone_set("America/Bogota");
// 				$hoy=date("Y-m-d h:i:sa");
// 				$reglog=$dbaudi->query("INSERT Into log(id_log,nom_log,fecha_log,id_usuario) values(NULL,'Ingreso al sistema','$hoy','$usuok')")or die($dbaudi->error);
// 				if ($reglog) {
// 					header("location:../admin/dashboard/index.php");
// 					//echo "<script>location.href='../repvisitas.php'</script>";
// 				}
// 				else
// 				{
// 					echo $dbaudi->error;
// 				}
// 				//echo "<script>location.href='../repvisitas.php'</script>";
// 			break;	
// 			case 5:
// 				//VALIDA LIDER NARIÑO CAUCA Y HUILA
// 					//echo '<script>alert("Bienvenido Lider territorio")</script>';
// 					$_SESSION['usuario_sesion'] =$_POST['txtidusuario'];
// 					$_SESSION['password_sesion']=$_POST['txtpass'];
// 					$_SESSION['tipusuario_sesion']=$tipusuario;
// 					$_SESSION['zona_sesion']=$zona;
// 					$usuok=$_SESSION['usuario_sesion'];
// 					date_default_timezone_set("America/Bogota");
// 					$hoy=date("Y-m-d h:i:sa");
// 					$reglog=$dbaudi->query("INSERT Into log(id_log,nom_log,fecha_log,id_usuario) values(NULL,'Ingreso al sistema','$hoy','$usuok')")or die($dbaudi->error);
// 					if ($reglog) {
// 						header("location:../admin/dashboard/index.php");
// 						//echo "<script>location.href='../repvisitas.php'</script>";
// 					}
// 					else
// 					{
// 						echo $dbaudi->error;
// 					}
// 					//echo "<script>location.href='../repvisitas.php'</script>";
// 			break;
// 			case 6:
// 				//echo '<script>alert("Bienvenido Representante tecnico")</script>';
// 				$_SESSION['usuario_sesion'] =$_POST['txtidusuario'];
// 				$_SESSION['password_sesion']=$_POST['txtpass'];
// 				$usuok=$_SESSION['usuario_sesion'];
// 				date_default_timezone_set("America/Bogota");
// 				$hoy=date("Y-m-d h:i:sa");
// 				$reglog=$dbaudi->query("INSERT Into log(id_log,nom_log,fecha_log,id_usuario) values(NULL,'Ingreso al sistema','$hoy','$usuok')")or die($dbaudi->error);
// 				if ($reglog) {
// 					header("location:../user/repvisitas.php");
// 					//echo "<script>location.href='../repvisitas.php'</script>";
// 				}
// 				else
// 				{
// 					echo $dbaudi->error;
// 				}
				
// 				//echo "<script>location.href='../repvisitas.php'</script>";
// 			break;
// 			case 7:
// 				//echo '<script>alert("Bienvenido Promotor")</script>';
// 				$_SESSION['usuario_sesion'] =$_POST['txtidusuario'];
// 				$_SESSION['password_sesion']=$_POST['txtpass'];
// 				$usuok=$_SESSION['usuario_sesion'];
// 				date_default_timezone_set("America/Bogota");
// 				$hoy=date("Y-m-d h:i:sa");
// 				$reglog=$dbaudi->query("INSERT Into log(id_log,nom_log,fecha_log,id_usuario) values(NULL,'Ingreso al sistema','$hoy','$usuok')")or die($dbaudi->error);
// 				if ($reglog) {
// 					header("location:../user/repvisitas.php");
// 					//echo "<script>location.href='../repvisitas.php'</script>";
// 				}
// 				else
// 				{
// 					echo $dbaudi->error;
// 				}
				
// 				//echo "<script>location.href='../repvisitas.php'</script>";
// 			break;
// 		}
		
// 	}
// 	else
// 	{
// 		echo '<script>alert("Contraseña Incorrecta")</script>';
// 		//echo $password;
// 		echo "<script>location.href='../ingreso.php'</script>";
// 		//Este metodo regrasa el tiempo en consultar un dato sleep(15);
// 		//Este metodo me permite regresar a la pagina que necesite pero no muestra el mensaje de error header("location:../ingreso.phphtml");

		
// 	}
		
// }
// else
// {
// 			echo '<script>alert("Usuario no encontrado")</script>';
// 			//echo "<script>location.href='../ingreso.php'</script>";
// }





ob_end_flush();
//Con esta linea ya puedo utilizar los headers

?>