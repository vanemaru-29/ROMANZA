<?php
    require_once ('autoCarga.php');

    class Opiniones extends Conexion {
        private $id_usuario;
        private $opinion;
        private $registro;

        // constructor
        public function __construct () {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conectar();
        }

        // registro de usuario
        public function registrarOpn($id_usuario, $opinion) {
            $this->id_usuario = $id_usuario;
            $this->opinion = $opinion;   

            $fecha = new Fechas();
            $fechaActual = $fecha->fechaActual();
            $this->registro = $fechaActual;

            $sql = "INSERT INTO opinion (opinion, id_usuario, fecha_registro) VALUES ('".$this->opinion."', '".$this->id_usuario."', '".$this->registro."')";
            $insertar = $this->conexion->prepare($sql);
            $insertarDatos = $insertar->execute();

            if (isset($insertarDatos)) {
                $opiniones = new Redirecciones();
                $opiniones -> opiniones();
                
                return 1;
            } else {
                $errorRegistro = new ErrFormularios();
                $errorRegistro -> registrarOpn();

                return 0;
            }
        }

        // lista de todas las opiniones
        public function listaOpn () {
            $sql = mysqli_query($this->conexion, "SELECT * FROM opinion");
            return $sql;
        }

        // primeras opiniones
        public function listaOpnLimit () {
            $sql = mysqli_query($this->conexion, "SELECT * FROM opinion LIMIT 4");
            return $sql;
        }
    }
?>