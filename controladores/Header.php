<?php
    require_once ('autoCarga.php');

    class Header extends Conexion {
        // incluyendo header segun rol de usuario
        public function header () {
            session_start();

            if (!isset($_SESSION['rol'])) {
                include ('controladores/../vistas/parciales/header-inicio.html');
            } else {        
                if ($_SESSION['rol'] == 1) {
                    include ('controladores/../vistas/parciales/header-administrador.html');
                } else if ($_SESSION['rol'] == 2) {
                    include ('controladores/../vistas/parciales/header-encargado.html');
                } else if ($_SESSION['rol'] == 3) {
                    include ('controladores/../vistas/parciales/header-cliente.php');
                }
            }
        }
    }
?>