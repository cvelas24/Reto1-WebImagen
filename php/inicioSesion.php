<?php
	require_once ('../accesoDB/webimagenDAO.php');
	session_start();
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
                <li><a href='inicioSesion.php'>Iniciar Sesion</a></li>
                <li><a href='registro.php'>Registrarse</a></li>
            </ul>
        </div>
    </div>
    </div>
	<center>
	<legend>Iniciar sesion en WebImagen</legend>
	<form action="iniciarSesion.php" method="post"
	enctype="multipart/form-data" id="formInicio"
	onsubmit="return validarInicio()">
	<table border="0">
	<tr>
		<td>Usuario:</td>
		<td>
			<input type="text" name="login" id="login">
			<label id="errorinilogin" class="error"></label>
		</td>
	</tr>
	<tr>
		<td>Contraseña:</td>
		<td>
			<input type="password" name="pwd" id="pwd">
			<label id="errorinipwd" class="error"></label>
		</td>
	</tr>
	</table>
	<br>
	<input type="submit" class="btn btn-default" name="submit" value="Iniciar Sesion">
	</form><br>
	<label id="errormsgini" class="error"></label>
	</center>
	<script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../js/funcionalidad.js" type="text/javascript"></script>
</body>
</html>