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
                    
                    <?php  } ?>
                



                    <input type="text" hidden value="<?= $codigo_od ?>" class="form-control formulario__input" placeholder=". . ." name="id_orden" id="nombre">

    

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