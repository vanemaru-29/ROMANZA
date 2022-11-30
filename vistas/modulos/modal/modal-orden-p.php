<?php
if (isset($resultado['id_orden'])) {
    $codigo_od = $resultado['id_orden'];
    $total_od = $resultado['total'];

    $productos_od = new Pedidos();
    $producto = $productos_od->verPedido($codigo_od);

    $producto_datos = new Productos();

    $pagos = new Pago();
    $datos = $pagos->listaOrden();

    $conversion = new Conversion();
    $conver = $conversion->equivalenciaBs();
}





if (!isset($_SESSION['nombre_usuario'])) {
?>
    <script>
        window.location.href = "vistas/../index.php?romanza=inicio";
    </script>
<?php
} else {
    $nombre_usuario = $_SESSION['nombre_usuario'];

    $usuario = new Usuarios();
    $datos = $usuario->listaCli();
}

if (isset($id_usuario['id_usuario'])) {
    $usuario = $id_usuario['id_usuario'];

    $lista_od = new Ordenes();
    $ordenes = $lista_od->obtenerOrdenes($usuario);
}


$metodos = new Metodos();
$datosM = $metodos->listaMa();
?>

<!-- Modal -->
<div class="modal fade " id="ordenDetalles-<?= $codigo_od ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Pedido</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="#" method="POST" class="formulario" id="pago">
                    <?php while ($datos_od = mysqli_fetch_array($producto)) { ?>
                        <div class="detalles__orden">
                            <p class="">Cantidad <?= $datos_od['cantidad'] ?>:</p>

                            <?php
                            $productos = $producto_datos->obtenerPdt($datos_od['id_producto']);
                            while ($datos_pdt = mysqli_fetch_array($productos)) {
                            ?>
                                <p class="detalles__orden-nombre"><?= $datos_pdt['nombre'] ?>.</p>
                            <?php } ?>

                            <p class="detalles__orden-total">Total: $ <?= $datos_od['total'] ?></p>
                        </div>
                    <?php } ?>
                    <p class="detalles__orden-total text-center">Total en USD: $ <?= $total_od ?></p>
                    <?php while ($bs = mysqli_fetch_array($conver)) { ?>
                    
                            <p class="detalles__orden-total text-center">Total en Bolivares: $ <?= ($bs['bs_equivalencia'] *  $total_od)?></p>
                    
                    <?php } ?>

                    <h2></h2>

                    <?php


                    // $categorias = new Fechas();
                    // $datosCat = $categorias->fechasRango($tabla, $desde, $hasta);
                    // $totalRegistros = @mysqli_num_rows($datosCat);

                    $usuario = new Usuarios();
                    $datos = $usuario->datosUser($nombre_usuario);
                    while ($datos_usuario = mysqli_fetch_array($datos)) {
                        $id_usuario = $datos_usuario['id_usuario'];
                        $direcciones = new Direcciones();
                        $cant_dir = $direcciones->misDir($id_usuario);
                    }

                    $totalRegistros = @mysqli_num_rows($cant_dir);
                    if ($totalRegistros == 0) {
                    ?>

              

                    <?php
                    } else {
                    ?>
                        <hr class="mb-3" />
                        <label for="nombre" class="form-label login__label"> Seleccionar direccion </label>
                        <select class="form-select mb-3" name="id_direccion" id="provincia">
                            <?php
                            while ($datos_dir = mysqli_fetch_array($cant_dir)) {
                            ?>
                                <option value=<?= $datos_dir['id_direccion'] ?>><?= $datos_dir['direccion'] ?></option>

                            <?php
                            }
                            ?>
                        </select>
                    <?php
                    }
                    ?>


          



                    <?php
                    if (empty($_POST['submit'])) {
                        if (isset($_POST['referencia_p'])) {
                            if (strlen($_POST['referencia_p']) >= 1) {
                                $referencia = $_POST['referencia_p'];

                                $id_metodo_pago = $_POST['id_metodo_pago'];
                                $id_direccion = $_POST['id_direccion'];
                                $id_orden = $_POST['id_orden'];
                                $estatus = "Pendiente";

                                /*      $usuario = new Usuarios();
                                $datos = $usuario->datosUser($nombre_usuario);
                                while ($datos_usuario = mysqli_fetch_array($datos)) {
                                    $id_usuario = $datos_usuario['id_usuario'];
                                } */


                                /*         $direccion = new Direcciones();
                                $datos = $direccion->misDir($ID);
                                while ($datos_direc = mysqli_fetch_array($datos)) {
                                    $id_direccion = $datos_direc['id_direccion'];
                      
                                } */

                                /*        $orden = new Ordenes();
                                $datos = $orden->orden($codigo_od);
                                while ($datos_orden = mysqli_fetch_array($datos)) {
                                    $id_orden = $datos_orden['id_orden'];
                                } */

                                /*                       $direccion = new Direcciones();
                                $datos = $direccion->direccion($ID);
                                while ($datos_direc = mysqli_fetch_array($datos)) {
                                    $id_direccion = $datos_direc['id_direccion'];
                                }

                                $metodo = new Metodos();
                                $datos = $metodo->metodo($id_metodo);
                                while ($datos_metodo = mysqli_fetch_array($datos)) {
                                    $id_metodo_pago = $datos_metodo['id_metodo_pago'];
                                } */


                                $nuevoPago = new Pago();
                                $nuevoPago->registroP($id_direccion, $id_orden, $id_metodo_pago, $referencia, $estatus);
                            } else {
                                $camposVacios = new ErrFormularios();
                                $camposVacios->camposVacios();
                            }
                        }
                    }
                    ?>
                </form>


            </div>

        </div>
    </div>
</div>

<script src="vistas/../js/validacion-producto.js"></script>
<script src="vistas/../js/buscar-banco.js"></script>