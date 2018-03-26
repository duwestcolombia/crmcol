<?php 
session_start();
//validar si el usuario se Logeo, de lo contrario no lo deje ingresar
if(!$_SESSION)
{
	header("location:../ingreso.php");
}
//////////////////CONEXION BD/////////////

require '../conexionbd.php';

$usuconsulta=$_POST['usu'];
$fini=$_POST['finicio'];
$ffin=$_POST['ffin'];
$rol=$_POST['rol'];
$zon=$_SESSION['zona_sesion'];
////////////////////CONSULTAS PARA TABLA Y PARA COMBOBOX////////////////////////
/*switch ($rol) {
	case 0:*/
	if ($usuconsulta=="todos") {
	switch ($rol) {	
		case 2:
			//Consulta para los lideres con 1 Zona
			$resultado=$db->query("SELECT v.fecha_visita,v.id_cliente,v.nomesporadico_visita,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, cul.nom_cultivo, z.nom_zona ,v.id_usuario,v.sitzona_visita,v.sitcompetencia_visita,v.rvisita_visita 
					FROM visita v, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
					WHERE v.id_cliente=c.id_cliente 
					and c.id_cliente=cc.id_cliente 
					and cul.id_cultivo=cc.id_cultivo 
					and mun.id_municipio=cm.id_municipio 
					and c.id_cliente=cm.id_cliente 
					and z.id_zona=cz.id_zona 
					and c.id_cliente=cz.id_cliente 
					and z.id_zona='$zon'
					and v.fecha_visita 
					BETWEEN '$fini' AND '$ffin' 
					GROUP BY v.id_visita 
					ORDER By v.fecha_visita ASC") or die($db->error);
				$cantDatos = mysqli_num_rows($resultado);
			
			break;
			case 3:
			//Consulta para el lider Periferia cundinamarca y Periferia Boyaca.
			$resultado=$db->query("SELECT v.fecha_visita,v.id_cliente,v.nomesporadico_visita,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, 
				cul.nom_cultivo, z.nom_zona ,v.id_usuario,v.sitzona_visita,v.sitcompetencia_visita,v.rvisita_visita,u.sector_usuario
				FROM visita v, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
				WHERE v.id_cliente=c.id_cliente 
				and c.id_cliente=cc.id_cliente 
				and cul.id_cultivo=cc.id_cultivo 
				and mun.id_municipio=cm.id_municipio 
				and c.id_cliente=cm.id_cliente 
				and z.id_zona=cz.id_zona 
				and c.id_cliente=cz.id_cliente 
				and v.id_usuario=u.id_usuario
				and z.id_zona>='2'
				and z.id_zona<='3'
				and u.sector_usuario<>'Flores'
				and v.fecha_visita 
				BETWEEN '$fini' AND '$ffin' 
				GROUP BY v.id_visita 
				ORDER By v.fecha_visita ASC") or die($db->error);
			$cantDatos = mysqli_num_rows($resultado);

			break;
			case 4:
			//Consulta Para el Lider de Flores Sabana y flores Antioquia.
			$resultado=$db->query("SELECT v.fecha_visita,v.id_cliente,v.nomesporadico_visita,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, 
				cul.nom_cultivo, z.nom_zona ,v.id_usuario,v.sitzona_visita,v.sitcompetencia_visita,v.rvisita_visita,u.sector_usuario
				FROM visita v, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
				WHERE v.id_cliente=c.id_cliente 
				and c.id_cliente=cc.id_cliente 
				and cul.id_cultivo=cc.id_cultivo 
				and mun.id_municipio=cm.id_municipio 
				and c.id_cliente=cm.id_cliente 
				and z.id_zona=cz.id_zona 
				and c.id_cliente=cz.id_cliente 
				and v.id_usuario=u.id_usuario
				and z.id_zona>='1'
				and z.id_zona<='3'
				and u.sector_usuario<>'Periferia'
				and v.fecha_visita 
				BETWEEN '$fini' AND '$ffin' 
				GROUP BY v.id_visita 
				ORDER By v.fecha_visita ASC") or die($db->error);
			$cantDatos = mysqli_num_rows($resultado);

			break;
			case 5:
				//Consulta Para el Lider de Nariño, Cauca y Huila.
				$resultado=$db->query("SELECT v.fecha_visita,v.id_cliente,v.nomesporadico_visita,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, cul.nom_cultivo, z.nom_zona ,v.id_usuario,v.sitzona_visita,v.sitcompetencia_visita,v.rvisita_visita 
				FROM visita v, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
				WHERE v.id_cliente=c.id_cliente 
				and c.id_cliente=cc.id_cliente 
				and cul.id_cultivo=cc.id_cultivo 
				and mun.id_municipio=cm.id_municipio 
				and c.id_cliente=cm.id_cliente 
				and z.id_zona=cz.id_zona 
				and c.id_cliente=cz.id_cliente 
				and z.id_zona>='5'
				and z.id_zona<='7' 
				and v.fecha_visita 
				BETWEEN '$fini' AND '$ffin' 
				GROUP BY v.id_visita ASC") or die($db->error);
				$cantDatos = mysqli_num_rows($resultado);
			break;
		}


		
	}
	else
	{

	$resultado=$db->query("SELECT v.fecha_visita,v.id_cliente,v.nomesporadico_visita,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, 
		cul.nom_cultivo, z.nom_zona ,v.id_usuario,v.sitzona_visita,v.sitcompetencia_visita,v.rvisita_visita 
		FROM visita v, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
		WHERE v.id_cliente=c.id_cliente 
		and c.id_cliente=cc.id_cliente 
		and cul.id_cultivo=cc.id_cultivo 
		and mun.id_municipio=cm.id_municipio 
		and c.id_cliente=cm.id_cliente 
		and z.id_zona=cz.id_zona 
		and c.id_cliente=cz.id_cliente 
		and v.id_usuario='$usuconsulta' 
		and v.fecha_visita 
		BETWEEN '$fini' AND '$ffin' 
		GROUP BY v.id_visita 
		ORDER By v.fecha_visita ASC") or die($db->error);
	$cantDatos = mysqli_num_rows($resultado);
	}	

if ($cantDatos==0) {
	echo 'No se encontraron resultados en la base de datos, intenta con un nuevo filtro.';
}
else
{

echo '<p>'.$cantDatos.' registros encontrados</p>
	<table class="table table-striped table-bordered table-condensed " id="tab_repvisitas" name="tab_repvisitas" cellspacing="0" width="100%">

		<tr>
		<th class="success">Fecha Visita</th>
		<th class="success">Id Cliente</th>
		<th class="success">Nombre Cliente</th>
		<th class="success">Nombre Cliente Esporadico</th>
		<th class="success">Tipo Cliente</th>
		<th class="success">Zoná</th>
		<th class="success">Municipio</th>
		<th class="success">Cultivo</th>
		<th class="success">Nombre Usuario</th>
		<th class="success">Situacion zoná</th>
		<th class="success">Situación Competencia</th>
		<th class="success">Reporte de Visita</th>


		</tr>';

	while ($resul = $resultado ->fetch_array(MYSQLI_BOTH))
	{

		echo '<tr>
		<td>'.$resul['fecha_visita'].'</td>
		<td>'.$resul['id_cliente'].'</td>
		<td>'.utf8_encode($resul['nom_cliente']).'</td>
		<td>'.utf8_encode($resul['nomesporadico_visita']).'</td>
		<td>'.$resul['tipo_cliente'].'</td>
		<td>'.$resul['nom_zona'].'</td>
		<td>'.utf8_encode($resul['nom_municipio']).'</td>
		<td>'.utf8_encode($resul['nom_cultivo']).'</td>
		<td>'.$resul['id_usuario'].'</td>
		<td>'.$resul['sitzona_visita'].'</td>
		<td>'.$resul['sitcompetencia_visita'].'</td>
		<td>'.$resul['rvisita_visita'].'</td>
		</tr>';

	}



echo'	</table>'; 

	/*while ($data = mysqli_fetch_assoc($resultado)) 
	{
		$arreglo["data"][] = array_map("utf8_encode", $data);
	}
	echo json_encode($arreglo);*/
}
//Libero memoria con esta sentecia despues de una consulta
mysqli_free_result($resultado);

//cierro la conexion
mysqli_close($db);

//echo 'Usuario: ' . $usuario . " fecha ini " .$finicio. " fecha fin " . $ffin. "Rol " .$rol
 ?>