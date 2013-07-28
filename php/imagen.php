<?php
	require_once ('../accesoDB/webimagenDAO.php');
	session_start();
	$nombre = $_SESSION['nombre'];
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
                <li><a href='perfil.php'><?php echo $nombre?></a></li>
                <li><a href='albumes.php'>Mis albumes</a></li>
                <li><a href='cerrarSesion.php'>Cerrar Sesion</a></li>
            </ul>
        </div>
    </div>
    </div>
	<?php
		$ruta = $_POST["ruta"];
		$login = $_POST['login'];
		$desc = $_POST['desc'];
	?>
	<center>
	<img src = '../<?php echo $ruta;?>' height='400'>
	<div><?php echo "<b>".$login."</b>: ".$desc;?></div><br>
	<a href='<?php echo $_SERVER["HTTP_REFERER"];?>'>Volver</a>
	</center>
	<script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/funcionalidad.js" type="text/javascript"></script>
</body>
</html>
