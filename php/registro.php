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
	<legend>Registrarse en WebImagen</legend>
	<form action="registrar.php" method="post" id="formReg"
	enctype="multipart/form-data" onsubmit="return validarReg();">
	<table border="0">
	<tr>
		<td>Nombre:</td>
		<td class="requerido">
			<input type="text" name="nombre" id="nombre">
			<label class="error" id="errornombre"></label>
		</td>
	</tr>
	<tr>
		<td>Apellido completo:</td>
		<td class="requerido">
			<input type="text" name="apellido" id="apellido">
			<label id="errorapellido" class="error"></label>
		</td>
	</tr>
	<tr>
		<td>Correo electrónico:</td>
		<td class="requerido">
			<input type="text" name="email" id="email">
			<label id="erroremail" class="error"></label>
		</td>
	</tr>
	<tr>
		<td>Usuario de WebImagen:</td>
		<td class="requerido">
			<input type="text" name="login" id="login">
			<label id="errorlogin" class="error"></label>
		</td>
	</tr>
	<tr>
		<td>Contraseña:</td>
		<td class="requerido">
			<input type="password" name="pwd" id="pwd">
			<label id="errorpwd" class="error"></label>
		</td>
	</tr>
	<tr>
		<td>Repita Contraseña:</td>
		<td class="requerido">
			<input type="password" name="repwd" id="repwd">
			<label id="errorrepwd" class="error"></label>
		</td>
	</tr>
	</table>
	<br>
	<input type="submit" name="submit" class="btn btn-default" value="Registrar">
	</form>
	<br><br>
	<label id="errormsgreg" class="error"></label>
	</center>
	<script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <script src="../js/funcionalidad.js" type="text/javascript"></script>
</body>
</html>