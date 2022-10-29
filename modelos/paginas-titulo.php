<?php
    class ModeloDeTitulo {
        // generar titulo
        static public function titulosPaginasM($modulo) {
            // general
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

            // cliente
            } else if ($modulo == "carrito") {
                $tituloPagina = "| Mi Carrito";
            } else if ($modulo == "mi-cuenta") {
                $tituloPagina = "| Mi Cuenta";
            } else if ($modulo == "editar-direccion") {
                $tituloPagina = "| Editar Direccion";
            } else if ($modulo == "mis-direcciones") {
                $tituloPagina = "| Mis Direcciones";
            } else if ($modulo == "mis-ordenes") {
                $tituloPagina = "| Mis Ordenes";
            } else if ($modulo == "orden") {
                $tituloPagina = "| Orden";
                
            // administrador
            } else if ($modulo == "reportes") {
                $tituloPagina = "| Reportes";
            } else if ($modulo == "registrar-producto") {
                $tituloPagina = "| Registrar Producto";
            } else if ($modulo == "editar-producto") {
                $tituloPagina = "| Editar Producto";
            } else if ($modulo == "lista-productos") {
                $tituloPagina = "| Lista de Productos";
            } else if ($modulo == "registrar-producto") {
                $tituloPagina = "| Registrar Producto";
            } else if ($modulo == "editar-producto") {
                $tituloPagina = "| Editar Producto";
            } else if ($modulo == "lista-categorias") {
                $tituloPagina = "| Lista de Categorias";
            } else if ($modulo == "registrar-categoria") {
                $tituloPagina = "| Registrar Categoria";
            } else if ($modulo == "editar-categoria") {
                $tituloPagina = "| Editar Categoria";
            } else if ($modulo == "administrar") {
                $tituloPagina = "| Administrar";
                
            // encargado
            } else if ($modulo == "pedidos-pendientes") {
                $tituloPagina = "| Pedidos Pendientes";
            } else if ($modulo == "detalles-pedido") {
                $tituloPagina = "| Detalles del Pedido";

            // ninguna de las anteriores
            } else if ($modulo == "index") {
                $tituloPagina = "";
            } else {
                $tituloPagina = "";
            }

            return $tituloPagina;
        }
    }
?>