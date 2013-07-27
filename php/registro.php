<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; 
	charset=utf-8">
	<link rel="stylesheet" href="../css/estilo.css" />
	<script src="../js/jquery.js" type="text/javascript">
	</script>
	<script src="../js/funcionalidad.js" type="text/javascript">
	</script>
	<title>WebImagen</title>
</head>
<body>
	<center>
	<a href="../index.php"><h1>WebImagen</h1></a>
	<h3>Registrarse en WebImagen</h3>
	<form action="registrar.php" method="post"
	enctype="multipart/form-data" onsubmit="">
	<table border="0">
	<tr>
		<td>Nombre:</td>
		<td>
			<input type="text" name="nombre" id="nombre">
		</td>
	</tr>
	<tr>
		<td>Apellido completo:</td>
		<td>
			<input type="text" name="apellido" id="apellido">
		</td>
	</tr>
	<tr>
		<td>Correo electrónico:</td>
		<td>
			<input type="text" name="email" id="email">
		</td>
	</tr>
	<tr>
		<td>Usuario de WebImagen:</td>
		<td>
			<input type="text" name="login" id="login">
		</td>
	</tr>
	<tr>
		<td>Contraseña:</td>
		<td>
			<input type="password" name="password" 
			id="password">
		</td>
	</tr>
	<tr>
		<td>Repita Contraseña:</td>
		<td>
			<input type="password" name="repassword" 
			id="repassword">
		</td>
	</tr>
	</table>
	<input type="submit" name="submit" value="Registrar">
	</form>
	</center>
</body>
</html>