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
		$login = $_POST['login'];
		$desc = $_POST['desc'];
	?>
	<center>
	<a href="../index.php"><h1>WebImagen</h1></a>
	<img src = '../<?php echo $ruta;?>' height='400'>
	<div><?php echo "<b>".$login."</b>: ".$desc;?></div><br>
	<a href='<?php echo $_SERVER["HTTP_REFERER"];?>'>Volver</a>
	</center>
</body>
</html>
