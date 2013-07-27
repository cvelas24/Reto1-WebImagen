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
        $query = mysql_query("SELECT id,nombre FROM 
            usuarios WHERE login ='$login' AND 
            password ='$password'");
        $datos = mysql_fetch_array($query);
        if(sizeof($datos) > 1){
            return $datos;
        }else{
            return "Error";
        }
        
    }

    //Crea un album y devuelve su id
    public function crearAlbum($idUsuario, $nombre, $descripcion){
        mysql_query("INSERT INTO 
            albumes(usuario, nombre, descripcion) VALUES 
            ('$idUsuario', '$nombre', '$descripcion')");
        $query = mysql_query("SELECT id FROM albumes 
            WHERE nombre = '$nombre'");
        $datos = mysql_fetch_array($query);
        return $datos[0];
    }
    
    //Subir una imagen al servidor
    public function subirImg($idAlbum, $nombreImagen, 
        $rutaTemporal, $descripcion){
    	$carpetaServidor = "imagenes/";
    	mysql_query("INSERT INTO 
    		imagenes(album, ruta, descripcion) VALUES 
    		($idAlbum,'$carpetaServidor$idAlbum$nombreImagen',
                '$descripcion')");
    	move_uploaded_file($rutaTemporal, 
    		'../'.$carpetaServidor.$idAlbum.$nombreImagen);
        return "Imagen subida con éxito";
    }

    //Cargar las fotos del inicio
    public function obtenerImgsInicio(){
        $query = mysql_query("SELECT login,ruta,i.descripcion
            FROM imagenes AS i, albumes AS a, usuarios AS u 
            WHERE a.id = i.album AND u.id = a.usuario
            ORDER BY i.id");
        $imagenes = array();
        while ($r = mysql_fetch_assoc($query)) {
            $imagenes[] = $r;
        }
        return $imagenes;
    }

    //Cargar las fotos de un usuario
    public function obtenerImgsPerfil($idUsuario){
         $query = mysql_query("SELECT login,ruta,i.descripcion
            FROM imagenes AS i, albumes AS a, usuarios AS u 
            WHERE a.id = i.album AND u.id = a.usuario 
            AND a.usuario ='$idUsuario' ORDER BY i.id");
        $imagenes = array();
        while ($r = mysql_fetch_assoc($query)) {
            $imagenes[] = $r;
        }
        return $imagenes;
    }

    //Cargar las fotos de un album
    public function obtenerImgsAlbum($idAlbum){
        $query = mysql_query("SELECT ruta, descripcion
            FROM imagenes WHERE album = '$idAlbum'");
        $imagenes = array();
        while ($r = mysql_fetch_assoc($query)) {
            $imagenes[] = $r;
        }
        return $imagenes;
    }

    //Obtener los datos de un album
    public function obtenerDatosAlbum($idAlbum){
        $query = mysql_query("SELECT nombre,descripcion 
            FROM albumes WHERE id = '$idAlbum'");
        $datos = mysql_fetch_array($query);
        return $datos;
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

    //Funcion para ver si ya se subio la misma imagen 
    //al mismo album
    public function validarImg($idAlbum, $ruta){
        $query = mysql_query("SELECT count(*) FROM 
            imagenes WHERE ruta ='imagenes/$idAlbum$ruta'");
        $datos = mysql_fetch_array($query);
        return $datos[0];
    }

    //Funcion para ver si el usuario en la sesion tiene un
    //album con el mismo nombre
    public function validarAlbum($idUsuario, $album){
        $query = mysql_query("SELECT count(*) FROM 
            albumes WHERE usuario ='$idUsuario' AND 
            nombre = '$album'");
        $datos = mysql_fetch_array($query);
        return $datos[0];
    }
}
?>
