<?php 
session_start();
if(!$_SESSION)
{
	//header("location:../ingreso.php");
	echo "<script>location.href='../ingreso.php'</script>";
}
require '../conexionbd.php';

$id=$_POST['lst_tipusuario'];
$usu=$_SESSION['usuario_sesion'];

$consulta=$db ->query("SELECT 
cm.id_cliente,c.nom_cliente,c.tipo_cliente,c.division_cliente,z.nom_zona, m.nom_municipio,cm.hect_cliente,
cm.hectsemb_cliente,cm.tel_cliente,cm.fcumpleanos_cliente,cm.email_cliente,cm.direccion_cliente,cm.vtotalcompras_cliente,cm.vtotalcomprasnutri_cliente,cm.contacto_cliente,
cz.id_zona,cm.id_municipio
FROM cliente_municipio cm, cliente c, zona z, municipio m, cliente_zona cz
WHERE c.id_cliente='$id'
and cm.id_cliente=c.id_cliente
and cm.id_usuario= '$usu'
and z.id_zona=cz.id_zona
and cz.id_cliente=c.id_cliente
and m.id_municipio=cm.id_municipio
GROUP BY c.id_cliente") or die($db->error);

$consulzona=$db->query("SELECT * from zona GROUP BY id_zona") or die($db->error);

$consulmunicipio=$db->query("SELECT * from municipio GROUP BY id_municipio") or die($db->error);

$consulCultivos=$db->query("SELECT * FROM cultivo GROUP BY id_cultivo")or die('Error al cargar los cultivos, verifique con su administrador' . $db->error);

$tabCultivos=$db->query("SELECT c.id_cliente,c.nom_cliente,cul.id_cultivo,cul.nom_cultivo, cc.id_clientecultivo,cc.id_cliente,cc.id_cultivo,cc.nhectsembradas_clientecultivo 
						FROM cliente c, cultivo cul, cliente_cultivo cc
						WHERE cc.id_cliente='$id'
						AND c.id_cliente=cc.id_cliente
						AND cul.id_cultivo=cc.id_cultivo
						")or die('Error al cargar la tabla ' . $db->error);

$queryClienteCultivo=$db->query("SELECT * FROM cliente_cultivo WHERE id_cliente='$id'")or die($db->error);


$tabContactos=$db->query("SELECT * FROM contacto WHERE id_cliente='$id'")or die('Error al cargar la tabla Contactos' . $db->error);
///////////cargar una lista de nomenclaturas///////////


$nomenclatura = array(
	(object)array("titulo"=>"","valor"=>""),
	(object)array("titulo"=>"AC","valor"=>"Avenida calle (AC)"),
	(object)array("titulo"=>"AD","valor"=>"Administración (AD)"),
	(object)array("titulo"=>"ADL","valor"=>"Adelante (ADL)"),
	(object)array("titulo"=>"AER","valor"=>"Aeropuerto (AER)"),
	(object)array("titulo"=>"AG","valor"=>"Agencia (AG)"),
	(object)array("titulo"=>"AGP","valor"=>"Agrupación (AGP)"),
	(object)array("titulo"=>"AK","valor"=>"Avenida carrera (AK)"),
	(object)array("titulo"=>"AL","valor"=>"Altillo (AL)"),
	(object)array("titulo"=>"ALD","valor"=>"Al lado (ALD)"),
	(object)array("titulo"=>"ALM","valor"=>"Almacén (ALM)"),
	(object)array("titulo"=>"AP","valor"=>"Apartamento (AP)"),
	(object)array("titulo"=>"APTDO","valor"=>"Apartado (APTDO)"),
	(object)array("titulo"=>"ATR","valor"=>"Atrás (ATR)"),
	(object)array("titulo"=>"AUT","valor"=>"Autopista (AUT)"),
	(object)array("titulo"=>"AV","valor"=>"Avenida (AV)"),
	(object)array("titulo"=>"AVIAL","valor"=>"Anillo vial (AVIAL)"),
	(object)array("titulo"=>"BG","valor"=>"Bodega (BG)"),
	(object)array("titulo"=>"BL","valor"=>"Bloque (BL)"),
	(object)array("titulo"=>"BLV","valor"=>"Boulevard (BLV)"),
	(object)array("titulo"=>"BRR","valor"=>"Barrio (BRR)"),
	(object)array("titulo"=>"C","valor"=>"Corregimiento (C)"),
	(object)array("titulo"=>"CA","valor"=>"Casa (CA)"),
	(object)array("titulo"=>"CAS","valor"=>"Caserío (CAS)"),
	(object)array("titulo"=>"CC","valor"=>"Centro comercial (CC)"),
	(object)array("titulo"=>"CD","valor"=>"Ciudadela (CD)"),
	(object)array("titulo"=>"CEL","valor"=>"Célula (CEL)"),
	(object)array("titulo"=>"CEN","valor"=>"Centro (CEN)"),
	(object)array("titulo"=>"CIR","valor"=>"Circular (CIR)"),
	(object)array("titulo"=>"CL","valor"=>"Calle (CL)"),
	(object)array("titulo"=>"CLJ","valor"=>"Callejón (CLJ)"),
	(object)array("titulo"=>"CN","valor"=>"Camino (CN)"),
	(object)array("titulo"=>"CON","valor"=>"Conjunto residencial (CON)"),
	(object)array("titulo"=>"CONJ","valor"=>"Conjunto (CONJ)"),
	(object)array("titulo"=>"CR","valor"=>"Carrera (CR)"),
	(object)array("titulo"=>"CRT","valor"=>"Carretera (CRT)"),
	(object)array("titulo"=>"CRV","valor"=>"Circunvalar (CRV)"),
	(object)array("titulo"=>"CS","valor"=>"Consultorio (CS)"),
	(object)array("titulo"=>"DG","valor"=>"Diagonal (DG)"),
	(object)array("titulo"=>"DP","valor"=>"Depósito (DP)"),
	(object)array("titulo"=>"DPTO","valor"=>"Departamento (DPTO)"),
	(object)array("titulo"=>"DS","valor"=>"Depósito sótano (DS)"),
	(object)array("titulo"=>"ED","valor"=>"Edificio (ED)"),
	(object)array("titulo"=>"EN","valor"=>"Entrada (EN)"),
	(object)array("titulo"=>"ES","valor"=>"Escalera (ES)"),
	(object)array("titulo"=>"ESQ","valor"=>"Esquina (ESQ)"),
	(object)array("titulo"=>"ESTE","valor"=>"Este (ESTE)"),
	(object)array("titulo"=>"ET","valor"=>"Etapa (ET)"),
	(object)array("titulo"=>"EX","valor"=>"Exterior (EX)"),
	(object)array("titulo"=>"FCA","valor"=>"Finca (FCA)"),
	(object)array("titulo"=>"GJ","valor"=>"Garaje (GJ)"),
	(object)array("titulo"=>"GS","valor"=>"Garaje sótano (GS)"),
	(object)array("titulo"=>"GT","valor"=>"Glorieta (GT)"),
	(object)array("titulo"=>"HC","valor"=>"Hacienda (HC)"),
	(object)array("titulo"=>"HG","valor"=>"Hangar (HG)"),
	(object)array("titulo"=>"IN","valor"=>"Interior (IN)"),
	(object)array("titulo"=>"IP","valor"=>"Inspección de Policía (IP)"),
	(object)array("titulo"=>"IPD","valor"=>"Inspección Departamental (IPD)"),
	(object)array("titulo"=>"IPM","valor"=>"Inspección Municipal (IPM)"),
	(object)array("titulo"=>"KM","valor"=>"Kilómetro (KM)"),
	(object)array("titulo"=>"LC","valor"=>"Local (LC)"),
	(object)array("titulo"=>"LM","valor"=>"Local mezzanine (LM)"),
	(object)array("titulo"=>"LT","valor"=>"Lote (LT)"),
	(object)array("titulo"=>"MD","valor"=>"Módulo (MD)"),
	(object)array("titulo"=>"MJ","valor"=>"Mojón (MJ)"),
	(object)array("titulo"=>"MLL","valor"=>"Muelle (MLL)"),
	(object)array("titulo"=>"MN","valor"=>"Mezzanine (MN)"),
	(object)array("titulo"=>"MZ","valor"=>"Manzana (MZ)"),
	(object)array("titulo"=>"NOMBRE VIA","valor"=>"Vías de nombre común (NOMBRE VIA)"),
	(object)array("titulo"=>"NORTE","valor"=>"Norte (NORTE)"),
	(object)array("titulo"=>"O","valor"=>"Oriente (O)"),
	(object)array("titulo"=>"OCC","valor"=>"Occidente (OCC)"),
	(object)array("titulo"=>"OESTE","valor"=>"Oeste (OESTE)"),
	(object)array("titulo"=>"OF","valor"=>"Oficina (OF)"),
	(object)array("titulo"=>"P","valor"=>"Piso (P)"),
	(object)array("titulo"=>"PA","valor"=>"Parcela (PA)"),
	(object)array("titulo"=>"PAR","valor"=>"Parque (PAR)"),
	(object)array("titulo"=>"PD","valor"=>"Predio (PD)"),
	(object)array("titulo"=>"PH","valor"=>"Penthouse (PH)"),
	(object)array("titulo"=>"PJ","valor"=>"Pasaje (PJ)"),
	(object)array("titulo"=>"PL","valor"=>"Planta (PL)"),
	(object)array("titulo"=>"PN","valor"=>"Puente (PN)"),
	(object)array("titulo"=>"POR","valor"=>"Portería (POR)"),
	(object)array("titulo"=>"POS","valor"=>"Poste (POS)"),
	(object)array("titulo"=>"PQ","valor"=>"Parqueadero (PQ)"),
	(object)array("titulo"=>"PRJ","valor"=>"Paraje (PRJ)"),
	(object)array("titulo"=>"PS","valor"=>"Paseo (PS)"),
	(object)array("titulo"=>"PT","valor"=>"Puesto (PT)"),
	(object)array("titulo"=>"PW","valor"=>"Park Way (PW)"),
	(object)array("titulo"=>"RP","valor"=>"Round Point (RP)"),
	(object)array("titulo"=>"SA","valor"=>"Salón (SA)"),
	(object)array("titulo"=>"SC","valor"=>"Salón comunal (SC)"),
	(object)array("titulo"=>"SD","valor"=>"Salida (SD)"),
	(object)array("titulo"=>"SEC","valor"=>"Sector (SEC)"),
	(object)array("titulo"=>"SL","valor"=>"Solar (SL)"),
	(object)array("titulo"=>"SM","valor"=>"Súper manzana (SM)"),
	(object)array("titulo"=>"SS","valor"=>"Semisótano (SS)"),
	(object)array("titulo"=>"ST","valor"=>"Sótano (ST)"),
	(object)array("titulo"=>"SUITE","valor"=>"Suite (SUITE)"),
	(object)array("titulo"=>"SUR","valor"=>"Sur (SUR)"),
	(object)array("titulo"=>"TER","valor"=>"Terminal (TER)"),
	(object)array("titulo"=>"TERPLN","valor"=>"Terraplén (TERPLN)"),
	(object)array("titulo"=>"TO","valor"=>"Torre (TO)"),
	(object)array("titulo"=>"TV","valor"=>"Transversal (TV)"),
	(object)array("titulo"=>"TZ","valor"=>"Terraza (TZ)"),
	(object)array("titulo"=>"UN","valor"=>"Unidad (UN)"),
	(object)array("titulo"=>"UR","valor"=>"Unidad residencial (UR)"),
	(object)array("titulo"=>"URB","valor"=>"Urbanización (URB)"),
	(object)array("titulo"=>"VRD","valor"=>"Vereda (VRD)"),
	(object)array("titulo"=>"VTE","valor"=>"Variante (VTE)"),
	(object)array("titulo"=>"ZF","valor"=>"Zona franca (ZF)"),


);


//$consulmunicipio=$db->query("SELECT * from municipio GROUP BY id_municipio") or die($db->error);
while ($consultausu = $consulta ->fetch_array(MYSQLI_BOTH))
{
	//Cargo el Id de la zona que se encontro en la tabla cliente_zona
	$zonauno=$consultausu['id_zona'];
	$mununo=$consultausu['id_municipio'];
	//Cargo los datos de la tabla cliente-------------------------------------------------------------------------------------
	echo '			<form action="../php/cliente/actualizacliente.php" method="POST" id="frm_actualizacliente">	
							<div class="panel panel-success">
								<div class="panel-heading"><strong><h4>Información del Cliente</h4></strong></div>
							  	<div class="panel-body">
								<div class="table-responsive">
								<table class="table table-striped  table-condensed table-hover">
									<tr>
										<th><label for="lblid">NIT/Cedula</label></th>
										<th><label for="lblnombre">Nombre</label></th>
										<th><label for="lbltipo">Tipo</label></th>
										<th><label for="lbldepto">Departamento</label></th>
										<th><label for="lblmun">Municipio</label></th>
										<th><label for="lbldir">Dirección</label></th>
										<th colspan="2"><label for="actuDireccion">Actualizar Dirección</label></th>

									</tr>
									<tr>
										<td><input type="text" class="form-control" name="txtid" id="txtid" value="'.$consultausu['id_cliente'].'" readonly="readonly"></td>
										<td><input type="text" class="form-control" name="txtnombre" id="txtnombre" value="'.$consultausu['nom_cliente'].'" id="txtnombre" > </td>
										<td><select name="txttipo" id="txttipo" class="form-control" id="txttipo">';
										if ($consultausu['tipo_cliente']=="Agricultor") {
											echo '
											<option value="Agricultor" selected>Agricultor</option>
											<option value="Distribuidor">Distribuidor</option>
											';
											
										}
										else
										{
											echo '
											<option value="Agricultor" >Agricultor</option>
											<option value="Distribuidor" selected>Distribuidor</option>
											';
										}
										echo '</select>
										</td>
										<td>
											<!--Empiezo armando el select con las zonas--> 
											<select name="txtzona" id="txtzona" class="form-control"  onChange="HabilitarMun();">';
											//------------------------------------------------------------------------------------------------------------------------		
											while ($consultazona = $consulzona ->fetch_array(MYSQLI_BOTH))
											{
											//Cargo en zona dos el id_zona encontrado en la tabla zona
											$zonados=$consultazona['id_zona'];
												//Armo la opcion que tendra este select donde su valor sera el id_zona
												echo '<option value="'.$consultazona['id_zona'].'" ';
												//Comparo el id_zona de cliente_zona y la encontrada en la tamba zona 
												if ($zonauno==$zonados) 
													// si son iguales que seleccione la opcion que es igual
													echo 'SELECTED';
													echo '>';
																			
												//luego le paso el nombre que va a mostrar al usuario que es el nombre de la zona
												echo utf8_encode ($consultazona['nom_zona']);
												//cierro el option
												echo '</option>';

											}
											//------------------------------------------------------------------------------------------------------------------------------
											//cierro el select y el contenedor div que le da los estilos.
											echo '</select>
											
										</td>
										<td><select name="txtmunicipio" id="txtmunicipio" class="form-control" id="txtmunicipio" onFocus="HabilitarMun();">';
											//------------------------------------------------------------------------------------------------------------------------------
											//$consulmunicipio=$db->query("SELECT id_municipio, nom_municipio,id_zona FROM municipio  GROUP BY id_municipio") or die($db->error);
											while ($consultamun = $consulmunicipio ->fetch_array(MYSQLI_BOTH))
											{
											//Cargo en zona dos el id_zona encontrado en la tabla zona
											$mundos=$consultamun['id_municipio'];
												//Armo la opcion que tendra este select donde su valor sera el id_zona
												echo '<option value="'.$consultamun['id_municipio'].'" ';
												//Comparo el id_zona de cliente_zona y la encontrada en la tamba zona 
												if ($mununo==$mundos) 
													// si son iguales que seleccione la opcion que es igual
													echo 'SELECTED';
													echo '>';
												
												//luego le paso el nombre que va a mostrar al usuario que es el nombre de la zona
												echo utf8_encode ($consultamun['nom_municipio']);
												//cierro el option
												echo '</option>';

											}
											// ----------------------------------------------------------------------------------------- 
											//cierro el select y el contenedor div que le da los estilos.
											echo '</select>
										</td>
										<td>
										<input type="text" class="form-control" name="txtdir" id="txtdir" value="'.$consultausu['direccion_cliente'].'" readonly="readonly">
										</td>
										<td>
											<!-- Button trigger modal -->
											<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
												<span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
											</button>

											<!-- Modal -->
											<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header modal-header-info">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	<h4 class="modal-title" id="myModalLabel">Generar nueva dirección de residencia.</h4>
																	
																</div>

																<div class="modal-body"><!--contenido de la ventana modal-->
																	<table class="table table-condensed">
																		<tr>
																			<th colspan="4"><label id="encabezado">Construye tu direccion</label></th>
																			
																		</tr>
																		<tr class="success">
																			<th>Campo 1</th>
																			<th>Campo 2</th>
																			<th>Campo 3</th>
																			<th>Campo 4</th>
																		</tr>
																		<tr>
																			<td><select id="lst_nomenclatura" class="form-control">';
																				for ($i=0; $i < count($nomenclatura); $i++) { 
																				echo '<option value="'.$nomenclatura[$i]->titulo.'">'.$nomenclatura[$i]->valor.'</option>';
																			}
																			
																			echo '</select>
																		</td>
																		<td><input type="text" id="txt_campUno" name="txt_campUno" placeholder="Numero" class="form-control"></td>
																		<td><select id="lst_nomenclaturaDos" class="form-control">';
																			for ($i=0; $i < count($nomenclatura); $i++) { 
																			echo '<option value="'.$nomenclatura[$i]->titulo.'">'.$nomenclatura[$i]->valor.'</option>';
																		}
																		
																		echo '</select>
																	</td>
																	<td><input type="text" id="txt_campDos" name="txt_campDos" placeholder="Numero" class="form-control"></td>
																	
																	</tr>
																	</table>
																</div>
															
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
															<input type="button" class="btn btn-primary" id="definirDireccion" onClick="direccionVentanaModal();" value="Definir Dirección">
														</div>
													</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<th><label for="lblcontacto">Nombre Contacto</label></th>
										<th><label for="lbltel">Télefono</label></th>
										<th><label for="lblemail">Correo Electronico</label></th>
										<th><label for="lblfcumple">Fecha cumpleaños</label></th>
										<th><label for="lbldir">Sector</label></th>
										<td colspan="2"><label for="lbltotcompras">Valor total compras Agroquimicos</label></td>
										<td colspan="2"><label for="lbltotcompras">Valor total compras Nutrición</label></td>
									</tr>
									<tr>
										<td><input type="text" class="form-control" name="txtcontacto" id="txtcontacto" value="'.$consultausu['contacto_cliente'].'"> </td>
										<td><input type="tel" class="form-control" name="txttelefono" id="txttelefono" value="'.$consultausu['tel_cliente'].'"> </td>
										<td><input type="text" class="form-control" name="txtemail" id="txtemail" value="'.$consultausu['email_cliente'].'"> </td>
										<td><input type="date" class="form-control" name="txtfcumple" id="txtfcumple" value="'.$consultausu['fcumpleanos_cliente'].'"> </td>
										<td><input type="text" class="form-control" name="txtdivision" id="txtdivision" value="'.$consultausu['division_cliente'].'" readonly="readonly"> </td>
										<td colspan="2"><input type="number" class="form-control" name="txttotcomprasAgro" id="txttotcomprasAgro" value="'.$consultausu['vtotalcompras_cliente'].'" min="0" > </td>	
										<td colspan="2"><input type="number" class="form-control" name="txttotcomprasNutri" id="txttotcomprasNutri" value="'.$consultausu['vtotalcomprasnutri_cliente'].'" min="0" > </td>	
									</tr>
									<tr>
										<th><label for="lblhect">Total Hectareas</label></th>
										<th><label for="lblhectsem">Total Hectareas Sembradas</label></th>
									</tr>
									<tr>
										<td><input type="number" class="form-control" name="txthect" id="txthect" value="'.$consultausu['hect_cliente'].'" min="0"> </td>
										<td>';
										$sum =0;
										while ($sumVtotal=$queryClienteCultivo->fetch_assoc()) {
											
											$sum=$sum+$sumVtotal['nhectsembradas_clientecultivo'];
											
										}
										echo'<input type="text" class="form-control" name="txthectsem" id="txthectsem" id="txthectsem" value="'.$sum.'" min="0" readonly="readonly">';
										echo'</td>
									</tr>
									
								</table>

									<!--
									***********************VENTANA MODAL**********************
								-->
									<div class="container">
									 
									  <!-- Modal -->
									  <div class="modal fade" id="modalcontacto" role="dialog">
									    <div class="modal-dialog modal-lg">
									    
									      <!-- Modal content-->
									      <div class="modal-content">
									        <div class="modal-header modal-header-success">
									        	<h3>Agregar un nuevo contacto</h3>
									        	<span class="glyphicon glyphicon-user" aria-hidden="true"></span>

									        </div>
									        <div class="modal-body">

									          <div id="mensajeModal"></div>
									          
									        	<div class="row">
									        		<div class="col-md-6">
									        			<input type="text" class="form-control" id="txt_nomModal" placeholder="Nombre completo. *">
									        		</div>
									        		<div class="col-md-6">
									        			<input type="number" maxlength="10" id="txt_telModal" class="form-control" placeholder="Numero de Telefono.">
									        		</div>
									        	</div>
									        	<br>
									        	<div class="row">									        		
									        		<div class="col-md-6">
									        			<input type="number" maxlength="10" id="txt_celModal" class="form-control" placeholder="Numero de Celular *">
									        		</div>
									        		<div class="col-md-6">
									        			<input type="email" id="txt_emailModal" class="form-control" placeholder="Correo Electronico *">
									        		</div>
									        	</div>
									        	<hr>

									        	<div class="row">
									        		<div class="col-md-6">
									        			<label>Fecha cumpleaños *:</label>
									        			<input type="date" class="form-control" id="txt_fcumpleModal">
									        		</div>
									        		<div class="col-md-6">
									        			<label>Cliente *:</label>
									        			<select class="form-control" id="lst_clienteModal">
									        				<option value=""></option>';
									        				require '../llenarcombos.php';
									        			foreach ($resultado as $value) 
									        			{
									        				echo '
									        				<option value="'.$value['id_cliente'].'">'.utf8_encode($value['nom_cliente']).'</option>
									        				';
									        				}

									        			echo '

									        			</select>
									        		</div>
									        	</div>

									         
									        </div>
									        <div class="modal-footer">
									        	<button type="button" class="btn btn-success btn-md" id="btn_registrar" onClick="">Registrar</button>
									        	<button type="button" class="btn btn-primary btn-md" id="btn_cerrarmodal">Cerrar</button>
									        </div>
									      </div>
									      
									    </div>
									  </div>
									</div>

								<!--
									***********************FIN VENTANA MODAL**********************
								-->
								
								<!--

									***********************TABLA DE CONTACTOS**********************
								-->
								<div class="panel panel-primary">
								    <div class="panel-heading" role="tab" id="encabezadoContactos">
								      <h4 class="panel-title">
								        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#contentPanel" aria-expanded="false" aria-controls="contentPanel">
								          Lista de Contactos 
								           <span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
								        </a>
								      </h4>
								    </div>

								    <div id="contentPanel" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="encabezadoContactos">
								      <div class="panel-body">

								      	<table class="table table-hover table-condensed">
								      		<tr>
								      			<th>Nombre</th>
								      			<th>Telefono</th>
								      			<th>Celular</th>
								      			<th>Correo electronico</th>
								      			<th>Fecha de cumpleaños</th>
								      			<th>Acción</th>
								      		</tr>
								      		';
								      		while ($resTabContacto=$tabContactos->fetch_assoc()) {
								      			echo '<tr>
								      			<td>'.$resTabContacto['nom_contacto'].'</td>
								      			<td>'.$resTabContacto['tel_contacto'].'</td>
								      			<td><a href="tel://'.$resTabContacto['cel_contacto'].'">'.$resTabContacto['cel_contacto'].'</a></td>
								      			<td>'.$resTabContacto['email_contacto'].'</td>
								      			<td>'.$resTabContacto['fcumpleanos_contacto'].'</td>
								      			<!--<td><input type="button" id="btn_eliminarContacto" value="Eliminar" class="btn btn-danger" onclick="eliminarContacto('.$resTabContacto['id_contacto'].');"><span class="glyphicon glyphicon-star" aria-hidden="true"></span></td>-->
								      			<td><button type="button" class="btn btn-warning" onclick="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
								      			<button type="button" class="btn btn-danger" onclick="eliminarContacto('.$resTabContacto['id_contacto'].');"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
								      			</tr>';
								      		}

								      		echo '
								      	</table> 
								      	
								      </div>
								    </div>
								 </div>
								<!--

									***********************FIN TABLA DE CONTACTOS**********************
								-->

								<!-- Boton agregar contactos-->
								<input type="button" id="btn_agergarcontacto" class="btn btn-danger" value="Agregar contactos" >
								<hr>
								<!-- FIn Boton agregar contactos-->      		
								
							
								<table class="table table-striped table-bordered table-condensed table-hover" id="tabHectareas">
									<tr>
										<th>Seleccione el cultivo</th>
										<th>Cantidad de Hectareas sembradas</th>
										<!--<th><input type="button" class="btn btn-primary" value="Calcular Total Hectareas sembradas" onclick="sumhectareaCultivo();"></th>-->
									</tr>
									<tr class="fila-clonar">
			 							<td>
			 								<select id="lst_cultivos[]" name="lst_cultivos[]" class="form-control">
			 									<option value="0">Selecciona si necesita agregar otro cultivo</option>';
			 									while ($resCultivo=$consulCultivos->fetch_assoc()) {
			 										echo '<option value="'.$resCultivo['id_cultivo'].'">'.utf8_encode($resCultivo['nom_cultivo']).'</option>';
			 									}
			 						echo '</select>
			 							</td>
			 							<td><input type="number" class="form-control" name="txt_nhectareas[]" id="txt_nhectareas[]" placeholder="Numero de hectareas sembradas"></td>
			 							<td><input id="adicional" name="adicional" type="button" class="btn btn-warning" value="Más +" ></td>
			 							<td class="delete"><input type="button" id="delete"   class="btn btn-danger" value="Menos -"/></td>
	 								</tr>
	 								
								</table>
								

								<!--	***********PRUEBA MODAL CULTIVO******************

								<input type="button" class="btn btn-danger" id="btn_agregaCultivo" value="agrega cultivo" >
								
								<div class="container">
								 
								  <!-- Modal -->
								  <div class="modal fade" id="modalCultivo" role="dialog">
								    <div class="modal-dialog modal-lg">
								    
								      <!-- Modal content-->
								      <div class="modal-content">
								        <div class="modal-header modal-header-success">
								        	<h3>Agregar un nuevo contacto</h3>
								        	<span class="glyphicon glyphicon-user" aria-hidden="true"></span>

								        </div>
								        <div class="modal-body">
								        	<div class="table-responsive">
										        <table class="table table-striped table-bordered table-condensed table-hover" id="tabHectareas">
										        	<tr>
										        		<th>Seleccione el cultivo</th>
										        		<th>Cantidad de Hectareas sembradas</th>
										        		<!--<th><input type="button" class="btn btn-primary" value="Calcular Total Hectareas sembradas" onclick="sumhectareaCultivo();"></th>-->
										        	</tr>
										        	<tr class="fila-clonar">
										        			<td>
										        			 <select id="lst_cultivos[]" name="lst_cultivos[]" class="form-control">
										        			 	<option value="0"></option> ';
										        			 	/*while ($resCultivo=$consulCultivos->fetch_assoc()) {
										        			 		echo '<option value="'.$resCultivo['id_cultivo'].'">'.utf8_encode($resCultivo['nom_cultivo']).'</option>';
										        			 	}*/
										        		echo'	</select>
										        			 </td>
										        			<td><input type="number" class="form-control" name="txt_nhectareas[]" id="txt_nhectareas[]" placeholder="Numero de hectareas sembradas"></td>
										        			<td><input id="adicional" name="adicional" type="button" class="btn btn-warning" value="Más +" ></td>
										        			<td class="delete"><input type="button" id="delete"   class="btn btn-danger" value="Menos -"/></td>
										        	 </tr>
										        	 								
										        </table>
								          							
										    </div>
								         
								        </div>
								        <div class="modal-footer">
								        	<button type="button" class="btn btn-success btn-md" id="btn_registrarCultivo" onClick="">Registrar</button>
								        	<button type="button" class="btn btn-primary btn-md" id="btn_cerrarmodalCultivo">Cerrar</button>
								        </div>
								      </div>
								      
								    </div>
								  </div>
								</div>

								<!-- *********************** FIN PRUEBA-->
								








								
							</div>

				</div>';


}
/////////////////////////TABLA DE CULTIVOS ASOCIADOS AL CLIENTE ///////////////////////////////////////////////////
echo '  <div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Ver cultivos asociados al cliente 
           <span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">

      	<table class="table table-hover table-condensed">
      		<tr>
      			<th>Cultivo</th>
      			<th>Numero de hectareas sembradas</th>
      		
      			<th>Acción</th>
      		</tr>';
      		
		while ($resTabCultivo=$tabCultivos->fetch_assoc()) {

			
			echo '<tr>
				<td>'.utf8_encode($resTabCultivo['nom_cultivo']).'
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				</td>
				<td>'.$resTabCultivo['nhectsembradas_clientecultivo'].'</td>
				
				<!--<td><input type="button" value="Eliminar" class="btn btn-danger" onclick="eliminarCultivo('.$resTabCultivo['id_clientecultivo'].');"></td>-->
				<td><button type="button" class="btn btn-danger" onclick="eliminarCultivo('.$resTabCultivo['id_clientecultivo'].');" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
			</tr>';
		}
      		
     echo '</table> 

       </div>
    </div>
  </div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$consulcalificacion=$db->query("SELECT * from cliente_calificacion where id_cliente='$id' and id_usuario='$usu'");
while ($calif=$consulcalificacion->fetch_array(MYSQLI_BOTH)) {
echo		'<!-- Columna POTENCIAL ECONOMICO DE LA CUENTA-->
<br>
		<h1><strong>Matriz de portafolio de clientes Duwest</strong></h1>
		
			<div class="panel panel-success">
				<div class="panel-heading"><strong><h4>Potencial economico de la cuenta</h4></strong>
					<p>Califique de 1 a 5, donde 1 es el valor mas bajo y 5 el valor mas alto.</p>
				</div>
					<div class="panel-body">
							<div class="col-lg-2 inline-block">
								<div class="popup" onclick="mostarPopUp()">
								<label for="tpeconomico">Tamaño del negocio total</label>
								<input type="number" class="form-control" name="txttamano" id="txttamano" value="'.$calif['tamano_peconomico'].'" min="0" max="5" onkeyup="sumpeconomico()"> 
								<span class="popuptext" id="myPopup">Se refiere a la situación histórica y actual del negocio. No se refiere al tamaño de compras que hace a Duwest, sino por el total de compras.</span>
								</div>
							</div>
							<div class="col-md-2 inline-block">
								<div class="popup" onclick="mostarPopUp2()">
								<label for="crepeconomico">Crecimiento del negocio total</label>
								<input type="number" class="form-control" name="txtcrecimiento" id="txtcrecimiento" value="'.$calif['crecimi_peconomico'].'" min="0" max="5" onkeyup="sumpeconomico()"> 
								<span class="popuptext" id="myPopup2">Se refiere a la situación histórica y futura de <storng>crecimiento</strong>. 
								No se califica por el grado de crecimiento o decrecimiento de las compras a Duwest, sino por el crecimiento del negocio total del cliente.</span>
								</div>
							</div>
							<div class="col-md-2 inline-block">
								<div class="popup" onclick="mostarPopUp3()">
								<label for="fpotencialeconomico">Alta posición financiera</label>
								<input type="number" class="form-control" name="txtfinanza" id="txtfinanza" value="'.$calif['finanza_peconomico'].'" min="0" max="5" onkeyup="sumpeconomico()"> 
								<span class="popuptext" id="myPopup3">Se refiere a la situación histórica y actual. Se califica por su comportamiento en Pagos en General, No solo a Duwest.</span>
								</div>
							</div>
							<div class="col-md-2 inline-block">
								<div class="popup" onclick="mostarPopUp4()">
								<label for="comppotencialeconomico">Competencia de desarrollo empresarial</label>
								<input type="number" class="form-control" name="txtcompentencia" id="txtcompentencia" value="'.$calif['compt_peconomico'].'" min="0" max="5" onkeyup="sumpeconomico()"> 
								<span class="popuptext" id="myPopup4">Se refiere al desarrollo que tiene el cliente en areas de Tecnologia, Administración y Comercialización.</span>
								</div>
							</div>
							<div class="col-md-2 inline-block">
								<label for="totalpeconomico">Total</label>
								<input type="number" class="form-control" name="txttotpeconomico" id="txttotpeconomico" value="'.$calif['total_peconomico'].'" min="0"  readonly="readonly"> 
							</div>
						</div>
					
				

			</div>
			<!-- Columna RELACION PERSONAL NEGOCIOS-->
			
			<div class="panel panel-success">
				<div class="panel-heading"><strong><h4>Relacion personal de negocios</h4></strong>
						<p>Califique de 1 a 5, donde 1 es el valor mas bajo y 5 el valor mas alto</p>
				</div>
				<div class="panel-body">
						<div class="col-md-2 inline-block">
							<div class="popup" onclick="mostarPopUp5()">
							<label for="conorpnegocios">Alto conocimiento mutuo</label>
							<input type="number" class="form-control" name="txtconocimiento" id="txtconocimiento" value="'.$calif['conoci_rpersonal'].'" min="0" max="5" onkeyup="sumrpersonal()"> 
							<span class="popuptext" id="myPopup5">Alto conocimiento mutuo del perfil personal, comercial y empresarial. Alto conocimiento de las expectativas de cada uno.</span>
							</div>
						</div>
						<div class="col-md-2 inline-block">
							<div class="popup" onclick="mostarPopUp6()">
							<label for="resprpnegocios">Alto nivel de respuesta/logro</label>
							<input type="number" class="form-control" name="txtresponsab" id="txtresponsab" value="'.$calif['resp_rpersonal'].'" min="0" max="5" onkeyup="sumrpersonal()"> 
							<span class="popuptext" id="myPopup6">El cliente prefiere mis ofertas  de Productos, Programas y Servicios por sobre las ofertas de la competencia.</span>
							</div>
						</div>
						<div class="col-md-2 inline-block">
							<div class="popup" onclick="mostarPopUp7()">
							<label for="ppsrpnegocio">Alta aceptación PPS(Productos, Programas, Servicios)</label>
							<input type="number" class="form-control" name="txtpps" id="txtpps" value="'.$calif['pps_rpersonal'].'" min="0" max="5" onkeyup="sumrpersonal()"> 
							<span class="popuptext" id="myPopup7">Puedo demostrar que el cliente adopta rapidamente mis ofertas, puedo demostrar que mi portafolio en este cliente esta en crecimiento.</span>
							</div>
						</div>
						<div class="col-md-2 inline-block">
							<div class="popup" onclick="mostarPopUp8()">
							<label for="actitudrpnegogio">Buena actitud recíproca</label>
							<input type="number" class="form-control" name="txtactitud" id="txtactitud" value="'.$calif['actitud_rpersonal'].'" min="0" max="5" onkeyup="sumrpersonal()"> 
							<span class="popuptext" id="myPopup8">Ante un problema este cliente acepta su responsabilidad y yo la mia, cuando le digo "no" este cliente no toma represarias, igual mente yo no tomo represarias cuando me dice "no"
								Puedo demostrar que este cliente me llama no solo para asuntos de mis ofertas si no para otros asuntos.</span>
							</div>
						</div>

						<div class="col-md-2 inline-block">
							<label for="totalpeconomico">Total</label>
							<input type="number" class="form-control" name="txttotrpersonal" id="txttotrpersonal" value="'.$calif['total_rpersonal'].'" min="0"  readonly="readonly"> 
						</div>
					
					</div>	
				</div>
				<!--<button type="submit" class="btn btn-danger" >A</button>-->
				<input type="submit" class="btn btn-primary" value="Actualizar"/>

				<!--<input type="submit" value="Actualizar" class="btn btn-primary" onclick="">	-->
			
	
</form>	
	
';
}

 ?>