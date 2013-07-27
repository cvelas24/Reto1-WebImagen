<?php
require_once ('../accesoDB/webimagenDAO.php');
$webImagen = WebImagenDAO::getInstancia();

$instr = $_POST['instr'];

switch ($instr) {
	case "validarImg":
		$idAlbum = $_POST['idAlbum'];
		$ruta = $_POST['ruta'];
		$misma = $webImagen->validarImg($idAlbum, $ruta);
		echo $misma;
		break;
	 case "validarAlbum":
	 	$idUsuario = $_POST['idUsuario'];
	 	$album = $_POST['album'];
	 	$mismo = $webImagen->validarAlbum($idUsuario, $album);
	 	echo $mismo;
	 	break;
	// case "validarImg":
	// 	break;
	// case "validarImg":
	// 	break;
	default:
		break;
}

?>