<?php
    class Redirecciones {
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
        
        public function pedidos () {
            ?>
                <script> window.location.href = "vistas/../index.php?romanza=pedidos"; </script>
            <?php
        }
        
        public function misDirecciones () {
            ?>
                <script> window.location.href = "vistas/../index.php?romanza=mis-direcciones"; </script>
            <?php
        }
    }
?>