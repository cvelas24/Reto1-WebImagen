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
    $idUsuario = $_SESSION['idUsuario'];
    $imagenes = $webImagen -> obtenerImgsPerfil($idUsuario);
    $maxImgs = 10;
    for ($i = sizeof($imagenes) - 1; $i >= 0 &&
            $maxImgs != 0; $i--) {
        $ruta = $imagenes[$i]['ruta'];
        $login = $imagenes[$i]['login'];
        $desc = $imagenes[$i]['descripcion'];
        echo "<form action='imagen.php' method='post'
		enctype='multipart/form-data'>
		<input type='image' src = '../$ruta' height='150'>
		<input type='hidden' name='ruta' value='$ruta'>
		<input type='hidden' name='login' value='$login'>
        <input type='hidden' name='desc' value='$desc'>
		</form>";
        $maxImgs--;
    }
    echo "<br><br>";
	?>
	</center>
</body>
</html>
