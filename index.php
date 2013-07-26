<?php
    require_once ('accesoDB/webimagenDAO.php');
    session_start();
    $link1;
    $link2 = "";
    if (sizeof($_SESSION) == 0){
        $link1 = "<a href='php/inicioSesion.php'>
            Iniciar Sesion</a>";
        $link2 = "<a href='php/registro.php'>Registrarse</a>";
    }else{
        $n = $_SESSION['nombre'];
        $link1 = "<a href='php/perfil.php'>$n</a>";
        $link2 = "<a href='php/cerrarSesion.php'>
            Cerrar Sesion</a>";
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; 
        charset=utf-8">
        <meta name="viewport" content="width=device-width, 
        initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="css/estilo.css" />
        <title>WebImagen</title>
    </head>
    <body>
    <center>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="index.php">WebImagen</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
            <li class="active">
                <a href="#">Home</a>
            </li>
            <li><?php echo $link1; ?></li>
            <li><?php echo $link2; ?></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <h2>Bienvenido a WebImagen!</h2><br>
    <!--<div class="container">-->
    <?php
    $webImagen = WebImagenDAO::getInstancia();
    $imagenes = $webImagen -> obtenerImgsInicio();
    $maxImgs = 10;
    for ($i = sizeof($imagenes) - 1; $i >= 0 &&
            $maxImgs != 0; $i--) {
        $ruta = $imagenes[$i]['ruta'];
        $descripcion = $imagenes[$i]['descripcion'];
        echo "<form action='php/imagen.php' method='post'
		enctype='multipart/form-data'>
		<input type='image' src = '$ruta' height='150'>
		<input type='hidden' name='ruta' value='$ruta'>
		</form>";
        $maxImgs--;
    }
    echo "<br><br>";
    ?>
    </center>
    <!--</div> -->


    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery.js" type="text/javascript">
    </script>
    <script src="js/funcionalidad.js" type="text/javascript">
    </script>
</body>
</html>