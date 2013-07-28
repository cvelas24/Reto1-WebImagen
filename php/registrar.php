<?php
	require_once ('../accesoDB/webimagenDAO.php');
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; 
	charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="../css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="../css/estilo.css" rel="stylesheet"/>
	<title>WebImagen</title>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav">
    <div class="container">
        <a href="../index.php" class="navbar-brand">WebImagen</a>
        <button class="navbar-toggle" type="button" 
        data-toggle="collapse" data-target=".bs-navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="nav-collapse collapse bs-navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href='inicioSesion.php'>Iniciar Sesion</a></li>
                <li><a href='registro.php'>Registrarse</a></li>
            </ul>
        </div>
    </div>
    </div>
	<center>
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
	<script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../js/funcionalidad.js" type="text/javascript"></script>
</body>
</html>