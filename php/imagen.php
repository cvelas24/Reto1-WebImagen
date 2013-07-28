<?php
	require_once ('../accesoDB/webimagenDAO.php');
	session_start();
    if (sizeof($_SESSION) == 0){
        $link1 = "<a href='inicioSesion.php'>Iniciar Sesion</a>";
        $link2 = "<a href='registro.php'>Registrarse</a>";
        $link3 = "";
    }else{
        $nombre = $_SESSION['nombre'];
        $link1 = "<a href='perfil.php'>$nombre</a>";
        $link2 = "<a href='albumes.php'>Mis albumes</a>";
        $link3 = "<a href='cerrarSesion.php'>Cerrar Sesion</a>";
    }
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
                <li><?php echo $link1; ?></li>
                <li><?php echo $link2; ?></li>
                <li><?php echo $link3; ?></li>
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
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../js/funcionalidad.js" type="text/javascript"></script>
</body>
</html>
