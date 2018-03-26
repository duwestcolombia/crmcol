<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="importarCSV.php" enctype="multipart/form-data" method="post">
	   <input id="archivo" accept=".csv" name="archivo" type="file" /> 
	   <input name="MAX_FILE_SIZE" type="hidden" value="20000" /> 
	   <input name="enviar" type="submit" value="Importar" />
	</form>
</body>
</html>