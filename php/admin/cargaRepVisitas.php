<?php 
session_start();
//validar si el usuario se Logeo, de lo contrario no lo deje ingresar
if(!$_SESSION)
{
	header("location:../ingreso.php");
}
require '../conexionbd.php';
require '../conexionbdaudi.php';
$usuconsulta=$_SESSION['usuario_sesion'];
$rol=$_SESSION['tipusuario_sesion'];
$zon=$_SESSION['zona_sesion'];

switch ($rol){
		case 0:

	$consulRepVisita = $db -> query("SELECT v.fecha_visita,v.id_cliente,v.nomesporadico_visita,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, cul.nom_cultivo, z.nom_zona ,v.id_usuario,v.sitzona_visita,v.sitcompetencia_visita,v.rvisita_visita 
			FROM visita v, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
			WHERE u.id_usuario <> '$usuconsulta'
			and v.id_usuario = u.id_usuario 
			and v.id_cliente=c.id_cliente 
			and c.id_cliente=cc.id_cliente 
			and cul.id_cultivo=cc.id_cultivo 
			and mun.id_municipio=cm.id_municipio 
			and c.id_cliente=cm.id_cliente 
			and z.id_zona=cz.id_zona 
			and c.id_cliente=cz.id_cliente
		
			and u.id_rol<>'2'
			GROUP BY v.id_visita 
			ORDER By v.fecha_visita DESC LIMIT 5") or die($db->error);
			/* determinar el número de filas del resultado */
			$numFilas = $consulRepVisita->num_rows;	
		break;
	case 1:

$consulRepVisita = $db -> query("SELECT v.fecha_visita,v.id_cliente,v.nomesporadico_visita,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, cul.nom_cultivo, z.nom_zona ,v.id_usuario,v.sitzona_visita,v.sitcompetencia_visita,v.rvisita_visita 
		FROM visita v, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
		WHERE u.id_usuario <> '$usuconsulta'
		and v.id_usuario = u.id_usuario 
		and v.id_cliente=c.id_cliente 
		and c.id_cliente=cc.id_cliente 
		and cul.id_cultivo=cc.id_cultivo 
		and mun.id_municipio=cm.id_municipio 
		and c.id_cliente=cm.id_cliente 
		and z.id_zona=cz.id_zona 
		and c.id_cliente=cz.id_cliente
	
		and u.id_rol<>'2'
		GROUP BY v.id_visita 
		ORDER By v.fecha_visita DESC LIMIT 5") or die($db->error);
		/* determinar el número de filas del resultado */
		$numFilas = $consulRepVisita->num_rows;	
	break;
		case 2:
		//Consulta para los lideres con 1 Zona
		$consulRepVisita=$db->query("SELECT v.fecha_visita,v.id_cliente,v.nomesporadico_visita,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, cul.nom_cultivo, z.nom_zona ,v.id_usuario,v.sitzona_visita,v.sitcompetencia_visita,v.rvisita_visita 
			FROM visita v, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
			WHERE u.id_usuario <> '$usuconsulta'
			and v.id_usuario = u.id_usuario 
			and v.id_cliente=c.id_cliente 
			and c.id_cliente=cc.id_cliente 
			and cul.id_cultivo=cc.id_cultivo 
			and mun.id_municipio=cm.id_municipio 
			and c.id_cliente=cm.id_cliente 
			and z.id_zona=cz.id_zona 
			and c.id_cliente=cz.id_cliente 
			and u.id_zona='$zon'
			GROUP BY v.id_visita
			ORDER By v.fecha_visita DESC LIMIT 5") or die($db->error);
		/* determinar el número de filas del resultado */
					$numFilas = $consulRepVisita->num_rows;	
		
	
		
		break;
		case 3:
		//Consulta para el lider Periferia cundinamarca y Periferia Boyaca.
			$consulRepVisita=$db->query("SELECT v.fecha_visita,v.id_cliente,v.nomesporadico_visita,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, cul.nom_cultivo, 
				z.nom_zona ,v.id_usuario,v.sitzona_visita,v.sitcompetencia_visita,v.rvisita_visita, u.id_usuario, u.id_zona 
			FROM visita v, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
			WHERE u.id_usuario <> '$usuconsulta'
			and v.id_usuario = u.id_usuario
			and v.id_cliente=c.id_cliente 
			and c.id_cliente=cc.id_cliente 
			and cul.id_cultivo=cc.id_cultivo 
			and mun.id_municipio=cm.id_municipio 
			and c.id_cliente=cm.id_cliente 
			and z.id_zona=cz.id_zona 
			and c.id_cliente=cz.id_cliente 
			
			and u.id_zona>='2'
			and u.id_zona<='3' 
			and u.sector_usuario<>'Flores'
			GROUP BY v.id_visita 
			ORDER By v.fecha_visita DESC LIMIT 5") or die($db->error);
			/* determinar el número de filas del resultado */
						$numFilas = $consulRepVisita->num_rows;	
			


		break;
		case 4:
		//Consulta Para el Lider de Flores Sabana y flores Antioquia.
			$consulRepVisita=$db->query("SELECT v.fecha_visita,v.id_cliente,v.nomesporadico_visita,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, cul.nom_cultivo, z.nom_zona ,v.id_usuario,v.sitzona_visita,v.sitcompetencia_visita,v.rvisita_visita 
			FROM visita v, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
			WHERE u.id_usuario <> '$usuconsulta'
			and v.id_usuario = u.id_usuario
			and v.id_cliente=c.id_cliente 
			and c.id_cliente=cc.id_cliente 
			and cul.id_cultivo=cc.id_cultivo 
			and mun.id_municipio=cm.id_municipio 
			and c.id_cliente=cm.id_cliente 
			and z.id_zona=cz.id_zona 
			and c.id_cliente=cz.id_cliente 
			and u.id_zona>='1'and u.id_zona<='3'
			and u.sector_usuario<>'Periferia'
			GROUP BY v.id_visita 
			ORDER By v.fecha_visita DESC LIMIT 5") or die($db->error);
			/* determinar el número de filas del resultado */
						$numFilas = $consulRepVisita->num_rows;	

		break;
		case 5:
			//Consulta Para el Lider de Nariño, Cauca y Huila.
			$consulRepVisita=$db->query("SELECT v.fecha_visita,v.id_cliente,v.nomesporadico_visita,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, cul.nom_cultivo, z.nom_zona ,v.id_usuario,v.sitzona_visita,v.sitcompetencia_visita,v.rvisita_visita 
			FROM visita v, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
			WHERE u.id_usuario <> '$usuconsulta'
			and v.id_usuario = u.id_usuario 
			and v.id_cliente=c.id_cliente 
			and c.id_cliente=cc.id_cliente 
			and cul.id_cultivo=cc.id_cultivo 
			and mun.id_municipio=cm.id_municipio 
			and c.id_cliente=cm.id_cliente 
			and z.id_zona=cz.id_zona 
			and c.id_cliente=cz.id_cliente 
			and u.id_zona>='5'and u.id_zona<='7'
			
			GROUP BY v.id_visita 
			ORDER By v.fecha_visita DESC LIMIT 5") or die($db->error);
			/* determinar el número de filas del resultado */
			$numFilas = $consulRepVisita->num_rows;	
		break;
	}
if ($numFilas>0) {
	echo '<table class="table table-striped  table-condensed table-hover " id="tab_repvisitas" name="tab_repvisitas" cellspacing="0" width="100%">

			<tr class="">
				<th class="">Fecha Visita</th>
				<th class="">Id Cliente</th>
				<th class="">Nombre Cliente</th>
				<th class="">Nombre Esporadico</th>
				<th class="">Tipo Cliente</th>
				<th class="">Zoná</th>
				<th class="">Municipio</th>
				<th class="">Cultivo</th>
				<th class="">Nombre Usuario</th>
				<th class="">Situacion zoná</th>
				<th class="">Situación Competencia</th>
				<th class="">Reporte de Visita</th>
			</tr>';

		while ($resul = $consulRepVisita ->fetch_assoc())
		{

			echo '<tr>
			<td>'.$resul['fecha_visita'].'</td>
			<td>'.$resul['id_cliente'].'</td>
			<td>'.utf8_encode($resul['nom_cliente']).'</td>
			<td>'.utf8_encode($resul['nomesporadico_visita']).'</td>
			<td>'.$resul['tipo_cliente'].'</td>
			<td>'.$resul['nom_zona'].'</td>
			<td>'.utf8_encode($resul['nom_municipio']).'</td>
			<td>'.$resul['nom_cultivo'].'</td>
			<td>'.$resul['id_usuario'].'</td>
			<td>'.$resul['sitzona_visita'].'</td>
			<td>'.$resul['sitcompetencia_visita'].'</td>
			<td>'.$resul['rvisita_visita'].'</td>
			</tr>';

		}



	echo'	</table>';
	/* cerrar el resultset */
	    $consulRepVisita->close();
}
else
{
	echo 'No se encontraron resultados.';
}

/* cerrar la conexión */
$db->close();


?>