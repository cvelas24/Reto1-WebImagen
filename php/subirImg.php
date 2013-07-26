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
	<?php
	require_once ('../accesoDB/webimagenDAO.php');
	$nombreImagen = $_FILES["imagen"]["name"];
	$rutaTemporal = $_FILES["imagen"]["tmp_name"];
	$idAlbum = 2;
	$webImagen = WebImagenDAO::getInstancia();
	$msg = $webImagen -> subirImg($idAlbum,
		$nombreImagen,$rutaTemporal,'...');
	echo "<script language='JavaScript'> 
		alert('$msg'); 
		</script>";
	?>
	<center>
	<a href="../index.php"><h1>WebImagen</h1></a>
	<img height='400'
		src = '../<?php echo "imagenes/".$nombreImagen?>'>
	<br>Hola como estan!<br><br>
	<a href='<?php echo $_SERVER["HTTP_REFERER"];?>'>Volver</a>
	</center>
</body>
</html>