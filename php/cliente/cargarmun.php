<?php 
require '../conexionbd.php';
require'consultacliente.php';
$z=$_POST['idzona'];
//echo '<script>alert('.$z.');</script>';
$consulmunicipio=$db->query("SELECT id_municipio, nom_municipio,id_zona FROM municipio WHERE id_zona='$z'  GROUP BY id_municipio") or die($db->error);

echo '<div class="col-md-2 inline-block">
		<label for="lbldepto">Departamento</label>';
echo '<select name="txtmunicipio" class="form-control" id="txtmunicipio">';

//$consulmunicipio=$db->query("SELECT id_municipio, nom_municipio,id_zona FROM municipio  GROUP BY id_municipio") or die($db->error);
while ($consultamun = $consulmunicipio ->fetch_array(MYSQLI_BOTH))
{
//Cargo en zona dos el id_zona encontrado en la tabla zona
$mundos=$consultamun['id_municipio'];
	//Armo la opcion que tendra este select donde su valor sera el id_zona
	echo '<option value="'.$consultamun['id_municipio'].'" ';
	//Comparo el id_zona de cliente_zona y la encontrada en la tamba zona 
	/*if ($mununo==$mundos) 
		// si son iguales que seleccione la opcion que es igual
		echo 'SELECTED';*/
		echo '>';
	
	//luego le paso el nombre que va a mostrar al usuario que es el nombre de la zona
	echo utf8_encode ($consultamun['nom_municipio']);
	//cierro el option
	echo '</option>';

}
//cierro el select y el contenedor div que le da los estilos.
echo '</select>';
echo '</div>';

 ?>