<?php
    require_once ('autoCarga.php');
    date_default_timezone_set("America/Caracas");

    class Fechas {
        // constructor
        public function __construct () {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conectar();
        }

        // fecha actual
        public function fechaActual () {
            $fecha = date("Y-m-d");
            return $fecha;
        }

        // formato de fecha dd/mm/aa
        public function fechaFormato ($fecha) {
            $formato = date("d/m/Y", strtotime($fecha));
            return $formato;
        }

        // primera fecha registrada
        public function fechaPrimera ($tabla) {
            $sql = mysqli_query($this->conexion, "SELECT * FROM $tabla ORDER BY fecha_registro ASC LIMIT 1");
            return $sql;
        }
        
        // primera fecha registrada
        public function fechaPrimeraCli ($tabla) {
            $sql = mysqli_query($this->conexion, "SELECT * FROM $tabla WHERE id_rol = 3 ORDER BY fecha_registro ASC LIMIT 1");
            return $sql;
        }

        // rango de fechas
        public function fechasRango ($tabla, $desde, $hasta) {
            $sql = mysqli_query($this->conexion, "SELECT * FROM $tabla WHERE fecha_registro BETWEEN '$desde' AND '$hasta'");
            return $sql;
        }
        
        // rango de fechas para clientes
        public function fechasRangoCli ($tabla, $desde, $hasta) {
            $sql = mysqli_query($this->conexion, "SELECT * FROM $tabla WHERE id_rol = 3 AND fecha_registro BETWEEN '$desde' AND '$hasta'");
            return $sql;
        }
    }
?>