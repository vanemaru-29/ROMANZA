<?php
    class ModeloDeNavegacion {
        // localizar modulo
        static public function enlacesPaginasM($enlace) {
            if ($enlace == "menu") {
                $modulo = "vistas/modulos/".$enlace.".html";
            } else if ($enlace == "galeria" || $enlace == "opiniones" || $enlace == "pedidos" || $enlace == "contacto" || $enlace == "registro" || $enlace == "login") {
                $modulo = "vistas/modulos/".$enlace.".php";
            } 
            else if ($enlace == "carrito") {
                $modulo = "vistas/modulos/cliente/".$enlace.".php";
            } else if ($enlace == "index") {
                $modulo = "vistas/modulos/inicio.php";
            } else if ($enlace == "mi-cuenta") {
                $modulo = "vistas/modulos/cliente/".$enlace.".php";
            }else if ($enlace == "mis-ordenes") {
                $modulo = "vistas/modulos/cliente/".$enlace.".php";
            }else if ($enlace == "orden") {
                $modulo = "vistas/modulos/cliente/".$enlace.".php";
            }else if ($enlace == "mis-direcciones") {
                $modulo = "vistas/modulos/cliente/".$enlace.".php";
            }else if ($enlace == "registrar-direccion") {
                $modulo = "vistas/modulos/cliente/".$enlace.".php";
            }else if ($enlace == "registrar-usuario") {
                $modulo = "controladores/".$enlace.".php";
            } else {
                $modulo = "vistas/modulos/inicio.php";
            }

            return $modulo;
        }
    }
