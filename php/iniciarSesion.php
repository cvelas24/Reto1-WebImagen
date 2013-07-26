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
	$_SESSION["login"] = $login;
	$password = $_POST['pwd'];
	$webImagen = WebImagenDAO::getInstancia();
	$nombre = $webImagen -> loguearUsuario($login, $password);
	echo "<h3>Bienvenido, $nombre</h3>"
	?>
	<a href="test.php">Test</a>
	</center>
</body>
</html>