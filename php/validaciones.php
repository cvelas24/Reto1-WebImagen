<?php
require_once ('../accesoDB/webimagenDAO.php');
$webImagen = WebImagenDAO::getInstancia();

$instr = $_POST['instr'];

switch ($instr) {
	case "validarImg":
		$idAlbum = $_POST['idAlbum'];
		$ruta = $_POST['ruta'];
		echo $webImagen->validarImg($idAlbum, $ruta);
		break;
	 case "validarAlbum":
	 	$idUsuario = $_POST['idUsuario'];
	 	$album = $_POST['album'];
	 	echo $webImagen->validarAlbum($idUsuario, $album);
	 	break;
	 case "validarReg":
	 	$login = $_POST['login'];
	 	echo $webImagen->validarReg($login);
	 	break;
	default:
		break;
}

?>