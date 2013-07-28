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
	<center>
	<?php
	//Cargar las fotos desde la db
    $webImagen = WebImagenDAO::getInstancia();
    $idUsuario = $_SESSION['idUsuario'];
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
	enctype="multipart/form-data" id = "formAlbum"
	onsubmit="return validarAlbum();">
	<table border="0">
	<tr>
		<td>Nombre: </td>
		<td>
			<input type="text" name="album" id="album">
			<label id="errorAlbum" class="error"></label>
		</td>
	</tr>
	<tr>
		<td>Descripcion: </td>
		<td>
			<input type="text" name="desc" id="desc">
		</td>
	</tr>
	</table>
	<input type='hidden' name='idUsuario' 
		value='<?php echo $idUsuario?>'>
	<input type="submit" name="submit" value="Cargar">
	</form>
	</center>
	<script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/funcionalidad.js" type="text/javascript"></script>
</body>
</html>