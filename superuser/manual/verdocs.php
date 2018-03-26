<html>
<head>
	<title>Documentos cargados</title>
</head>
<body>
	<div class="text-center">
		<h1>Archivos Existentes</h1>
		<table>
			<tr>
				<td>Titulo</td>
				<td>Descripcion</td>
				<td>Nombre</td>
				<td>Fecha Carga Documento</td>
			</tr>
		<?php 
		//PRegunto si puede abrir ese directorio
			/*if ($dir=opendir($directorio)) {
				//ciclo para mirar los archivos
				while ($archivos=readdir($dir)) {
					if ($archivos != '.' && $archivos != '..') {
						echo "Archivo: <strong>$archivos</strong><br />";
					}
					
				}
			}*/
			$consultadocumentos=$db->query("SELECT * FROM documento");
			while ($dato=$consultadocumentos->fetch_array(MYSQLI_BOTH)) {
					
					echo '<tr>
							<td>'.$dato['tit_documento'].'</td>
							<td>'.$dato['descrip_documento'].'</td>
							<td>'.$dato['nombre_documento'].'</td>
							<td>'.$dato['fcarga_documento'].'</td>
						</tr>'
					;
					

			}
		 ?>
		 </table>
	</div>
</body>
</html>