<?php
    if (isset($_SESSION['id_usuario'])) {
        $id_usuario = $_SESSION['id_usuario'];

        $lista_od = new Ordenes();
        $ordenes = $lista_od -> listaOrdenes();

        $lista_pd = new Pedidos();
        $pedidos = $lista_pd->listaPedidos($id_usuario);

        $fecha = new Fechas();
    }
?>

<section class="py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Pedidos Pendientes </h1>

    <!-- pedidos pendientes -->
    <section class="container mi-cuenta">
        <h2 class="fw-bold text-center pb-5">Pedidos</h2>

        <article>
            <table class="table table-hover">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Código de la Orden</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Precio Total</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Fecha de la Orden</th>
                        <th scope="col">Detalles</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                        while ($datos_od = mysqli_fetch_array($ordenes)) {
                    ?>
                        <tr class="text-center">
                            <td><?= $datos_od['id_orden'] ?></td>

                            <?php
                                $usuario = new Usuarios();
                                $datosUser = $usuario->obtenerUser($datos_od['id_usuario']);
                                while ($inforUser = mysqli_fetch_array($datosUser)) {
                            ?>
                                <td><?= $inforUser['nombre'] ?></td>
                            <?php } ?>

                            <td>$ <?= $datos_od['total'] ?></td>
                            <td><?= $datos_od['estatus'] ?></td>
                            <td><?= $fecha->fechaFormato($datos_od['fecha_registro']) ?></td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ordenDetalles-<?= $datos_od['id_orden'] ?>">
                                    Ver Detalles
                                </button>
                            </td>
                        </tr>
                    <?php
                            include ('vistas/modulos/modal/modal-orden.php');
                        }
                    ?>
                </tbody>
            </table>
        </article>
    </section>
</section>