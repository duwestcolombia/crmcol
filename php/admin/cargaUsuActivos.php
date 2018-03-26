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

switch ($rol) {
	case 0:
		$consulUsuactivos=$dbaudi->query("SELECT * FROM log ORDER BY id_log DESC LIMIT 5")or die($dbaudi->error);

		echo '<table class="table table-striped  table-condensed table-hover " id="tab_repvisitas" name="tab_repvisitas" cellspacing="0" width="100%">

				<tr class="">
					<th class="">Tipo Registro</th>
					<th class="">Fecha y Hora</th>
					<th class="">Nombre usuario</th>
				
				</tr>';

				while ($resul = $consulUsuactivos ->fetch_assoc())
				{

					echo '<tr>
					<td>'.$resul['nom_log'].'</td>
					<td>'.$resul['fecha_log'].'</td>
					<td>'.$resul['id_usuario'].'</td>';

				}

		echo'	</table>';

	break;
	case 1:
		$consulUsuactivos=$dbaudi->query("SELECT * FROM log ORDER BY id_log DESC LIMIT 5")or die($dbaudi->error);

		echo '<table class="table table-striped  table-condensed table-hover " id="tab_repvisitas" name="tab_repvisitas" cellspacing="0" width="100%">

				<tr class="">
					<th class="">Tipo Registro</th>
					<th class="">Fecha y Hora</th>
					<th class="">Nombre usuario</th>
				
				</tr>';

				while ($resul = $consulUsuactivos ->fetch_assoc())
				{

					echo '<tr>
					<td>'.$resul['nom_log'].'</td>
					<td>'.$resul['fecha_log'].'</td>
					<td>'.$resul['id_usuario'].'</td>';

				}

		echo'	</table>';

	break;
	//lider con una zona
	case 2:
		$consulUsuactivos=$dbaudi->query("SELECT u.id_usuario,u.id_zona,u.sector_usuario,l.id_usuario,l.nom_log,l.fecha_log FROM log l, usuario u 
			WHERE u.id_usuario=l.id_usuario
			AND u.id_zona='$zon' 
			ORDER BY id_log DESC LIMIT 5")or die($dbaudi->error);

		echo '<table class="table table-striped  table-condensed table-hover " id="tab_repvisitas" name="tab_repvisitas" cellspacing="0" width="100%">

				<tr class="">
					<th class="">Tipo Registro</th>
					<th class="">Fecha y Hora</th>
					<th class="">Nombre usuario</th>
				
				</tr>';

				while ($resul = $consulUsuactivos ->fetch_assoc())
				{

					echo '<tr>
					<td>'.$resul['nom_log'].'</td>
					<td>'.$resul['fecha_log'].'</td>
					<td>'.$resul['id_usuario'].'</td>';

				}

		echo'	</table>';
	break;
	//lider cundi boyaca
	case 3:
		$consulUsuactivos=$dbaudi->query("SELECT u.id_usuario,u.id_zona,u.sector_usuario,l.id_usuario,l.nom_log,l.fecha_log FROM log l, usuario u 
			WHERE u.id_usuario=l.id_usuario
			and u.id_zona>='2'
			and u.id_zona<='3' 
			and u.sector_usuario<>'Flores' 
			ORDER BY id_log DESC LIMIT 5")or die($dbaudi->error);

		echo '<table class="table table-striped  table-condensed table-hover " id="tab_repvisitas" name="tab_repvisitas" cellspacing="0" width="100%">

				<tr class="">
					<th class="">Tipo Registro</th>
					<th class="">Fecha y Hora</th>
					<th class="">Nombre usuario</th>
				
				</tr>';

				while ($resul = $consulUsuactivos ->fetch_assoc())
				{

					echo '<tr>
					<td>'.$resul['nom_log'].'</td>
					<td>'.$resul['fecha_log'].'</td>
					<td>'.$resul['id_usuario'].'</td>';

				}

		echo'	</table>';
	break;
	//Flores
	case 4:
		$consulUsuactivos=$dbaudi->query("SELECT u.id_usuario,u.id_zona,u.sector_usuario,l.id_usuario,l.nom_log,l.fecha_log FROM log l, usuario u 
			WHERE u.id_usuario=l.id_usuario
			and u.id_zona>='1'
			and u.id_zona<='3' 
			and u.sector_usuario<>'Periferia' 
			ORDER BY id_log DESC LIMIT 5")or die($dbaudi->error);

		echo '<table class="table table-striped  table-condensed table-hover " id="tab_repvisitas" name="tab_repvisitas" cellspacing="0" width="100%">

				<tr class="">
					<th class="">Tipo Registro</th>
					<th class="">Fecha y Hora</th>
					<th class="">Nombre usuario</th>
				
				</tr>';

				while ($resul = $consulUsuactivos ->fetch_assoc())
				{

					echo '<tr>
					<td>'.$resul['nom_log'].'</td>
					<td>'.$resul['fecha_log'].'</td>
					<td>'.$resul['id_usuario'].'</td>';

				}

		echo'	</table>';
	break;
	case 5:
		$consulUsuactivos=$dbaudi->query("SELECT u.id_usuario,u.id_zona,u.sector_usuario,l.id_usuario,l.nom_log,l.fecha_log FROM log l, usuario u 
			WHERE u.id_usuario=l.id_usuario
			and u.id_zona>='5'
			and u.id_zona<='7' 
			
			ORDER BY id_log DESC LIMIT 5")or die($dbaudi->error);

		echo '<table class="table table-striped  table-condensed table-hover " id="tab_repvisitas" name="tab_repvisitas" cellspacing="0" width="100%">

				<tr class="">
					<th class="">Tipo Registro</th>
					<th class="">Fecha y Hora</th>
					<th class="">Nombre usuario</th>
				
				</tr>';

				while ($resul = $consulUsuactivos ->fetch_assoc())
				{

					echo '<tr>
					<td>'.$resul['nom_log'].'</td>
					<td>'.$resul['fecha_log'].'</td>
					<td>'.$resul['id_usuario'].'</td>';

				}

		echo'	</table>';
	break;

}

?>