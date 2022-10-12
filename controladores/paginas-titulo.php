<?php
    class ControladoroDeTitulo {
        // incluir titulo
        static public function titulosPaginasC() {
            if (isset($_GET["romanza"])) {
                $modulo = $_GET["romanza"];
            } else {
                $modulo = "index";
            }

            $respuesta = ModeloDeTitulo::titulosPaginasM($modulo);
            echo $respuesta;
        }
    }
?>