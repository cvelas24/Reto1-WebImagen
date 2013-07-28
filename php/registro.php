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
	<form action="registrar.php" method="post" id="formReg"
	enctype="multipart/form-data" onsubmit="return validarReg();">
	<table border="0">
	<tr>
		<td>Nombre:</td>
		<td class="requerido">
			<input type="text" name="nombre" id="nombre">
			<label class="error" id="errornombre"></label>
		</td>
	</tr>
	<tr>
		<td>Apellido completo:</td>
		<td class="requerido">
			<input type="text" name="apellido" id="apellido">
			<label id="errorapellido" class="error"></label>
		</td>
	</tr>
	<tr>
		<td>Correo electrónico:</td>
		<td class="requerido">
			<input type="text" name="email" id="email">
			<label id="erroremail" class="error"></label>
		</td>
	</tr>
	<tr>
		<td>Usuario de WebImagen:</td>
		<td class="requerido">
			<input type="text" name="login" id="login">
			<label id="errorlogin" class="error"></label>
		</td>
	</tr>
	<tr>
		<td>Contraseña:</td>
		<td class="requerido">
			<input type="password" name="pwd" id="pwd">
			<label id="errorpwd" class="error"></label>
		</td>
	</tr>
	<tr>
		<td>Repita Contraseña:</td>
		<td class="requerido">
			<input type="password" name="repwd" id="repwd">
			<label id="errorrepwd" class="error"></label>
		</td>
	</tr>
	</table>
	<input type="submit" name="submit" value="Registrar">
	</form>
	<br><br>
	<label id="errormsgreg" class="error"></label>
	</center>
</body>
</html>