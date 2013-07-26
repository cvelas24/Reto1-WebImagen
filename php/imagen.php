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
		$ruta = $_POST["ruta"];
	?>
	<center>
		<a href="../index.php"><h1>WebImagen</h1></a>
		<img src = '../<?php echo $ruta;?>' height='400'>
		<br>Hola como estan!<br><br>
		<a href='<?php echo $_SERVER["HTTP_REFERER"];?>'>Volver</a>
	</center>
</body>
</html>
