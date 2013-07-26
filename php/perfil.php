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
	<a href="albumes.php">Albumes</a><br><br>
	<?php
    $webImagen = WebImagenDAO::getInstancia();
    $login = $_SESSION['login'];
    $imagenes = $webImagen -> obtenerImgsPerfil($login);
    $maxImgs = 10;
    for ($i = sizeof($imagenes) - 1; $i >= 0 &&
            $maxImgs != 0; $i--) {
        $ruta = $imagenes[$i]['ruta'];
        $descripcion = $imagenes[$i]['descripcion'];
        echo "<form action='imagen.php' method='post'
		enctype='multipart/form-data'>
		<input type='image' src = '../$ruta' height='150'>
		<input type='hidden' name='ruta' value='$ruta'>
		</form>";
        $maxImgs--;
    }
    echo "<br><br>";
	?>
	</center>
</body>
</html>
