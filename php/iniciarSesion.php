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
		$link1 = "<a href='perfil.php'>$nombre</a>";
        $link2 = "<a href='albumes.php'>Mis albumes</a>";
        $link3 = "<a href='cerrarSesion.php'>Cerrar Sesion</a>";
	}else{
		$link1 = "<a href='inicioSesion.php'>Iniciar Sesion</a>";
        $link2 = "<a href='registro.php'>Registrarse</a>";
        $link3 = "";
	}
	?>
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
                <li><?php echo $link1; ?></li>
                <li><?php echo $link2; ?></li>
                <li><?php echo $link3; ?></li>
            </ul>
        </div>
    </div>
    </div>
	<center>
	<h3>
	<?php
	 if (sizeof($_SESSION) == 0){
		echo "Usuario o contraseña no coinciden, 
			vuelva a intentar</h3>";
	}else{
		echo "Bienvenido, $nombre</h3>";
		echo "<a href='perfil.php'>Ir a mi perfil</a>";
	}
	?>
	</center>
<script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/funcionalidad.js" type="text/javascript"></script>
</body>
</html>