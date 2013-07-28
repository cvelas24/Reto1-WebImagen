<?php
	require_once ('../accesoDB/webimagenDAO.php');
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
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['email'];
	$webImagen = WebImagenDAO::getInstancia();
	$webImagen -> registrarUsuario(
		$login, $password, $nombre, $apellido, $email);
	?>
	<h3>Gracias por registrarte <?echo $nombre?></h3>
	<a href="inicioSesion.php">Iniciar sesion</a>
	</center>
</body>
</html>