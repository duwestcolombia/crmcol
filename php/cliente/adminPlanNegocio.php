<?php
session_start();
require '../conexionbd.php';

	 				//////////////////////// PRESIONAR EL BOTÓN //////////////////////////
if(isset($_POST['insertar']))
{
	////////////////////////////////////////RECOLECTAR LAS VARIABLES PARA INSERTAR PLAN DE NEGOCIO ///////////////////////////////////////

	$idCliente=$_POST['txt_idCliente'];
	$numCuadrante=$_POST['txt_ncuadrante'];
	$cultivo=$_POST['txt_cultivo'];
	$idcultivo=$_POST['txt_idcultivo'];
	$tipCliente=$_POST['txt_tcliente'];

	$anioUno=$_POST['txt_anio1'];
	$hecSembradas=$_POST['txt_hecsembradas'];
	$valPbiologico=$_POST['txt_vpotbiologico'];
	$totPbiologico=$_POST['txt_totpotencialbiologico'];
	$vHistoricas=$_POST['txt_vhistoricas'];
	$metaVentas=$_POST['txt_metaventastotal'];

	$anioDos=$_POST['txt_anio2'];
	$hecSembradasDos=$_POST['txt_hecsembradas2'];
	$valPbiologicoDos=$_POST['txt_vpotbiologico2'];
	$totPbiologicoDos=$_POST['txt_totpotencialbiologico2'];
	$vHistoricasDos=$_POST['txt_vhistoricas2'];
	$metaVentasDos=$_POST['txt_metaventastotal2'];


	//////////////////////////// CUSTOMER SHARE % /////////////////////////////
	$anioPorcentaje=$_POST['txt_anioporcentaje'];
	$anioPorcentajeDos=$_POST['txt_anio2porcentaje'];

	
		///////////////////////////  PLAN VISITA CLIENTE //////////////////////////
		$numVisitas=$_POST['txt_nvistas'];
		$frecuencia=$_POST['txt_frecuencia'];
		$flimite=$_POST['txt_flimite'];

		$usuResponsable=$_POST['txt_responsable'];

		date_default_timezone_set("America/Bogota");
		$hoy=date("Y-m-d h:i:sa");


		///////////////////////////////////////RECOLECTAR VARIABLES PARA INSERTAR LAS METAS POR PRODUCTO /////////////////////////////////////
			/*$items1 = ($_POST['txt_producto']);
			$items2 = ($_POST['txt_kilolitro']);
			$items3 = ($_POST['txt_valor']);*/

		///////////////////////////////////////RECOLECTAR VARIABLES PARA INSERTAR LAS ACCIONES QUE SE REALIZARAN /////////////////////////////////////
			$items4 = ($_POST['txt_accion']);
			$items5 = ($_POST['txt_indicadorLogro']);
			$items6 = ($_POST['txt_recursos']);
			$items7 = ($_POST['dtp_fecha']);


		$sql="INSERT INTO plan_negocio(id_pnegocio, id_cliente, id_usuario, ncuadrante_pnegocio, anioini_pnegocio, hecsemini_pnegocio, 
			vpbiologicoini_pnegocio, totpbiologicoini_pnegocio, vhistoricasini_pnegocio, aniofin_pnegocio, hecsemfin_pnegocio, 
			vpbiologicofin_pnegocio, totpbiologicofin_pnegocio, metaventatotalfin_pnegocio, costumershareini_pnegocio, 
			costumersharefin_pnegocio, numvisitas_pnegocio, frecuencia_pnegocio, flimite_pnegocio, fregistro_pnegocio,id_cultivo) 
			VALUES(NULL, '$idCliente', '$usuResponsable', '$numCuadrante', '$anioUno', '$hecSembradas', '$valPbiologico','$totPbiologico',
			'$vHistoricas', '$anioDos', '$hecSembradasDos','$valPbiologicoDos','$totPbiologicoDos','$metaVentasDos', '$anioPorcentaje', 
			'$anioPorcentajeDos', '$numVisitas','$frecuencia', '$flimite', '$hoy','$idcultivo')";

		$inserPlanNegocio=$db->query($sql) or die ($db->error);

		if ($inserPlanNegocio) {
			$consulNuMax=$db->query("SELECT * FROM plan_negocio WHERE id_cliente='$idCliente' AND id_usuario='$usuResponsable' ORDER BY fregistro_pnegocio DESC LIMIT 1")or die($db->error);
			while ($resnum=$consulNuMax->fetch_assoc()) {

				while(true) {

					//// RECUPERAR LOS VALORES DE LOS ARREGLOS METAS PRODUCTOS////////
					/*$item1 = current($items1);
					$item2 = current($items2);
					$item3 = current($items3);*/
					//// RECUPERAR LOS VALORES DE LOS ARREGLOS ACCIONES////////
					$item4 = current($items4);
					$item5 = current($items5);
					$item6 = current($items6);
					$item7 = current($items7);
					 	////// ASIGNARLOS A VARIABLES METAS PRODUCTOS ///////////////////
					/*$prod=(( $item1 !== false) ? $item1 : ", &nbsp;");
					$kilo=(( $item2 !== false) ? $item2 : ", &nbsp;");
					$valor=(( $item3 !== false) ? $item3 : ", &nbsp;");*/
					 	////// ASIGNARLOS A VARIABLES  ACCIONES ///////////////////
					$accion=(( $item4 !== false) ? $item4 : ", &nbsp;");
					$indicador=(( $item5 !== false) ? $item5 : ", &nbsp;");
					$recursos=(( $item6 !== false) ? $item6 : ", &nbsp;");
					$fecha=(( $item7 !== false) ? $item7 : ", &nbsp;");

					//Recolectar el id del plan de negocios//////////////////////
					$idPlanNegocio=$resnum['id_pnegocio'];


					 	//// CONCATENAR LOS VALORES METAS PRODUCTOS EN ORDEN PARA SU FUTURA INSERCIÓN ////////
					/*$valoresMetas='(NULL,"'.$prod.'",'.$kilo.','.$valor.','.$idPlanNegocio.'),';*/

					 	//// CONCATENAR LOS VALORES ACCIONES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
					$valoresAcciones='(NULL,"'.$accion.'","'.$indicador.'","'.$recursos.'",'.$idPlanNegocio.',"'.$fecha.'"),';

					 	//////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
					/*$valoresInserMetas= substr($valoresMetas, 0, -1);*/

					 	//////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
					$valoresInserAcciones= substr($valoresAcciones, 0, -1);

					


					 	///////// QUERY DE INSERCIÓN METAS////////////////////////////
					/*$sqlMetas = "INSERT INTO metas_producto (id_mproducto, producto_mproducto, kl_mproducto, valor_mproducto, id_pnegocio) 
					VALUES $valoresInserMetas";*/

						///////// QUERY DE INSERCIÓN ACCION////////////////////////////
					$sqlAccion = "INSERT INTO rpn (id_rpn, accion_rpn, indilogro_rpn, recursos_rpn, id_pnegocio,fecha_rpn) 
					VALUES $valoresInserAcciones";


					/*$sqlResMetas=$db->query($sqlMetas) or die('Error al insertar las metas ' . $db->error);*/

					$sqlResAccion=$db->query($sqlAccion) or die('Error al insertar las acciones rpn ' . $db->error);


					 	// Up! Next Value
					/*$item1 = next( $items1 );
					$item2 = next( $items2 );
					$item3 = next( $items3 );*/

						// Up! Next Value
					$item4 = next( $items4 );
					$item5 = next( $items5 );
					$item6 = next( $items6 );
					$item7 = next( $items7 );

					//check terminator acciones
					if($item4 === false && $item5 === false && $item6 === false && $item7 === false) 
					// Check terminator metas y acciones
					/*if($item1 === false && $item2 === false && $item3 === false && $item4 === false && $item5 === false && $item6 === false && $item7 === false) */
					{
						echo '<script>alert("Registro exitoso");</script>';
						echo "<script>location.href='../../portafolioclientes/plannegocios.php';</script>";
						break;
					}

				
					/*if ($sqlResMetas) {
						if ($sqlResAccion) {
							echo '<script>alert("Registro exitoso");</script>';
							echo "<script>location.href='../../portafolioclientes/plannegocios.php';</script>";
						}
						else
						{
							echo '<script>alert("Error al insertar las acciones");</script>';
						}
					}
					else
					{
						echo '<script>alert("Error al insertar la metas");</script>';
					}*/
				}
				
			}

		}
	
}

?>