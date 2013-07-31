<?php
    require_once ('accesoDB/webimagenDAO.php');
    session_start();
    
    if (sizeof($_SESSION) == 0){
        $link1 = "<a href='php/inicioSesion.php'>Iniciar Sesion</a>";
        $link2 = "<a href='php/registro.php'>Registrarse</a>";
        $link3 = "";
        $inicio = "<h1>WebImagen</h1><p class='lead'>Bienvenido a esta 
            nueva plataforma para vivir tus fotos!</p>";
    }else{
        $nombre = $_SESSION['nombre'];
        $link1 = "<a href='php/perfil.php'>$nombre</a>";
        $link2 = "<a href='php/albumes.php'>Mis albumes</a>";
        $link3 = "<a href='php/cerrarSesion.php'>Cerrar Sesion</a>";
        $inicio = "<h1>Fotos recientes</h1>";
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; 
        charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="css/estilo.css" rel="stylesheet"/>
        <title>WebImagen</title>
    </head>
    <body>
    <div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav">
    <div class="container">
        <a href="index.php" class="navbar-brand">WebImagen</a>
        <button class="navbar-toggle" type="button" 
        data-toggle="collapse" data-target=".bs-navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="nav-collapse collapse bs-navbar-collapse">
            <ul class="nav navbar-nav">
                <li><?php echo $link1; ?></li>
                <li><?php echo $link2; ?></li>
                <li><?php echo $link3; ?></li>
            </ul>
        </div>
    </div>
    </div>
    <center>
    <div id="inicio" class="bs-masthead">
       <?php echo $inicio ?>
    </div>
    <!--<div class="container">-->
    <?php
    $webImagen = WebImagenDAO::getInstancia();
    $imagenes = $webImagen -> obtenerImgsInicio();
    $maxImgs = 20;
    for ($i = sizeof($imagenes) - 1; $i >= 0 &&
            $maxImgs != 0; $i--) {
        $ruta = $imagenes[$i]['ruta'];
        $login = $imagenes[$i]['login'];
        $desc = $imagenes[$i]['descripcion'];
        echo "<form action='php/imagen.php' method='post'
		enctype='multipart/form-data'>
		<input type='image' src = '$ruta' height='150'>
		<input type='hidden' name='ruta' value='$ruta'>
        <input type='hidden' name='login' value='$login'>
        <input type='hidden' name='desc' value='$desc'>
		</form>";
        $maxImgs--;
    }
    echo "<br><br>";
    ?>
    </center>
    <!--</div> -->
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/funcionalidad.js" type="text/javascript"></script>
</body>
</html>