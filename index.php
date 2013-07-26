<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; 
        charset=utf-8">
        <meta name="viewport" content="width=device-width, 
        initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <style>
          body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
          }
        </style>
        <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="css/estilo.css" />
        <script src="js/jquery.js" type="text/javascript">
        </script>
        <script src="js/funcionalidad.js" type="text/javascript">
        </script>
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
            <li>
                <a href="php/inicioSesion.php">Inciar Sesion</a>
            </li>
            <li><a href="php/registro.php">Registrarse</a></li>
            <li><a href="php/perfil.php">Ir a mi perfil</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container">
    <?php
    require_once ('accesoDB/webimagenDAO.php');
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
    </div> <!-- /container -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>