<?php 

require'../conexionbd.php';

echo 'Seleccione Depto: <select onChange="llenarmun(this.value);" name"lst_depto" id="lst_depto"';

$consulta=$db->query("SELECT id_zona,nom_zona FROM zona ORDER BY id_zona");

if ($consulta) {
	while ($row =$consulta->fetch_assoc()) 
	{
	?>
	<option value="<?php echo $row['id_zona']; ?>"><?php echo $row['nom_zona']; ?></option>

	<?php	
	}
}
echo '</select>';

 ?>