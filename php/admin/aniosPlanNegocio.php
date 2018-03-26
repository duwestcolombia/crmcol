<?php 
session_start();
require '../conexionbd.php';

$usu=$_POST['usu'];
$cli=$_POST['cli'];

$numConsulta=$_POST['numConsul'];

switch ($numConsulta) {
	case 1:
		$sql=$db->query("SELECT anioini_pnegocio FROM plan_negocio WHERE id_cliente='$cli' and id_usuario='$usu' GROUP BY anioini_pnegocio")or die("Tenemos un error al buscar los años: ".$db->error);

		if ($sql) 
		{
	
			while ($res = $sql->fetch_assoc()) 
			{
				
				echo '<select name="lst_anioini" id="lst_anioini" class="form-control" required="required" onChange="cargaAnios2();">
						<option value="0"></option>
						<option value="'.$res['anioini_pnegocio'].'">'.$res['anioini_pnegocio'].'</option>
					</select>

				';
			}
		}
		else
		{
			echo 'error';
		}
		break;
	case 2:
		$sql=$db->query("SELECT aniofin_pnegocio FROM plan_negocio WHERE id_cliente='$cli' and id_usuario='$usu' GROUP BY anioini_pnegocio")or die("Tenemos un error al buscar los años: ".$db->error);

		if ($sql) 
		{
		
			while ($res = $sql->fetch_assoc()) 
			{
				
				echo '<select name="lst_anioini" id="lst_anioini" class="form-control" required="required" ">
						<option value="0"></option>
						<option value="'.$res['aniofin_pnegocio'].'">'.$res['aniofin_pnegocio'].'</option>
					</select>

				';
			}
		}
		else
		{
			echo 'error';
		}
		break;

}




?>