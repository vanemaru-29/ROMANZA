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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Información de la Orden</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <!-- <form action="#" method="POST" class="formulario" id="pago"> -->
                    <?php while ($datos_od = mysqli_fetch_array($producto)) { ?>
                        <div class="detalles__orden">
                            <p class="my-2">Cantidad <?= $datos_od['cantidad'] ?>:</p>

                            <?php
                                $productos = $producto_datos->obtenerPdt($datos_od['id_producto']);
                                while ($datos_pdt = mysqli_fetch_array($productos)) {
                            ?>
                                <p class="my-2"><?= $datos_pdt['nombre'] ?>.</p>
                            <?php } ?>

                            <p class="my-2">Total: $ <?= $datos_od['total'] ?></p>
                        </div>
                    <?php } ?>

                    <div class="my-2">
                        <p class="m-0"><strong>Total en USD: $ <?= $total_od ?></strong></p>

                        <?php while ($bs = mysqli_fetch_array($conver)) { ?>                    
                                <p class="m-0"><strong>Total en Bolivares: $ <?= ($bs['bs_equivalencia'] *  $total_od)?></strong></p>                    
                        <?php } ?>
                    </div>

                    <?php
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

                    <?php } else { ?>
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
                    <?php } ?>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>

<script src="vistas/../js/validacion-producto.js"></script>
<script src="vistas/../js/buscar-banco.js"></script>