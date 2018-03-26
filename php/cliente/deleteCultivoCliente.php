<?php 
session_start();
if(!$_SESSION)
{
	//header("location:../ingreso.php");
	echo "<script>location.href='../ingreso.php'</script>";
}
require '../conexionbd.php';
require '../conexionbdaudi.php';

$idClienteCultivo=$_POST['idClienteCultivo'];

$delete=$db->query("DELETE FROM cliente_cultivo WHERE id_clientecultivo='$idClienteCultivo'")or die("Error al eliminar el cultivo : " . $db->error);

if ($delete) {
	echo '<div class="alert alert-warning fade in">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
       <strong>Cliente actualizado!</strong> Cultivo Eliminado Correctamente.
        </div>';
}

 ?>