<?php
session_start();
//error_reporting(0);
require 'conexionbd.php';
$usu=$_SESSION['usuario_sesion'];
$usuconsulta=$_POST['usuario'];
//echo $usuconsulta;

if ($usuconsulta!=null) {
	$resultado=$db->query("SELECT cm.id_cliente,c.cod_cliente, cm.id_usuario ,c.nom_cliente 
		FROM 
		cliente c, cliente_municipio cm 
		WHERE
		cm.id_cliente=c.id_cliente and
		cm.id_usuario='$usuconsulta'
		ORDER By c.nom_cliente ASC") or die($db->error);
		echo '<select name="lst_consulcliente" id="lst_consulcliente" class="form-control" required="required">';
										
					while ($res = $resultado->fetch_assoc()){
						echo '<option value="'.$res['id_cliente'].'">'.utf8_encode($res['nom_cliente']).'</option>';
					}	
									
		echo '</select>';
	
}
else
{
/*if($usu!=null)
{*/
$resultado=$db->query("SELECT cm.id_cliente,c.cod_cliente, cm.id_usuario ,c.nom_cliente 
	FROM 
	cliente c, cliente_municipio cm 
	WHERE
	cm.id_cliente=c.id_cliente and
	cm.id_usuario='$usu'
	ORDER By c.nom_cliente ASC") or die($db->error);
	
	$resul = $resultado->fetch_All();
	foreach ($resultado as $key => $value) {
		
	}

/*}
else
{
	echo '<script>alert("Se presento una Falla en la Sesion, Infiltrado detectado: '.$usu.'")</script>';
}
*/
}
//Libero memoria con esta sentecia despues de una consulta
//mysqli_free_result($resultado);
//cierro la conexion
//mysqli_close($db);

?>


