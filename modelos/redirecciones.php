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
    }
?>