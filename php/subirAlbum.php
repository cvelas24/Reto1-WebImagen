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
	</center>
	<?php
	//Subir un nuevo album
	$idUsuario = 1;
	$album = $_POST['album'];
	$desc = $_POST['desc'];
	$webImagen = WebImagenDAO::getInstancia();
	$msg = $webImagen -> crearAlbum($idUsuario, $album, $desc);
	echo "<h3>$msg<h3>"
	?>
</body>
</html>