<?php
    class ModeloDeNavegacion {
        // generar modulo
        static public function enlacesPaginasM($enlace) {
            // general
            if ($enlace == "menu") {
                $modulo = "vistas/modulos/".$enlace.".html";
            } else if ($enlace == "galeria" || $enlace == "opiniones" || $enlace == "pedidos" || $enlace == "contacto" || $enlace == "registro" || $enlace == "login" || $enlace == "recuperar-clave") {
                $modulo = "vistas/modulos/".$enlace.".php";

            // cliente
            } else if ($enlace == "carta" || $enlace == "vaciar-carro" || $enlace == "mi-pedido" || $enlace == "registrar-pedido" || $enlace == "mi-cuenta" || $enlace == "mis-ordenes" || $enlace == "orden" || $enlace == "mis-direcciones" || $enlace == "editar-direccion") {
                $modulo = "vistas/modulos/cliente/".$enlace.".php";

            // administrador
            } else if   ($enlace == "registrar-producto" || $enlace == "registrar-categoria" || $enlace == "registrar-metodo-pago" || $enlace == "administrar" || $enlace == "editar-producto" || $enlace == "editar-categoria" ||
                        // reportes
                        $enlace == "lista-productos" || $enlace == "lista-categorias" || $enlace == "lista-metodo-pago" || $enlace == "lista-clientes" || $enlace == "lista-opiniones" || $enlace == "lista-ordenes" || $enlace == "lista-pedidos" || $enlace == "lista-pagos") {
                
                $modulo = "vistas/modulos/administrador/".$enlace.".php";

                
            // encargado
            } else if ($enlace == "pedidos-pendientes" || $enlace == "detalles-pedido" || $enlace == "lista-pagos-pendientes" || $enlace == "lista-pagos-aprobados") {
                $modulo = "vistas/modulos/encargado/".$enlace.".php";

            // ninguna de las anteriores
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
