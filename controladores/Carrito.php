<?php
    require_once ('autoCarga.php');

    class Carrito extends Conexion {
        private $ID_carrito;
        private $id_pdt;

        // constructor
        public function __construct () {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conectar();
        }

        // quitar producto del carrito
        public function quitarPdt ($id_pdt) {
            $this->id_pdt = $id_pdt;
            // $mi_carrito = $_SESSION['carrito'];

            unset($_SESSION[$this->id_pdt]['carrito']);

            $redireccion = new Redirecciones();
            $redireccion -> pedido();
        }
    }
?>