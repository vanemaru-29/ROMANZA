<?php
    require_once ('autoCarga.php');

    class Pedidos extends Conexion {
        private $ID_pedido;

        // constructor
        public function __construct () {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conectar();
        }

        // mostrar lista de pedidos
        public function todosPedidos () {
            $sql = mysqli_query($this->conexion, "SELECT * FROM pedido");
            return $sql;
        }

        // mostrar pedidos
        public function listaPedidos ($ID_usuario) {
            $sql = mysqli_query($this->conexion, "SELECT * FROM pedido WHERE id_usuario = '$ID_usuario'");
            return $sql;
        }

        // ver pedido
        public function verPedido ($codigo) {
            $sql = mysqli_query($this->conexion, "SELECT * FROM pedido WHERE codigo = '$codigo'");
            return $sql;
        }
    }
?>