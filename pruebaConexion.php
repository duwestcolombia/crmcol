<?php

	$db=new mysqli("duwestcolombia.com","duwestco_duwest","Duwest01*","duwestco_pruebavisitas");
	if($db->connect_errno){
		die('No se Pudo Conectar con la base de datos ' . $db->connect_errno);

		$db -> mysqli_close();
	}
	else{
		echo "conexion exitosa";
		//$db -> mysqli_close();

?>	


