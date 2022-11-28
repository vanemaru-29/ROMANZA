<?php
    require_once ('autoCarga.php');

    class Ordenes extends Conexion {
        private $cogido_od;

        // constructor
        public function __construct () {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conectar();
        }

        // todas las ordenes
        public function listaOrdenes () {
            $sql = mysqli_query($this->conexion, "SELECT * FROM orden");
            return $sql;
        }

        // no trae la fecha de la orden
        public function listaOrden () {
            $sql = mysqli_query($this->conexion, "SELECT * FROM orden o LEFT OUTER JOIN usuario u ON u.id_usuario = o.id_usuario ");
            return $sql;
        }
        
        // lista usuarios
        public function orden ($id_orden) {
            $sql = mysqli_query($this->conexion, "SELECT * FROM orden WHERE id_orden = '$id_orden'");
            return $sql;
        }

        // obtener ordenes segun usuario
        public function obtenerOrdenes ($id_usuario) {
            $sql = mysqli_query($this->conexion, "SELECT * FROM orden WHERE id_usuario = '$id_usuario'");
            return $sql;
        }
    }
?>