<!-- <section class="my-5 py-5"></section> -->

<?php
    // carrito
    if (isset($_SESSION['carrito']) || isset($_POST['id'])) {
        if (isset($_SESSION['carrito'])) {
            $mi_carrito = $_SESSION['carrito'];

            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $categoria = $_POST['categoria'];
                $nombre = $_POST['nombre'];
                $precio = $_POST['precio'];
                $cantidad = $_POST['cantidad'];
                $donde = -1;

                if ($donde != -1) {
                    $cuanto = $mi_carrito[$donde]['cantidad'] + $cantidad;
                    $mi_carrito = [$donde] = array("id"=>$id, "categoria"=>$categoria, "nombre"=>$nombre, "precio"=>$precio, "cantidad"=>$cuanto);
                } else {
                    $mi_carrito[] = array("id"=>$id, "categoria"=>$categoria, "nombre"=>$nombre, "precio"=>$precio, "cantidad"=>$cantidad);
                }
            }
            
        } else {
            $id = $_POST['id'];
            $categoria = $_POST['categoria'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];
            
            $mi_carrito[] = array("id"=>$id, "categoria"=>$categoria, "nombre"=>$nombre, "precio"=>$precio, "cantidad"=>$cantidad);
        }

        $_SESSION['carrito'] = $mi_carrito;
    }

    $redireccion = new Redirecciones();
    $redireccion->pedidos();
?>