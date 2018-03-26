<?php 
require '../controller/conexionbd.php';
/////////////////VARIABLES DE SESION////////////////

/*$usu=$_SESSION['usuario_sesion'];
$rol=$_SESSION['tipusuario_sesion'];
$zon=$_SESSION['zona_sesion'];*/

///////////////////////VARIABLES DE CONSULTA

$usuconsulta=$_POST['usu'];
$finicio=$_POST['fini'];
$ffin=$_POST['ffin'];

if ($usuconsulta==1) {
	$resultado=$db->query("SELECT v.id_visita,v.fecha_visita,v.id_cliente,v.nomesporadico_visita,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, 
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
		and fecha_visita 
		BETWEEN '$finicio' AND '$ffin'
		GROUP BY id_visita 
		ORDER By id_visita ASC") or die($db->error);
	$cantDatos = mysqli_num_rows($resultado);
}
else
{
	$resultado=$db->query("SELECT v.id_visita,v.fecha_visita,v.id_cliente,v.nomesporadico_visita,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, cul.nom_cultivo, 
		z.nom_zona ,v.id_usuario,v.sitzona_visita,v.sitcompetencia_visita,v.rvisita_visita,u.sector_usuario 
		FROM visita v, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
		WHERE v.id_cliente=c.id_cliente 
		and c.id_cliente=cc.id_cliente 
		and cul.id_cultivo=cc.id_cultivo 
		and mun.id_municipio=cm.id_municipio 
		and c.id_cliente=cm.id_cliente 
		and z.id_zona=cz.id_zona 
		and c.id_cliente=cz.id_cliente 
		and v.id_usuario=u.id_usuario
		and v.id_usuario='$usuconsulta' 
		and fecha_visita 
		BETWEEN '$finicio' AND '$ffin' 
		GROUP BY id_visita 
		ORDER By id_visita ASC") or die($db->error);
	$cantDatos = mysqli_num_rows($resultado);
}

if ($cantDatos==0) {
	echo 'No se encontraron resultados en la base de datos, intenta con un nuevo filtro.';
}
else
{
echo'Su consulta encontro: '.$cantDatos . ' datos';

echo '<table class="table table-striped  table-condensed table-hover" id="tab_repvisitas" name="tab_repvisitas" cellspacing="0" width="100%">

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
		<th class="success">Sector Usuario</th>
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
		<td>'.$resul['nom_cultivo'].'</td>
		<td>'.$resul['id_usuario'].'</td>
		<td>'.$resul['sector_usuario'].'</td>
		<td>'.$resul['sitzona_visita'].'</td>
		<td>'.$resul['sitcompetencia_visita'].'</td>
		<td>'.$resul['rvisita_visita'].'</td>
		</tr>';

	}



echo'	</table>'; 

}
//Libero memoria con esta sentecia despues de una consulta
mysqli_free_result($resultado);
//cierro la conexion
mysqli_close($db);

?>