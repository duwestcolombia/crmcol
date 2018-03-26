<?php 
session_start();
require 'conexionbd.php';

$usu=$_POST['usu'];
$pass=$_POST['pass'];
$pass2=$_POST['pass2'];
if ($pass==$pass2) 
{
	$pass=md5($pass);
	$update=$db->query("UPDATE usuario SET password='$pass' WHERE id_usuario='$usu'")or die($db->error);
	if ($update)
	{
		echo '<div class="alert alert-success fade in">
	       <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	       <strong>Contraseña Modificada!</strong> La contraseña fue modificada correctamente.
	        </div>';
	}
	else
	{
		echo '<div class="alert alert-success fade in">
		       <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		       <strong>Error Contraseña!</strong> Se presento un problema al modificar la contraseña.
		        </div>';
	}
	
}
else
{
	exit;
}
?>