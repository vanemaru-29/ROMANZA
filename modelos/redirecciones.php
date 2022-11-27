<?php
    class Redirecciones {
        public function miCuenta () {
            ?>
                <script> window.location.href = "vistas/../index.php?romanza=mi-cuenta"; </script>
            <?php
        }

        public function misDirecciones () {
            ?>
                <script> window.location.href = "vistas/../index.php?romanza=mis-direcciones"; </script>
            <?php
        }

        public function opiniones () {
            ?>
                <script> window.location.href = "vistas/../index.php?romanza=opiniones"; </script>
            <?php
        }

        public function miPedido () {
            ?>
                <script> window.location.href = "vistas/../index.php?romanza=mi-pedido"; </script>
            <?php
        }

        public function pedidos () {
            ?>
                <script> window.location.href = "vistas/../index.php?romanza=pedidos"; </script>
            <?php
        }
        
        public function pedido () {
            ?>
                <script> window.location.href = "vistas/../index.php?romanza=pedido"; </script>
            <?php
        }

        public function listaCat () {
            ?>
                <script> window.location.href = "vistas/../index.php?romanza=lista-categorias"; </script>
            <?php
        }
        
        public function listaPdt () {
            ?>
                <script> window.location.href = "vistas/../index.php?romanza=lista-productos"; </script>
            <?php
        }

        public function listaM () {
            ?>
                <script> window.location.href = "vistas/../index.php?romanza=lista-metodo-pago"; </script>
            <?php
        }
        
        public function precios () {
            ?>
                <script> window.location.href = "vistas/../index.php?romanza=administrar"; </script>
            <?php
        }
    }
?>