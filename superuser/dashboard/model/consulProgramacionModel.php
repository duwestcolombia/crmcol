<?php 
require '../controller/conexionbd.php';
/////////////////VARIABLES DE SESION////////////////

/*$usu=$_SESSION['usuario_sesion'];
$rol=$_SESSION['tipusuario_sesion'];
$zon=$_SESSION['zona_sesion'];*/

///////////////////////VARIABLES DE CONSULTA

$usuconsulta=$_POST['usu'];
$fini=$_POST['fini'];
$fin=$_POST['ffin'];

$finicio=strtotime($fini)* 1000;

$ffin=strtotime($fin) * 1000;
//echo '<script>alert("Usuario seleccionado : '.date('d-m-y',strtotime($finicio)).'")</script>';

////////////////////CONSULTAS PARA TABLA Y PARA COMBOBOX////////////////////////

if ($usuconsulta==1) {

	$resultado=$db->query("SELECT e.id,e.inicio_normal,e.final_normal,e.id_cliente,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, 
		cul.nom_cultivo, z.nom_zona ,e.id_usuario,e.title,e.body,e.start,e.end,u.sector_usuario 
		FROM eventos e, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
		WHERE e.id_cliente=c.id_cliente 
		and c.id_cliente=cc.id_cliente 
		and cul.id_cultivo=cc.id_cultivo 
		and mun.id_municipio=cm.id_municipio 
		and c.id_cliente=cm.id_cliente 
		and z.id_zona=cz.id_zona 
		and c.id_cliente=cz.id_cliente 
		and e.id_usuario=u.id_usuario
		and e.start >= '$finicio' 
		and e.end <= '$ffin' 
		GROUP BY e.id 
		ORDER By e.id ASC") or die($db->error);
	$cantDatos = mysqli_num_rows($resultado);
}
else
{

	$resultado=$db->query("SELECT e.id,e.inicio_normal,e.final_normal,e.id_cliente,c.nom_cliente,c.tipo_cliente,mun.nom_municipio, 
		cul.nom_cultivo, z.nom_zona ,e.id_usuario,e.title,e.body,e.start,e.end  
		FROM eventos e, cliente c, usuario u, cultivo cul, cliente_cultivo cc, municipio mun, cliente_municipio cm, zona z, cliente_zona cz 
		WHERE e.id_cliente=c.id_cliente 
		and c.id_cliente=cc.id_cliente 
		and cul.id_cultivo=cc.id_cultivo 
		and mun.id_municipio=cm.id_municipio 
		and c.id_cliente=cm.id_cliente 
		and z.id_zona=cz.id_zona 
		and c.id_cliente=cz.id_cliente
		and e.id_usuario=u.id_usuario 
		and e.id_usuario='$usuconsulta' 
		and e.start >= '$finicio' 
		and e.end <= '$ffin' 
		GROUP BY e.id 
		ORDER By e.id ASC") or die($db->error);
		$cantDatos = mysqli_num_rows($resultado);
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
				<th class="danger">Zona</th>
				<th class="danger">Municipio</th>
				<th class="danger">Cultivo</th>
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
	<td>'.$resul['nom_zona'].'</td>
	<td>'.$resul['nom_municipio'].'</td>
	<td>'.utf8_encode($resul['nom_cultivo']).'</td>
	<td>'.$resul['id_usuario'].'</td>
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