<?php
	require_once ('../accesoDB/webimagenDAO.php');
	session_start();
?>
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
	<?php
	//Registrar un nuevo usuario
	$login = $_POST['login'];
	$password = $_POST['pwd'];
	$webImagen = WebImagenDAO::getInstancia();
	$nombre = $webImagen -> loguearUsuario($login, $password);
	//Guardar nombre y login en sesion
	$_SESSION["login"] = $login;
	$_SESSION["nombre"] = $nombre;
	echo "<h3>Bienvenido, $nombre</h3>"
	?>
	</center>
</body>
</html>