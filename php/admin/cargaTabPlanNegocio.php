<?php 
session_start();
//validar si el usuario se Logeo, de lo contrario no lo deje ingresar
if(!$_SESSION)
{
	header("location:../ingreso.php");
}
require '../conexionbd.php';
require '../conexionbdaudi.php';

$usu=$_POST['usu'];
$rol=$_SESSION['tipusuario_sesion'];
$zon=$_SESSION['zona_sesion'];

if (empty($_POST['cli'])) 
{
	//echo "No mandaste el cliente";
	/*YA ESTA VALIDADNDO
	SOLO HACE FALTA PONER EN ESTA PARTE LA SENTENCIA SQL PARA QUE CONSULTE TODOS LOS PLANES DE NEGOCIO SUBIDOS POR UN  USUARIO*/
	if ($usu=="todos") 
	{
		switch ($rol) 
		{
			case 2:
				$consulTab=$db->query("SELECT pn.id_pnegocio, pn.id_cliente, pn.id_usuario, pn.ncuadrante_pnegocio, pn.id_cultivo, pn.anioini_pnegocio, pn.hecsemini_pnegocio, 
					pn.vpbiologicoini_pnegocio, pn.totpbiologicoini_pnegocio, pn.vhistoricasini_pnegocio, pn.aniofin_pnegocio, pn.hecsemfin_pnegocio, 
					pn.vpbiologicofin_pnegocio, pn.totpbiologicofin_pnegocio, pn.metaventatotalfin_pnegocio, pn.costumershareini_pnegocio, pn.costumersharefin_pnegocio,
					pn.numvisitas_pnegocio, pn.frecuencia_pnegocio, pn.flimite_pnegocio, pn.fregistro_pnegocio, pn.id_cultivo,c.id_cliente, c.nom_cliente, cul.id_cultivo,
					cul.nom_cultivo, u.nom_usuario, u.sector_usuario, z.id_zona  
					FROM plan_negocio pn, rpn r, cliente c, cultivo cul, usuario u, zona z
					WHERE pn.id_cliente=c.id_cliente 
					AND pn.id_cultivo = cul.id_cultivo
					AND pn.id_usuario=u.id_usuario
					AND z.id_zona=u.id_zona
					AND pn.id_usuario<>'$usu'
					AND u.sector_usuario<>'Administracion'
					AND u.sector_usuario<>'Flores'
					AND u.id_zona='$zon'
					GROUP BY pn.id_pnegocio")or die("Error al cargar la tabla: " . $db->error);


				/* determinar el número de filas del resultado */
				$numFilas = $consulTab->num_rows;
				break;
			
			case 3:
				//Consulta para el lider Periferia cundinamarca y Periferia Boyaca.
				$consulTab=$db->query("SELECT pn.id_pnegocio, pn.id_cliente, pn.id_usuario, pn.ncuadrante_pnegocio, pn.id_cultivo, pn.anioini_pnegocio, pn.hecsemini_pnegocio, 
					pn.vpbiologicoini_pnegocio, pn.totpbiologicoini_pnegocio, pn.vhistoricasini_pnegocio, pn.aniofin_pnegocio, pn.hecsemfin_pnegocio, 
					pn.vpbiologicofin_pnegocio, pn.totpbiologicofin_pnegocio, pn.metaventatotalfin_pnegocio, pn.costumershareini_pnegocio, pn.costumersharefin_pnegocio,
					pn.numvisitas_pnegocio, pn.frecuencia_pnegocio, pn.flimite_pnegocio, pn.fregistro_pnegocio, pn.id_cultivo,c.id_cliente, c.nom_cliente, cul.id_cultivo,
					cul.nom_cultivo, u.nom_usuario, u.sector_usuario, z.id_zona, r.accion_rpn   
					FROM plan_negocio pn, rpn r, cliente c, cultivo cul, usuario u, zona z
					WHERE pn.id_cliente=c.id_cliente 
					AND pn.id_cultivo = cul.id_cultivo
					AND pn.id_usuario=u.id_usuario
					AND z.id_zona=u.id_zona
					AND u.id_usuario<>'$usu'
					AND u.sector_usuario<>'Flores'
					AND z.id_zona between 2 and 3
					GROUP BY pn.id_usuario")or die("Error al cargar la tabla: " . $db->error);


				/* determinar el número de filas del resultado */
				$numFilas = $consulTab->num_rows;
				break;
			case 4:
			//Consulta Para el Lider de Flores Sabana y flores Antioquia.
				$consulTab=$db->query("SELECT pn.id_pnegocio, pn.id_cliente, pn.id_usuario, pn.ncuadrante_pnegocio, pn.id_cultivo, pn.anioini_pnegocio, pn.hecsemini_pnegocio, 
					pn.vpbiologicoini_pnegocio, pn.totpbiologicoini_pnegocio, pn.vhistoricasini_pnegocio, pn.aniofin_pnegocio, pn.hecsemfin_pnegocio, 
					pn.vpbiologicofin_pnegocio, pn.totpbiologicofin_pnegocio, pn.metaventatotalfin_pnegocio, pn.costumershareini_pnegocio, pn.costumersharefin_pnegocio,
					pn.numvisitas_pnegocio, pn.frecuencia_pnegocio, pn.flimite_pnegocio, pn.fregistro_pnegocio, pn.id_cultivo,c.id_cliente, c.nom_cliente, cul.id_cultivo,
					cul.nom_cultivo, u.nom_usuario, u.sector_usuario, z.id_zona   
					FROM plan_negocio pn, rpn r, cliente c, cultivo cul, usuario u, zona z
					WHERE pn.id_cliente=c.id_cliente

					AND pn.id_cultivo = cul.id_cultivo
					AND pn.id_usuario=u.id_usuario
					AND z.id_zona=u.id_zona
					AND u.id_usuario<>'$usu'
					AND u.sector_usuario<>'Periferia'
					AND z.id_zona between 1 and 3
					GROUP BY pn.id_pnegocio")or die("Error al cargar la tabla: " . $db->error);

				/* determinar el número de filas del resultado */
				$numFilas = $consulTab->num_rows;
				break;
			case 5:
				$consulTab=$db->query("SELECT pn.id_pnegocio, pn.id_cliente, pn.id_usuario, pn.ncuadrante_pnegocio, pn.id_cultivo, pn.anioini_pnegocio, pn.hecsemini_pnegocio, 
					pn.vpbiologicoini_pnegocio, pn.totpbiologicoini_pnegocio, pn.vhistoricasini_pnegocio, pn.aniofin_pnegocio, pn.hecsemfin_pnegocio, 
					pn.vpbiologicofin_pnegocio, pn.totpbiologicofin_pnegocio, pn.metaventatotalfin_pnegocio, pn.costumershareini_pnegocio, pn.costumersharefin_pnegocio,
					pn.numvisitas_pnegocio, pn.frecuencia_pnegocio, pn.flimite_pnegocio, pn.fregistro_pnegocio, pn.id_cultivo,c.id_cliente, c.nom_cliente, cul.id_cultivo,
					cul.nom_cultivo, u.nom_usuario, u.sector_usuario, z.id_zona   
					FROM plan_negocio pn, rpn r, cliente c, cultivo cul, usuario u, zona z
					WHERE pn.id_cliente=c.id_cliente 
					AND pn.id_cultivo = cul.id_cultivo
					AND pn.id_usuario=u.id_usuario
					AND z.id_zona=u.id_zona
					AND u.id_usuario<>'$usu'
					AND z.id_zona between 5 and 7
					GROUP BY pn.id_pnegocio")or die("Error al cargar la tabla: " . $db->error);
				/* determinar el número de filas del resultado */
				$numFilas = $consulTab->num_rows;
				break;		
		}

	}
	else
	{
		//echo'No elegiste todos';
	$consulTab=$db->query("SELECT pn.id_pnegocio, pn.id_cliente, pn.id_usuario, pn.ncuadrante_pnegocio, pn.id_cultivo, pn.anioini_pnegocio, pn.hecsemini_pnegocio, 
		pn.vpbiologicoini_pnegocio, pn.totpbiologicoini_pnegocio, pn.vhistoricasini_pnegocio, pn.aniofin_pnegocio, pn.hecsemfin_pnegocio, 
		pn.vpbiologicofin_pnegocio, pn.totpbiologicofin_pnegocio, pn.metaventatotalfin_pnegocio, pn.costumershareini_pnegocio, pn.costumersharefin_pnegocio,
		pn.numvisitas_pnegocio, pn.frecuencia_pnegocio, pn.flimite_pnegocio, pn.fregistro_pnegocio, pn.id_cultivo,c.id_cliente, c.nom_cliente, cul.id_cultivo,
		cul.nom_cultivo, u.nom_usuario, u.sector_usuario, z.id_zona   
		FROM plan_negocio pn, rpn r, cliente c, cultivo cul, usuario u, zona z
		WHERE pn.id_cliente=c.id_cliente 
		AND pn.id_cultivo = cul.id_cultivo
		AND pn.id_usuario=u.id_usuario
		AND z.id_zona=u.id_zona
		AND pn.id_usuario='$usu' 
		GROUP BY pn.id_pnegocio")or die("Error al cargar la tabla: " . $db->error);


	/* determinar el número de filas del resultado */
	$numFilas = $consulTab->num_rows;
	}
}
else
{
$cli=$_POST['cli'];

$consulTab=$db->query("SELECT pn.id_pnegocio, pn.id_cliente, pn.id_usuario, pn.ncuadrante_pnegocio, pn.id_cultivo, pn.anioini_pnegocio, pn.hecsemini_pnegocio, 
	pn.vpbiologicoini_pnegocio, pn.totpbiologicoini_pnegocio, pn.vhistoricasini_pnegocio, pn.aniofin_pnegocio, pn.hecsemfin_pnegocio, 
	pn.vpbiologicofin_pnegocio, pn.totpbiologicofin_pnegocio, pn.metaventatotalfin_pnegocio, pn.costumershareini_pnegocio, pn.costumersharefin_pnegocio,
	pn.numvisitas_pnegocio, pn.frecuencia_pnegocio, pn.flimite_pnegocio, pn.fregistro_pnegocio, pn.id_cultivo,c.id_cliente, c.nom_cliente, cul.id_cultivo,
	cul.nom_cultivo, u.nom_usuario, u.sector_usuario, z.id_zona, r.accion_rpn   
	FROM plan_negocio pn, rpn r, cliente c, cultivo cul, usuario u, zona z
	WHERE c.id_cliente='$cli'
	AND pn.id_cliente=c.id_cliente 
	AND pn.id_cultivo = cul.id_cultivo
	AND pn.id_usuario=u.id_usuario
	AND z.id_zona=u.id_zona
	AND pn.id_usuario='$usu' 
	GROUP BY pn.id_pnegocio")or die("Error al cargar la tabla: " . $db->error);


/* determinar el número de filas del resultado */
$numFilas = $consulTab->num_rows;
}

if ($numFilas>0) {
	echo '<div class="table-responsive">
	<table id="tab_planNegocio" class="table table-bordered table-condensed table-hover">
			<tr>
			
				<th>Fecha de Registro</th>
				<th>Responsable</th>
				<th>Cliente</th>
				<th>Numero de Cuadrante</th>
				<th>Cultivo</th>
				<th>Año de Inicio</th>
				<th>Hect. Sembradas ini</th>
				<th>Val. pbiologico ini</th>
				<th>Tot. pbiologico ini</th>
				<th>Ventas historicas</th>
				<th>Año de Finalizacion</th>
				<th>Hec. sembradas fin</th>
				<th>Val. pbiologico fin</th>
				<th>Tot. pbiologico fin</th>
				<th>Meta de Ventas</th>
				<th>Fecha limite para lograrlo</th>
				<th>Acción</th>
				<!--<th>Accion</th>-->
				<th style="visibility: hidden"></th>
			</tr>';

	while ($res=$consulTab->fetch_assoc()) {
		
		echo '<tr>
					
					<td>'.$res['fregistro_pnegocio'].'</td>
					<td>'.utf8_encode($res['nom_usuario']).'</td>
					<td>'.$res['nom_cliente'].'</td>
					<td>'.$res['ncuadrante_pnegocio'].'</td>
					<td>'.$res['nom_cultivo'].'</td>
					<td>'.$res['anioini_pnegocio'].'</td>
					<td>'.$res['hecsemini_pnegocio'].'</td>
					<td>'.$res['vpbiologicoini_pnegocio'].'</td>
					<td>'.$res['totpbiologicoini_pnegocio'].'</td>
					<td>'.$res['vhistoricasini_pnegocio'].'</td>
					<td>'.$res['aniofin_pnegocio'].'</td>
					<td>'.$res['vpbiologicofin_pnegocio'].'</td>
					<td>'.$res['hecsemfin_pnegocio'].'</td>
					<td>'.$res['totpbiologicofin_pnegocio'].'</td>
					<td>'.$res['metaventatotalfin_pnegocio'].'</td>
					<td>'.$res['flimite_pnegocio'].'</td>
					<td>'.$res['accion_rpn'].'</td>
					<!--<td><button type="button" class="btn btn-primary" aria-label="Left Align" onclick="pNegocioPDF('.$res['id_cliente'].','.$res['id_cultivo'].');" >
	  					<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
					</button>
					</td>-->
					<td style="visibility: hidden">'.$res['id_cultivo'].'</td>
				</tr>';

		
	}
	echo '</table>
	</div>';
	/* cerrar el resultset */
    $consulTab->close();	
}
else
{
	echo 'No se encontraron resultados.';
}
/* cerrar la conexión */
$db->close();



?>

