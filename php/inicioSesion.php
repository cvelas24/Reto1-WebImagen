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
	<title>Iniciar Sesion</title>
</head>
<body>
	<center>
	<a href="../index.php"><h1>WebImagen</h1></a>
	<h3>Registro</h3>
	<form action="registrar.php" method="post"
	enctype="multipart/form-data" onsubmit="">
		Usuario: <input type="text" name="login" id="login">
		Contraseña: <input type="password" name="pwd" id="pwd">
		<input type="submit" name="submit" value="Iniciar Sesion">
	</form>
	</center>
</body>
</html>