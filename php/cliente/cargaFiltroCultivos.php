<?php
require '../conexionbd.php';
$cliente=$_POST['idCliente'];
$consulCul=$db->query("SELECT c.id_cliente, cul.id_cultivo,cul.nom_cultivo, cc.id_cultivo,cc.id_cliente
						FROM cliente c, cultivo cul, cliente_cultivo cc
						WHERE c.id_cliente='$cliente'
						AND cc.id_cliente=c.id_cliente
						AND cul.id_cultivo=cc.id_cultivo
						GROUP BY cc.id_cultivo") or die('Error al cargar el Cultivo, revise que tiene cultivos asociados ' . $db->error);

// echo '<select class="form-control" id="lista_cultivo">';
	 			  			
	 			  
while ($resCul=$consulCul->fetch_assoc()) {
		echo '<option value="'.$resCul['id_cultivo'].'" >'.utf8_encode($resCul['nom_cultivo']).'</option>';
}

//echo '</select>';




?>