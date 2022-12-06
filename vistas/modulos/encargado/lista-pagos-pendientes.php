<?php
    clearstatcache();
    
    require_once ('vistas/../controladores/autoCarga.php');

    $pagos = new Pago();
    $datos = $pagos->listaOrdenPendientes();

    $fecha = new Fechas();
?>

<section class="w-100 py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo">Ordenes Pendientes</h1>

    <!-- navbar -->
    <div class="mi-cuenta__menu mb-5">
        <a href="#" class="mi-cuenta-enlace"> Ordenes pendientes</a>
        <a href="index.php?romanza=lista-pagos-aprobados" class="mi-cuenta-enlace"> Ordenes aprobadas</a>
    </div>

    <!-- pedidos -->
    <section class="container mi-cuenta">
        <h2 class="fw-bold text-center pb-5">Ordenes Pendientes</h2>

        <?php
            // cambiar estatus del pago y la orden
            if (!empty($_GET['estatus'])) {
                $pago = new Pago();
                $pg = $pago->obtenerP($_GET['estatus']);

                while ($datos_pg = $pg->fetch_object()) {
                    $estatus = new Pago();
                    $estatus->estatusPagoOrden($_GET['estatus'], $datos_pg->estatus, $datos_pg->id_orden);
                }
            }
        ?>

        <article>
            <table class="table table-hover" id="table_data">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Pago</th>
                        <th scope="col">Referencia</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Info</th>
                        <!-- <th scope="col" class="text-center">Fecha</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($resultado = mysqli_fetch_array($datos)) {
                            ?>
                                <tr class="text-center">
                                    <td scope="col"><?= $resultado['id_pago'] ?></td>
                                    <td scope="col"><?= $resultado['nombre'] ?></td>
                                    <td scope="col"><?= $resultado['descripcion']?></td>
                                    <td scope="col"><?= $resultado['referencia_p']?></td>
                                    <td scope="col"><?= $resultado['direccion']?></td>

                                    <?php
                                        $obtener_pago = new Pago();
                                        $datos_pago = $obtener_pago -> obtenerP($resultado['id_pago']);
                                        while ($info_pago = mysqli_fetch_array($datos_pago)) {
                                            ?>
                                                <td class="text-center"> <a href="index.php?romanza=lista-pagos-pendientes&&estatus=<?= $resultado['id_pago'] ?>" class="btn" id="estatus-<?= $info_pago['estatus'] ?>"><?= $info_pago['estatus'] ?></a> </td>
                                            <?php
                                        }
                                    ?>
                                <td>

                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ordenDetalles-<?= $resultado['id_orden'] ?>">
                                    Detalles
                                </button>
                            </td>

                            <?php include('vistas/modulos/modal/modal-orden-encargado.php'); ?>
                        </tr>                        
                    <?php } ?>
                </tbody>
            </table>
        </article>
    </section>
</section>

<!-- <script src="vistas/../js/dataTables.js"></script> -->
<script src="vistas/../publico/js/estatuspago.js"></script>