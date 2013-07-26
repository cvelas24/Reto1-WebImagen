<?php
require_once ('conexionDB.php');
// require_once ('../entidades/usuario.php');
// require_once ('../entidades/album.php');
// require_once ('../entidades/imagen.php');


class WebImagenDAO {
    private static $instancia = null;
    private $conexion;

    function __construct() {
        $this->conexion = ConexionDB::getInstancia();
    }
    
    public static function getInstancia(){
        if (!isset(self::$instancia)){
            self::$instancia = new WebImagenDAO();
        }
        return self::$instancia;
    }
    
    public function registrarUsuario(
        $login, $password, $nombre, $apellido, $email){
        $query = mysql_query("INSERT INTO 
            usuarios(login, password, nombre, apellido, email) 
            VALUES ('$login','$password','$nombre', 
                '$apellido','$email')");
        if(!$query)
            return "Error, vuelva a intentar";
        else
            return "Gracias por registrarte $nombre";
    }

    public function loguearUsuario($login, $password){
        $query = mysql_query("SELECT nombre FROM 
            usuarios WHERE login ='$login' AND 
            password ='$password'");
        $datos = mysql_fetch_array($query);
        if(sizeof($datos) > 1){
            $nombre = $datos[0];
            return $nombre;
        }else{
            return "Error";
        }
        
    }

    public function crearAlbum($idUsuario, $nombre, $descripcion){
        $query = mysql_query("INSERT INTO 
            albumes(usuario, nombre, descripcion) VALUES 
            ('$idUsuario', '$nombre', '$descripcion')");
        if(!$query)
            return mysql_error();
        else
            return "Album $nombre creado";
    }
    
    //Subir una imagen al servidor
    public function subirImg(
        $idAlbum, $nombreImagen, $rutaTemporal, $descripcion){
    	$carpetaServidor = "imagenes/";
    	if (file_exists('../'.$carpetaServidor . $nombreImagen)){
            return 'Imagen ya existe';
    	}else{
    		mysql_query("INSERT INTO 
    			imagenes(album, ruta, descripcion) VALUES 
    			($idAlbum,'$carpetaServidor$nombreImagen','
                    $descripcion')");
    		move_uploaded_file($rutaTemporal, 
    			'../'.$carpetaServidor . $nombreImagen);
            return 'Imagen subida con exito';
        }
    }

    //Cargar las fotos del inicio
    public function obtenerImgsInicio(){
        $query = mysql_query("SELECT * FROM imagenes");
        $imagenes = array();
        while ($r = mysql_fetch_assoc($query)) {
            $imagenes[] = $r;
        }
        return $imagenes;
    }

    //Cargar las fotos de un usuario
    public function obtenerImgsPerfil($idUsuario){
        $query = mysql_query("SELECT * FROM 
            imagenes AS i, albumes AS a WHERE 
            i.album = a.id AND a.usuario ='$idUsuario'");
        $imagenes = array();
        while ($r = mysql_fetch_assoc($query)) {
            $imagenes[] = $r;
        }
        return $imagenes;
    }

    //Cargar las fotos de un album
    public function obtenerImgsAlbum($idAlbum){
        $query = mysql_query("SELECT * FROM imagenes
            WHERE album = '$idAlbum'");
        $imagenes = array();
        while ($r = mysql_fetch_assoc($query)) {
            $imagenes[] = $r;
        }
        return $imagenes;
    }

    //Cargar los albumes de un usuario
    public function obtenerAlbumes($idUsuario){
        $query = mysql_query("SELECT * FROM albumes
            WHERE usuario = '$idUsuario'");
        $albumes = array();
        while ($r = mysql_fetch_assoc($query)) {
            $albumes[] = $r;
        }
        return $albumes;
    }
}
?>
