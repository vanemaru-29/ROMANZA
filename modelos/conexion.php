<?php
    class Conexion {
        // variables
        public $servidor = "localhost";
        private $usuario = "root";
        private $password = "V4n32020$"; // cambiar contraseña 
        private $bd = "romanza";
        private $conexion;

        // constructor
        public function __construct () {
            $this->conexion = new mysqli($this->servidor, $this->usuario, $this->password, $this->bd);

            if (mysqli_connect_errno()) {
                echo "Ha ocurrido un error con la conexión a MySQL: ".mysqli_connect_errno();
            }

            mysqli_query($this->conexion, "SET NAMES 'utf8'");
        }

        // conexión
        public function conectar () {
            return $this->conexion;
        }
    }
?>
