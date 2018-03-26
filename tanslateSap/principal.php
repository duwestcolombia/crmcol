<?php 
require('config.php');
//require '../php/conexionbd.php';

$acum = 0;
$acum2 = 0;
$acum3 = 0;

$acumCli=0;
$acumRep=0;

$clisinven=0;

$db=new mysqli("duwestcolombia.com","duwestco_duwest","Duwest01*","duwestco_pruebavisitas");
if($db->connect_errno){
	die('No se Pudo Conectar con la base de datos ' . $db->connect_errno);
	//echo "Fallo al conectar a Base de Datos: " . $mysqli->connect_error;
	mysqli_close($db);
}

$querySAP = $db->query("SELECT * FROM dataSAP ORDER BY ID_CTE DESC LIMIT 0 ,2000")or die($db->error);

//COn esta consulta hago la compracion, me busca los valores dentro de la tabla sap que no esten en la tabla cliente
$queryCli = $db->query("Select dataSAP.ID_CTE, dataSAP.CLIENTE,dataSAP.CTE_NOM,dataSAP.VEN_NOM, dataSAP.ZONA
						FROM dataSAP 
						WHERE dataSAP.ID_CTE 
						NOT IN(select cliente.id_cliente from cliente)")or die($db->error);

//COn esta consulta hago la compracion, me busca los valores dentro de la tabla sap que no esten en la tabla cliente
$queryCliRep = $db->query("Select dataSAP.ID_CTE, dataSAP.CLIENTE,dataSAP.CTE_NOM,dataSAP.VEN_NOM 
						FROM dataSAP 
						WHERE dataSAP.ID_CTE 
						IN(select cliente.id_cliente from cliente)")or die($db->error);

$acumRep=$queryCliRep->num_rows;



/*if ($resul>0) {
	$acumCli=$resul;
			
}
else{
	$acumRep++;
}
*/
		

$master = new maestroSap();


while ($res=$querySAP->fetch_assoc()) {
	
	$zon=$res['ZONA'];
	$ram=$res['RAMO'];
	//Le paso a la funcion Translate los datos que necesito traducir
	$master->translate($zon,$ram);

	$sql='Update ......('.$master->getIdmun().',"'.$master->getNomun().'","'.$master->getRamo().'","'.$res['CTE_NOM'].'")';
	
	
	//Realizo la insercion de los datos
	
	echo $sql;

	echo '<br>';

/*
	if ($master->getNomun()=="Flores") {
		$acum = $acum + 1;
	}
	else if ($master->getNomun()=="Cundinamarca") {
		$acum2=$acum2+1;
	}*/

	//$id=$res['ID_CTE'];

	$acum3=$acum3+1;
		

	//Preparo la sentencia SQL
/*
	$sql='Update ......('.$master->getIdmun().',"'.$master->getNomun().'","'.$master->getRamo().'","'.$res['CTE_NOM'].'")';
	
	$acum3=$acum3+1;
	//Realizo la insercion de los datos
	
	echo $sql;

	echo '<br>';*/
}

while ($clino=$queryCli->fetch_assoc()) {
	
	if ($clino['VEN_NOM']=="") {
		$clisinven++;
	}
	else
	{
	
		echo $clino['ID_CTE'].',';
		echo $clino['CLIENTE'].',';
		echo $clino['CTE_NOM'].',';
		echo $clino['ZONA'].',';
		echo $clino['VEN_NOM'].'<br>';

		$acumCli++;
	}

}



echo '<hr>';
echo "Total de registros=> ". $acum3 . " ";
echo '<br>';

/*echo "Flores tiene: ". $acum . " Regristros";
echo '<br>';echo '<hr>';
echo "Cundinamarca tiene: ". $acum2 . " Regristros";
echo '<br>';*/

echo '<br>';echo '<hr>';
echo "Clientes repetidos : ". $acumRep . " ";
echo '<br>';

echo '<br>';echo '<hr>';
echo "Clientes nuevos : ". $acumCli . " ";
echo '<br>';

echo '<br>';  echo '<hr>';
echo 'Clientes sin vendedor: '.$clisinven." ";
echo '<br>';

/*Cerrar la conexion*/
mysqli_close($db);



?>