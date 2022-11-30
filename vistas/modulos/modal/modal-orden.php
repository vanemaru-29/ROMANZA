<?php
if (isset($datos_od['id_orden'])) {
    $codigo_od = $datos_od['id_orden'];
    $total_od = $datos_od['total'];

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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Mi Pedido</h1>
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

                        <p class="detalles__orden-total text-center">Total en Bolivares: Bs. <?= ($bs['bs_equivalencia'] *  $total_od) ?></p>

                    <?php } ?>

                    <h2></h2>

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
                        <hr>
                        <h6 class="text-center">No hay direcciones registradas</h6>

                    <?php
                    } else {
                    ?>
                        <hr class="mb-3" />
                        <label for="nombre" class="form-label login__label"> Seleccionar direccion </label>
                        <select class="form-select mb-3" name="id_direccion" id="provincia">
                            <?php
                            while ($datos_dir = mysqli_fetch_array($cant_dir)) {
                            ?>
                                <option value=<?= $datos_dir['id_direccion'] ?>><?= $datos_dir['direccion'] ? $datos_dir['direccion'] : 'No hay direcciones' ?></option>

                            <?php
                            }
                            ?>
                        </select>
                    <?php  } ?>
                    <label for="nombre" class="form-label login__label"> Seleccionar Metodo de pago </label>
                    <select class="form-select mb-3" name="id_metodo_pago" id="buscar-banco">
                        <?php
                        while ($metodo = mysqli_fetch_array($datosM)) {
                        ?>
                            <option value=<?= $metodo['id_metodo_pago'] ?>><?= $metodo['nombre'] ?> - Cedula: <?= $metodo['cedula'] ?> - Telefono: <?= $metodo['telefono'] ?></option>
                        <?php
                        }
                        ?>
                    </select>

                    <div class="formulario__grupo" id="grupo__referencia_p">
                        <label for="referencia_p" class="form-label login__label"> Referencia del pago realizado</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="form-control formulario__input" placeholder=". . ." name="referencia_p" id="referencia_p">
                            <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                        </div>
                        <p class="formulario__input-error m-2">Este campo sólo admite números.</p>
                    </div>

                    <input type="text" hidden value="<?= $codigo_od ?>" class="form-control formulario__input" placeholder=". . ." name="id_orden" id="nombre">

                    <div class="d-grid my-4 mx-auto formulario__grupo formulario__btn-centro editarInfo__actualizar">
                        <button type="submit" name="submit" class="formulario__btn btn btn-danger"> REGISTRAR </button>
                    </div>

                    <?php
                        if (empty($_POST['submit'])) {
                            if (isset($_POST['referencia_p'])) {
                                $referencia = $_POST['referencia_p'];
                            } else {
                                $referencia = "";
                            }

                            if (isset($_POST['id_metodo_pago']) && isset($_POST['id_direccion']) && isset($_POST['id_orden'])) {
                                $id_metodo_pago = $_POST['id_metodo_pago'];
                                $id_direccion = $_POST['id_direccion'];
                                $id_orden = $_POST['id_orden'];
                                
                                $estatus = "Pendiente";
                                
                                $nuevoPago = new Pago();
                                $nuevoPago->registroP($id_direccion, $id_orden, $id_metodo_pago, $referencia, $estatus);
                            }
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="vistas/../js/validacion-pago.js"></script>
<script src="vistas/../js/buscar-banco.js"></script>