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
	$nombreImagen = $_FILES["imagen"]["name"];
	$rutaTemporal = $_FILES["imagen"]["tmp_name"];
	$idAlbum = $_POST['idAlbum'];
	$desc = $_POST['desc'];
	$webImagen = WebImagenDAO::getInstancia();
	$msg = $webImagen -> subirImg($idAlbum,
		$nombreImagen,$rutaTemporal, $desc);
	$login = $_SESSION['login'];
	echo $msg;
	?>
	</h4>
	<img height='400'
		src = '<?php echo "../imagenes/".$idAlbum.$nombreImagen?>'>
	<div><?php echo "<b>".$login."</b>: ".$desc;?></div><br>
	<a href='<?php echo $_SERVER["HTTP_REFERER"];?>'>Volver</a>
	</center>
</body>
</html>