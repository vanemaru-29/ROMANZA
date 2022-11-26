<?php
    require_once ('autoCarga.php');

    class Pedidos extends Conexion {
        private $ID_pedido;

        // constructor
        public function __construct () {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conectar();
        }

        
    }
?>