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
	<h3>
	<a href="../index.php"><h1>WebImagen</h1></a>
	<?php
	//Registrar un nuevo usuario
	$login = $_POST['login'];
	$password = $_POST['pwd'];
	$webImagen = WebImagenDAO::getInstancia();
	$datosUser = $webImagen -> loguearUsuario($login, $password);
	if(sizeof($datosUser) > 1){
		$nombre = $datosUser['nombre'];
		//Guardar nombre y idUsuario en sesion
		$_SESSION["idUsuario"] = $datosUser['id'];
		$_SESSION["login"] = $login;
		$_SESSION["nombre"] = $nombre;
		echo "Bienvenido, $nombre</h3>";
		echo "<a href='perfil.php'>Ir a mi perfil</a>";
	}else{
		echo "Usuario o contraseña no coinciden, 
			vuelva a intentar</h3>";
		echo "<a href='inicioSesion.php'>Iniciar sesion</a>";
	}
	?>
	</center>
</body>
</html>