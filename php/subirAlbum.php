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
	<h4>
	<?php
	//Subir un nuevo album
	$idUsuario = $_POST['idUsuario'];
	$album = $_POST['album'];
	$desc = $_POST['desc'];
	$webImagen = WebImagenDAO::getInstancia();
	$idAlbum = $webImagen -> crearAlbum($idUsuario, $album, $desc);
	$_SESSION["idAlbum"] = $idAlbum;
	echo "Album $album creado";
	?>
	</h4>
	<a href="album.php"><?php echo "Ir a ".$album?></a>
	</center>
</body>
</html>