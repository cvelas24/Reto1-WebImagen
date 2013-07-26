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
	<a href="perfil.php">Perfil de...</a><br><br>
	<?php
	//Cargar las fotos desde la db
    $webImagen = WebImagenDAO::getInstancia();
    $idUsuario = 1;
    $albumes = $webImagen -> obtenerAlbumes($idUsuario);
	for($i = sizeof($albumes)-1; $i >= 0; $i--){
		$idAlbum = $albumes[$i]['id'];
		$nombre = $albumes[$i]['nombre'];
		$descripcion = $albumes[$i]['descripcion'];
		echo "<form action='album.php' method='post'
		enctype='multipart/form-data'>
		<input type='submit' name='submit' value='$nombre'>
		<input type='hidden' name='idAlbum' value='$idAlbum'>
		<input type='hidden' name='nombre' value='$nombre'>
		</form>";
	}
	echo "<br><br>";
	?>
	<h4>Crear nuevo album</h4>
	<form action="subirAlbum.php" method="post"
	enctype="multipart/form-data" onsubmit="">
	<table border="0">
	<tr>
		<td>Nombre: </td>
		<td>
			<input type="text" name="album" id="album">
		</td>
	</tr>
	<tr>
		<td>Descripcion: </td>
		<td>
			<input type="text" name="desc" id="desc">
		</td>
	</tr>
	</table>
	<input type="submit" name="submit" value="Cargar">
	</form>
	</center>
</body>
</html>