<?php 

require'../conexionbd.php';

echo 'Seleccione Municipio: <select name"lst_mun" id="lst_mun"';

$consulta=$db->query("SELECT id_municipio,nom_municipio FROM municipio WHERE id_zona='$id_zona' ORDER BY id_municipio");

if ($consulta) {
	while ($row =$consulta->fetch_assoc()) 
	{
	?>
	<option value="<?php echo $row['id_municipio']; ?>"><?php echo $row['nom_municipio']; ?></option>

	<?php	
	}
}
echo '</select>';

 ?>