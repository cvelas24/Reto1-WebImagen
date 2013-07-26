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
	require_once ('../accesoDB/webimagenDAO.php');
	//Registrar un nuevo usuario
	$login = $_POST['login'];
	$password = $_POST['password'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['email'];
	$webImagen = WebImagenDAO::getInstancia();
	$msg = $webImagen -> registrarUsuario(
		$login, $password, $nombre, $apellido, $email);
	echo "<h3>$msg</h3>"
	?>
	</center>
</body>
</html>