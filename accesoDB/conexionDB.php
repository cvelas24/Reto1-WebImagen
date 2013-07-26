<?php
class ConexionDB {
    private static $instancia = null;
    private $dbhost = "localhost";
    private $dbuser = "root";
    private $dbpass = "";
    private $dbname = "WebImagen";
    
    private function __construct() {
        mysql_connect($this->dbhost, $this->dbuser,$this->dbpass) or
                die(mysql_error());
        mysql_select_db($this->dbname) or die(mysql_error());
    }

    function __destruct() {
        mysql_close();
    }
    
    public static function getInstancia(){
        if (!isset(self::$instancia)){
            self::$instancia = new ConexionDB();
        }
        return self::$instancia;
    }
}
?>
