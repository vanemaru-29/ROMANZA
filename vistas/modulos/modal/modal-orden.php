<?php
    if (isset($datos_od['id_orden'])) {
        $codigo_od = $datos_od['id_orden'];

        $productos_od = new Pedidos();
        $producto = $productos_od -> verPedido($codigo_od);

        $producto_datos = new Productos();
    }
?>

<!-- Modal -->
<div class="modal fade" id="ordenDetalles-<?= $codigo_od ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Mi Pedido</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
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
        </div>
        </div>
    </div>
</div>