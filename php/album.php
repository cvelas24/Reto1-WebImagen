<?php
	require_once ('../accesoDB/webimagenDAO.php');
	session_start();
	if(sizeof($_POST) > 0)
		$_SESSION['idAlbum'] = $_POST['idAlbum'];
	
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
	<a href="albumes.php">Albumes</a>
	<a href="perfil.php"><?php echo $_SESSION['nombre']?></a>
	<br><br>
	<?php
    $webImagen = WebImagenDAO::getInstancia();
    $idAlbum = $_SESSION['idAlbum'];
    $imagenes = $webImagen -> obtenerImgsAlbum($idAlbum);
    $datos = $webImagen -> obtenerDatosAlbum($idAlbum);
    $nombre = $datos['nombre'];
    $descripcion = $datos['descripcion'];
    echo "<div><b>$nombre</b>: $descripcion</div><br>";
    for ($i = sizeof($imagenes) - 1; $i >= 0; $i--) {
        $ruta = $imagenes[$i]['ruta'];
        $login = $_SESSION['login'];
        $desc = $imagenes[$i]['descripcion'];
        echo "<form action='imagen.php' method='post'
		enctype='multipart/form-data'>
		<input type='image' src = '../$ruta' height='150'>
		<input type='hidden' name='ruta' value='$ruta'>
		<input type='hidden' name='login' value='$login'>
        <input type='hidden' name='desc' value='$desc'>
		</form>";
    }
	?>
	<br>
	</center>
	<h3>Subir nueva imagen</h3>
	<form action="subirImg.php" method="post" id="formImg"
	enctype="multipart/form-data" onsubmit="return validarImg();">
	<table border="0">
	Imagen:<input type="file" name="imagen" id="imagen"><br>
	Descripcion:<input type="text" name="desc" id="desc"><br>
	<input type='hidden' name='idAlbum' id="idAlbum"
		value='<?php echo $idAlbum?>'>
	<input type="submit" name="submit" value="Cargar">
	</form>
</body>
</html>