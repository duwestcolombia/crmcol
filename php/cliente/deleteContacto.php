<?php 
session_start();
if(!$_SESSION)
{
	//header("location:../ingreso.php");
	echo "<script>location.href='../ingreso.php'</script>";
}
require '../conexionbd.php';
require '../conexionbdaudi.php';

$idContacto=$_POST['idContacto'];

$delete=$db->query("DELETE FROM contacto WHERE id_contacto='$idContacto'")or die("Error al eliminar el Contacto : " . $db->error);

if ($delete) {
	echo '<div class="alert alert-success fade in">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
       <strong>Contacto eliminado!</strong> Bien, tu contacto acaba de ser eliminado.
        </div>';
}

?>