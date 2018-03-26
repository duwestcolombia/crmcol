<?php 
session_start();
//validar si el usuario se Logeo, de lo contrario no lo deje ingresar
if(!$_SESSION)
{
	header("location:../ingreso.php");
}
require '../conexionbd.php';
require '../conexionbdaudi.php';

$usu=$_SESSION['usuario_sesion'];
$cli=$_POST['cli'];

$consulTab=$db->query("SELECT pn.id_pnegocio, pn.id_cliente, pn.id_usuario, pn.ncuadrante_pnegocio, pn.id_cultivo, pn.anioini_pnegocio, pn.hecsemini_pnegocio, 
	pn.vpbiologicoini_pnegocio, pn.totpbiologicoini_pnegocio, pn.vhistoricasini_pnegocio, pn.aniofin_pnegocio, pn.hecsemfin_pnegocio, 
	pn.vpbiologicofin_pnegocio, pn.totpbiologicofin_pnegocio, pn.metaventatotalfin_pnegocio, pn.costumershareini_pnegocio, pn.costumersharefin_pnegocio,
	pn.numvisitas_pnegocio, pn.frecuencia_pnegocio, pn.flimite_pnegocio, pn.fregistro_pnegocio, pn.id_cultivo,c.id_cliente, c.nom_cliente, cul.id_cultivo,
	cul.nom_cultivo  
	FROM plan_negocio pn, rpn r, cliente c, cultivo cul
	WHERE c.id_cliente='$cli'
	AND pn.id_cliente=c.id_cliente 
	AND pn.id_cultivo = cul.id_cultivo
	AND pn.id_usuario='$usu' 
	GROUP BY pn.id_pnegocio")or die("Error al cargar la tabla: " . $db->error);


/* determinar el número de filas del resultado */
$numFilas = $consulTab->num_rows;

if ($numFilas>0) {
	echo '<table id="tab_planNegocio" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<tr>
				
				<th>Cliente</th>
				<th>Numero de Cuadrante</th>
				<th>Cultivo</th>
				<th>Año de Inicio</th>
				<th>Año de Finalizacion</th>
				<th>Meta de Ventas</th>
				<th>Fecha limite para lograrlo</th>

				<th>Accion</th>
				<th style="visibility: hidden"></th>
			</tr>';

	while ($res=$consulTab->fetch_assoc()) {
		
		echo '<tr>
					
					<td>'.$res['nom_cliente'].'</td>
					<td>'.$res['ncuadrante_pnegocio'].'</td>
					<td id="culti">'.$res['nom_cultivo'].'</td>
					<td>'.$res['anioini_pnegocio'].'</td>
					<td>'.$res['aniofin_pnegocio'].'</td>
					<td>'.$res['metaventatotalfin_pnegocio'].'</td>
					<td>'.$res['flimite_pnegocio'].'</td>
					
					<td><button type="button" class="btn btn-primary" aria-label="Left Align" onclick="pNegocioPDF('.$res['id_cliente'].','.$res['id_cultivo'].');">
	  					<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
					</button>
					</td>
					<td style="visibility: hidden">'.$res['id_cultivo'].'</td>
				</tr>';

		
	}
	echo '</table>';
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