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
$fin=$_POST['ffin'];
$rol=$_POST['rol'];
$usuSesion = $_SESSION['usuario_sesion'];
/*$inormal=date('d-m-y',strtotime($finicio));
$ifinal=date('d-m-y',strtotime($ffin));*/
//echo '<script>alert("'.$fini.'")</script>';
$finicio=strtotime($fini)* 1000;

$ffin=strtotime($fin) * 1000;
/*
echo '<script>alert("'.$finicio.'")</script>';
echo '<script>alert("'.$ffin.'")</script>';
*/
////////////////////CONSULTAS PARA TABLA Y PARA COMBOBOX////////////////////////
if ($usuconsulta=="todos") 
{
	$resultado = $db->query("SELECT	e.id,e.inicio_normal,e.final_normal,e.id_cliente,e.start,e.end,u.nom_usuario,e.title,e.body,
	c.nom_cliente,c.tipo_cliente,mun.nom_municipio
	FROM	eventos e, cliente c, usuario u, municipio mun, cliente_municipio cm
	WHERE c.id_cliente = e.id_cliente
	AND	u.id_usuario = e.id_usuario
	AND	cm.id_cliente = c.id_cliente
	AND	mun.id_municipio = cm.id_municipio
	AND	u.jefe_usuario = $usuSesion
	AND e.start >= $finicio
	AND e.end <= $ffin
	GROUP BY	e.id
	ORDER BY e.inicio_normal ASC")or die ($db->error);
	$cantDatos = mysqli_num_rows($resultado);

	// print_r($usuSesion);

	// switch ($rol) {	
	// 	case 2:
	// 	$resultado=$db->query("SELECT e.id,e.inicio_normal,e.final_normal,e.id_cliente,e.start,e.end,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, cul.nom_cultivo, z.nom_zona ,e.id_usuario,e.title,e.body 
	// 		FROM eventos e, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
	// 		WHERE e.id_cliente=c.id_cliente 
	// 		and c.id_cliente=cc.id_cliente 
	// 		and cul.id_cultivo=cc.id_cultivo 
	// 		and mun.id_municipio=cm.id_municipio 
	// 		and c.id_cliente=cm.id_cliente 
	// 		and z.id_zona=cz.id_zona 
	// 		and c.id_cliente=cz.id_cliente 
	// 		and z.id_zona='$zon'
	// 		and e.start >= '$finicio'
	// 		and e.end <= '$ffin'
	// 		GROUP BY e.id 
	// 		ORDER By e.inicio_normal ASC") or die($db->error);
	// 	$cantDatos = mysqli_num_rows($resultado);
	// 		//echo '<script>alert("Usuario seleccionado : '.$usuconsulta.'")</script>';

	// 	break;
	// 	case 3:
	// 	$resultado=$db->query("SELECT e.id,e.inicio_normal,e.final_normal,e.id_cliente,e.start,e.end,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, cul.nom_cultivo, z.nom_zona ,e.id_usuario,e.title,e.body 
	// 		FROM eventos e, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
	// 		WHERE e.id_cliente=c.id_cliente 
	// 		and c.id_cliente=cc.id_cliente 
	// 		and cul.id_cultivo=cc.id_cultivo 
	// 		and mun.id_municipio=cm.id_municipio 
	// 		and c.id_cliente=cm.id_cliente 
	// 		and z.id_zona=cz.id_zona 
	// 		and c.id_cliente=cz.id_cliente 
	// 		and z.id_zona>='2'
	// 		and z.id_zona<='3'
	// 		and u.sector_usuario<>'Flores'
	// 		and e.start >= '$finicio'
	// 		and e.end <= '$ffin' 
	// 		GROUP BY e.id 
	// 		ORDER By e.inicio_normal ASC") or die($db->error);
	// 	$cantDatos = mysqli_num_rows($resultado);
	// 	break;
	// 	case 4:
	// 	//Consulta Para el Lider de Flores Sabana y flores Antioquia.
	// 	$resultado=$db->query("SELECT e.id,e.inicio_normal,e.final_normal,e.id_cliente,e.start,e.end,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, cul.nom_cultivo, z.nom_zona ,e.id_usuario,e.title,e.body 
	// 		FROM eventos e, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
	// 		WHERE e.id_cliente=c.id_cliente 
	// 		and c.id_cliente=cc.id_cliente 
	// 		and cul.id_cultivo=cc.id_cultivo 
	// 		and mun.id_municipio=cm.id_municipio 
	// 		and c.id_cliente=cm.id_cliente 
	// 		and z.id_zona=cz.id_zona 
	// 		and c.id_cliente=cz.id_cliente 
	// 		and e.id_usuario=u.id_usuario
	// 		and z.id_zona>='1'
	// 		and z.id_zona<='3'
	// 		and u.sector_usuario<>'Periferia'
	// 		and e.start >= '$finicio'
	// 		and e.end <= '$ffin'
	// 		GROUP BY e.id 
	// 		ORDER By e.inicio_normal ASC") or die($db->error);
	// 		$cantDatos = mysqli_num_rows($resultado);
	// 		//echo '<script>alert("registros encontrados '.$cantDatos.'")</script>';
	// 	break;
	// 	case 5:
	// 	$resultado=$db->query("SELECT e.id,e.inicio_normal,e.final_normal,e.id_cliente,e.start,e.end,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, cul.nom_cultivo, z.nom_zona ,e.id_usuario,e.title,e.body 
	// 		FROM eventos e, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
	// 		WHERE e.id_cliente=c.id_cliente 
	// 		and c.id_cliente=cc.id_cliente 
	// 		and cul.id_cultivo=cc.id_cultivo 
	// 		and mun.id_municipio=cm.id_municipio 
	// 		and c.id_cliente=cm.id_cliente 
	// 		and z.id_zona=cz.id_zona 
	// 		and c.id_cliente=cz.id_cliente 
	// 		and z.id_zona>='5'
	// 		and z.id_zona<='7'
	// 		and e.start >= '$finicio'
	// 		and e.end <= '$ffin'
	// 		GROUP BY e.id 
	// 		ORDER By e.inicio_normal ASC") or die($db->error);
	// 		$cantDatos = mysqli_num_rows($resultado);
	// 	break;
		
	// 		}
}
else
{
	$resultado = $db->query("SELECT	e.id,e.inicio_normal,e.final_normal,e.id_cliente,e.start,e.end,u.nom_usuario,e.title,e.body,
	c.nom_cliente,c.tipo_cliente,mun.nom_municipio
	FROM	eventos e, cliente c, usuario u, municipio mun, cliente_municipio cm
	WHERE c.id_cliente = e.id_cliente
	AND	u.id_usuario = e.id_usuario
	AND	cm.id_cliente = c.id_cliente
	AND	mun.id_municipio = cm.id_municipio
	AND	u.id_usuario = $usuconsulta
	AND e.start >= $finicio
	AND e.end <= $ffin
	GROUP BY	e.id
	ORDER BY e.inicio_normal ASC")or die ($db->error);
	$cantDatos = mysqli_num_rows($resultado);
		// $resultado=$db->query("SELECT e.id,e.inicio_normal,e.final_normal,e.id_cliente,e.start,e.end,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, cul.nom_cultivo, z.nom_zona ,e.id_usuario,e.title,e.body 
		// 	FROM eventos e, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
		// 	WHERE e.id_cliente=c.id_cliente 
		// 	and c.id_cliente=cc.id_cliente 
		// 	and cul.id_cultivo=cc.id_cultivo 
		// 	and mun.id_municipio=cm.id_municipio 
		// 	and c.id_cliente=cm.id_cliente 
		// 	and z.id_zona=cz.id_zona 
		// 	and c.id_cliente=cz.id_cliente 
		// 	and e.id_usuario='$usuconsulta' 
		// 	and e.start >= '$finicio'
		// 	and e.end <= '$ffin'
		// 	GROUP BY e.id 
		// 	ORDER By e.inicio_normal ASC") or die($db->error);
		// 	$cantDatos = mysqli_num_rows($resultado);


}

		if ($cantDatos==0) {
			echo 'No se encontraron resultados en la base de datos, intenta con un nuevo filtro.';
		}
		else
		{
			echo 'Su busqueda arrojo '.$cantDatos.' resultados.</br>			
			<table class="table table-striped table-bordered table-condensed ">

					<tr>

						<th class="danger">Fecha Inicio</th>
						<th class="danger">Fecha Final</th>
						<th class="danger">Id Cliente</th>
						<th class="danger">Nombre Cliente</th>
						<th class="danger">Tipo Cliente</th>
						<th class="danger">Municipio</th>
						<th class="danger">Nombre Usuario</th>
						<th class="danger">Titulo Actividad</th>
						<th class="danger">Actividad Programada</th>

					</tr>';
		while ($resul = $resultado ->fetch_array(MYSQLI_BOTH))
		{
			echo'<tr>

			<td>'.$resul['inicio_normal'].'</td>
			<td>'.$resul['final_normal'].'</td>
			<td>'.$resul['id_cliente'].'</td>
			<td>'.utf8_encode($resul['nom_cliente']).'</td>
			<td>'.$resul['tipo_cliente'].'</td>
			<td>'.$resul['nom_municipio'].'</td>
			<td>'.$resul['nom_usuario'].'</td>
			<td>'.utf8_encode($resul['title']).'</td>
			<td>'.utf8_encode($resul['body']).'</td>



			</tr>';

		}
		echo'	</table>';
		} 
		//Libero memoria con esta sentecia despues de una consulta
		mysqli_free_result($resultado);
		//cierro la conexion
		mysqli_close($db);

?>