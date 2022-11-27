<?php
    if (isset($_SESSION['id_usuario'])) {
        $id_usuario = $_SESSION['id_usuario'];

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
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Codigo</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Detalles</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            while ($datos = mysqli_fetch_array($pedidos)) {
                                $producto = new Productos;
                                $datos_pdt = $producto -> obtenerPdt($datos['id_producto']);
                        ?>
                            <tr>
                                <td><?= $datos['id_pedido'] ?></td>
                                <td><?= $datos['codigo'] ?></td>

                                <?php while ($pdt = mysqli_fetch_array($datos_pdt)) { ?>
                                    <td><?= $pdt['nombre'] ?></td>
                                <?php } ?>

                                <td><?= $datos['estatus'] ?></td>
                                <td><?= $fecha -> fechaFormato($datos['fecha_registro']) ?></td>
                                <td><a href="index.php?romanza=orden" class="header__btn btn btn-warning nav-link header__salir mx-3"> <span class="header__info-cuenta">Ver</span></a></td>
                            </tr>
                        <?php
                            }
                        ?>
                </tbody>
            </table>
        </article>
    </section>
</section>