<?php
    class ControladorDeNavegacion {
        // incluir plantilla
        static public function plantilla() {
            include ('vistas/plantilla.php');
        }

        // incluir modulo
        static public function enlacesPaginasC() {
            if (isset($_GET['romanza'])) {
                $modulo = $_GET['romanza'];
            } else {
                $modulo = 'index';
            }

            $respuesta = ModeloDeNavegacion::enlacesPaginasM($modulo);
            include $respuesta;
        }
    }
?>