<?php
    if (isset($_SESSION['id_usuario'])) {
        $id_usuario = $_SESSION['id_usuario'];

        $lista_od = new Ordenes();
        $ordenes = $lista_od->obtenerOrdenes($id_usuario);

        $lista_pd = new Pedidos();
        $pedidos = $lista_pd->listaPedidos($id_usuario);

        $fecha = new Fechas();
    }
?>

<section class="py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Pedidos </h1>

    <!-- navbar -->
    <div class="mi-cuenta__menu mb-5">
        <a href="index.php?romanza=mi-cuenta" class="mi-cuenta-enlace"> Mi Cuenta </a>
        <a href="index.php?romanza=mis-direcciones" class="mi-cuenta-enlace"> Direcciones </a>
        <a href="index.php?romanza=mis-ordenes" class="mi-cuenta-enlace"> Pedidos Recientes </a>
    </div>

    <!-- pedidos -->
    <section class="container mi-cuenta">
        <h2 class="fw-bold text-center pb-5">Pedidos Recientes</h2>

        <article>
            <table class="table table-hover">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Código de la Orden</th>
                        <th scope="col">Precio Total</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Fecha de la Orden</th>
                        <th scope="col">Detalles</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($datos_od = mysqli_fetch_array($ordenes)) { ?>
                        <tr class="text-center">
                            <?php
                                $pago_orden = new Pago();
                                $detalles_pago = $pago_orden -> pagoOrden ($datos_od['id_orden']);
                            ?>
                            <td><?= $datos_od['id_orden'] ?></td>

                            <td>$ <?= $datos_od['total'] ?></td>

                            <td class="text-center">
                                <span class="btn" id="estatus-<?= $datos_od['estatus'] ?>"><?= $datos_od['estatus'] ?></span>
                            </td>

                            <td><?= $fecha->fechaFormato($datos_od['fecha_registro']) ?></td>

                            <?php
                                if ($detalles_pago->num_rows > 0) {
                                    while ($info_pago = mysqli_fetch_array($detalles_pago)) {
                                        if ($info_pago['estatus'] == 'aprobado') { ?>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ordenDetalles-<?= $datos_od['id_orden'] ?>">
                                                    Detalles
                                                </button>
                                            </td>
                                        <?php } else if ($info_pago['estatus'] == 'enviado') { ?>
                                            <td>
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ordenDetalles-<?= $datos_od['id_orden'] ?>">
                                                    Detalles
                                                </button>
                                            </td>
                                        <?php }
                                    }
                            ?>                                
                            <?php } else { ?>                            
                                <td>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ordenDetalles-<?= $datos_od['id_orden'] ?>">
                                        Pagar
                                    </button>
                                </td>
                            <?php } ?>
                        </tr>

                    <?php
                        if ($datos_od['estatus'] == 'pendiente') {
                            include('vistas/modulos/modal/modal-orden.php');
                        }

                        include('vistas/modulos/modal/modal-orden-p.php');
                    }
                    ?>
                </tbody>
            </table>
        </article>
    </section>
</section>

<script src="vistas/../publico/js/estatuspago.js"></script>