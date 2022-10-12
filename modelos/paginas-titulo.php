<?php
    class ModeloDeTitulo {
        // localizar titulo
        static public function titulosPaginasM($modulo) {
            if ($modulo == "menu") {
                $tituloPagina = "| La Carta";
            } else if ($modulo == "galeria") {
                $tituloPagina = "| Galería";
            } else if ($modulo == "opiniones") {
                $tituloPagina = "| Opiniones";
            } else if ($modulo == "pedidos") {
                $tituloPagina = "| Pedidos";
            } else if ($modulo == "contacto") {
                $tituloPagina = "| Contacto";
            } else if ($modulo == "registro") {
                $tituloPagina = "| Registro";
            } else if ($modulo == "login") {
                $tituloPagina = "| Inicio";
            } else if ($modulo == "carrito") {
                $tituloPagina = "| Mi Carrito";
            } else if ($modulo == "index") {
                $tituloPagina = "";
            } else {
                $tituloPagina = "";
            }

            return $tituloPagina;
        }
    }
?>