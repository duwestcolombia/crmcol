<?php 
session_start();
require '../conexionbd.php';
require '../conexionbdaudi.php';

$id=$_POST['txtid'];
$nom=$_POST["txtnombre"];
$tip=$_POST["txttipo"];


$zona=$_POST["txtzona"];

$muni=$_POST["txtmunicipio"];
$hecta=$_POST["txthect"];
$hectasem=$_POST["txthectsem"];
$ncontacto=$_POST["txtcontacto"];
$tel=$_POST["txttelefono"];
$dir=$_POST["txtdir"];
$div=$_POST["txtdivision"];
$email=$_POST["txtemail"];
$fcumple=$_POST["txtfcumple"];
$totcomp=$_POST["txttotcomprasAgro"];
$totcompnutri=$_POST["txttotcomprasNutri"];
$tamano=$_POST["txttamano"];
$crecimiento=$_POST["txtcrecimiento"];
$finanza=$_POST["txtfinanza"];
$compe=$_POST["txtcompentencia"];
$totpecono=$_POST["txttotpeconomico"];
$cono=$_POST["txtconocimiento"];
$responsab=$_POST["txtresponsab"];
$pps=$_POST["txtpps"];
$actitud=$_POST["txtactitud"];
$totrpersonal=$_POST["txttotrpersonal"];


$usu=$_SESSION['usuario_sesion'];


date_default_timezone_set("America/Bogota");
$hoy=date("Y-m-d h:i:sa");

///////////////////////////////////////RECOLECTAR VARIABLES PARA INSERTAR LOS CULTIVOS POR CLIENTE /////////////////////////////////////
	$items1 = ($_POST['lst_cultivos']);
	$items2 = ($_POST['txt_nhectareas']);


		while(true) {

		//// RECUPERAR LOS VALORES DE LOS ARREGLOS METAS PRODUCTOS////////
		$item1 = current($items1);
		$item2 = current($items2);
		
		echo $item1.' ------- '.$item2.'--------';

		if ($item1==0 and $item2=="") {
			
			$item1 = next( $items1 );
			$item2 = next( $items2 );

			if($item1 === false && $item2 === false)break;
		}
		else{


		////// ASIGNARLOS A VARIABLES METAS PRODUCTOS ///////////////////
		$cultivo=(( $item1 !== false) ? $item1 : ", &nbsp;");
		$numhectareas=(( $item2 !== false) ? $item2 : ", &nbsp;");

		//// CONCATENAR LOS VALORES METAS PRODUCTOS EN ORDEN PARA SU FUTURA INSERCIÓN ////////
		$valoresCultivos='(NULL,'.$id.','.$cultivo.','.$numhectareas.'),';
		

		 //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
		$valoresInCultivos= substr($valoresCultivos, 0, -1);
		
		$totdatos=count($valoresInCultivos);
		
		
		
		$sqlCultivo = "INSERT INTO cliente_cultivo (id_clientecultivo, id_cliente, id_cultivo, nhectsembradas_clientecultivo) 
		VALUES $valoresInCultivos";

		$inserCultivos=$db->query($sqlCultivo)or die("Error al asociar los cultivos a este cliente: ". $db->error);
		
		


		
		 	// Up! Next Value
		$item1 = next( $items1 );
		$item2 = next( $items2 );

		if($item1 === false && $item2 === false)break;

		}
		
	}


$actcliente=$db ->query("UPDATE cliente SET nom_cliente='$nom', tipo_Cliente='$tip', division_cliente='$div' WHERE id_cliente='$id'" ) or die("Error Update Client: ".$db->error);

$updatecliente=$dbaudi->query("UPDATE cliente SET nom_cliente='$nom', tipo_Cliente='$tip', tiporeg_cliente='M',division_cliente='$div',
							freg_cliente='$hoy',usureg_cliente='$usu' WHERE id_cliente='$id'") or die("Error Client-Audi: ".$dbaudi->error);

/*INSERTAR Y ACTUALIZAR CLIENTE MUNICIPIO------------------------------------------------------------------------------------------------*/
$actclientemunicipio=$db->query("UPDATE cliente_municipio 
	SET
	id_municipio='$muni', 
	hect_cliente='$hecta',
	hectsemb_cliente='$hectasem',
	contacto_cliente='$ncontacto',
	tel_cliente='$tel',
	direccion_cliente='$dir',
	email_cliente='$email',
	fcumpleanos_cliente='$fcumple',
	vtotalcompras_cliente='$totcomp',
	vtotalcomprasnutri_cliente='$totcompnutri'
	WHERE id_cliente='$id'
	and id_usuario='$usu'
	")or die("Error Update client-mun: ".$db->error);

$Updateclientemun=$dbaudi->query("INSERT INTO cliente_municipio
								(id_clientemunicipio,id_cliente,id_municipio,hect_cliente,hectsemb_cliente,tel_cliente,
								fcumpleanos_cliente,email_cliente,direccion_cliente,vtotalcompras_cliente,vtotalcomprasnutri_cliente,
								id_usuario,contacto_cliente, tiporeg_clientemunicipio, freg_clientemunicipio,usureg_clientemunicipio) 
								
								VALUES(NULL,'$id','$muni','$hecta','$hectasem','$tel','$fcumple','$email','$dir','$totcomp','$totcompnutri','$usu',
									'$ncontacto','M','$hoy','$usu')")or die("Error client-mun-Audi: ".$dbaudi->error);

/*INSERTAR Y ACTUALIZAR CLIENTE CALIFICACION------------------------------------------------------------------------------------------*/
$actcalifcliente=$db ->query("UPDATE cliente_calificacion 
	SET tamano_peconomico='$tamano', 
	crecimi_peconomico='$crecimiento', 
	finanza_peconomico='$finanza', 
	compt_peconomico='$compe', 
	total_peconomico='$totpecono', 
	conoci_rpersonal='$cono',
	resp_rpersonal='$responsab',
	pps_rpersonal='$pps',
	actitud_rpersonal='$actitud',
	total_rpersonal='$totrpersonal'
	WHERE id_cliente='$id'
	and id_usuario='$usu'
	") or die("Error Update calif-cli: ".$db->error);

$updatecalifcliente=$dbaudi->query("INSERT INTO cliente_calificacion(id_clientecalificacion,tamano_peconomico,crecimi_peconomico,
									finanza_peconomico,compt_peconomico,total_peconomico,conoci_rpersonal,resp_rpersonal,
									pps_rpersonal,actitud_rpersonal,total_rpersonal,id_cliente,id_usuario,tiporeg_clientecalif,
									freg_clientecalif,usureg_clientecalif) 
									VALUES(NULL,'$tamano','$crecimiento','$finanza','$compe','$totpecono',
										'$cono','$responsab','$pps','$actitud','$totrpersonal','$id','$usu','M','$hoy',
										'$usu')")or die("Error calif-cli-audi: ".$dbaudi->error);

/*MOSTRAR MENSAJE DESPUES DE QUE TODO ESTE BIEN------------------------------------------------------------------------------------------*/

if ($zona==0) {
	echo '<script>alert("Datos Insertados Correctamente")</script>';
	echo "<script>location.href='../../user/actualizarcliente.php'</script>";
}
/*
echo '<div class="alert alert-warning fade in">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
       <strong>Cliente actualizado!</strong> La informacion del cliente se actualizo correctamente.
        </div>';*/

 ?>