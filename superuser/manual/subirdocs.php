<?php
	require '../../php/conexionbd.php'; 

	$formatos = array('.pdf','.doc','.xslx','.xls');
	//Nombre carpeta que contine los archivos
	$directorio='archivos';
	if (isset($_POST['boton'])) {
		$nombreArchivo=$_FILES['carga_archivo']['name'];
		$nombreTmpArchivo=$_FILES['carga_archivo']['tmp_name'];
		$tipo=$_FILES['carga_archivo']['type'];
		$tamanio=$_FILES['carga_archivo']['size'];
		$destino="archivos/".$nombreArchivo;
		date_default_timezone_set("America/Bogota");
		$hoy=date("Y-m-d h:i:sa");
		//dentro de la var nombreArchivo tengo la cadena a continuacion la separo para saber la extension del file
		//strrpos=permite buscar una posicion dentro del texto, aqui busco la posicion del punto para cortar la cadena
		$extension=substr($nombreArchivo, strrpos($nombreArchivo, '.'));
		//Validar que la extension este dentro delos formatos
		if (in_array($extension, $formatos)) {
			//a continuacion muevo el archivo a mi carpeta archivos
			//if (move_uploaded_file($nombreTmpArchivo, "archivos/$nombreArchivo")) {
			if (copy($nombreTmpArchivo,$destino)) {
				$titulo=$_POST['txttitulo'];
				$descripcion=$_POST['txtdescripcion'];
				$insertardoc=$db->query("INSERT INTO documento(id_documento,tit_documento,descrip_documento,tamano_documento,tipo_documento,nombre_documento,fcarga_documento) VALUES(NULL,'$titulo','$descripcion','$tamanio','$tipo','$nombreArchivo','$hoy')")|| die($db->error);
				//echo "Archivo almacenado exitosamente";
				if ($insertardoc) {
					echo "Documento Insertado Correctamente en la Base de Datos.";
					header("subirdocs.php");

				}
				else{
					echo "Ocurrio un Error al cargar el documento en la base datos";
				}
			}
			else
			{
				echo "Error: no se pudo mover el archivo";
			}
		}
		else
		{
			echo "No puede cargar este tipo de archivo";
		}
	}
 ?>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../css/main.css">
	<script src="../../js/custom.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700italic,100italic,300' rel='stylesheet' type='text/css'>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<title>Manual de Uso</title>
</head>
<body>
	
<hr>
	<div>
		<div class="col-md-4 text-center iline-block">
		<form method="POST" action="" enctype="multipart/form-data">
			
				<h1>Cargar Archivo</h1>
				<input type="text" class="form-control" name="txttitulo" placeholder="Titulo del documento"><br />
				<textarea class="form-control" name="txtdescripcion" placeholder="Describa su archivo..."></textarea><br />
				<input type="file" name="carga_archivo"><br />
				<input type="submit" value="Subir Archivo" name="boton" class="btn btn-success">
			
			
		</form>
		</div>
	</div>

		
	<br>

</body>
</html>