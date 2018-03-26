<html>
<head>
	<title>Notificacion</title>
</head>
<body>

	<form action="envioMail.php" method="POST">
		<input type="text" name="correo" placeholder="correo"><br>
		<input type="text" name="asunto" placeholder="Asunto"><br>
		<textarea name="contenido" placeholder="todo el contenido aqui"></textarea>
		<input type="submit" value="enviar">
	</form>

</body>
</html>