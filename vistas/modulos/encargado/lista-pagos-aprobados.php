<?php
    clearstatcache();
    
    require_once ('vistas/../controladores/autoCarga.php');

    $pagos = new Pago();
    $datos = $pagos->listaOrdenAprobadas();
?>

<section class="w-100 py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Ordenes aprobadas</h1>

    <div class="mi-cuenta__menu mb-5">
        <a href="index.php?romanza=lista-pagos-pendientes" class="mi-cuenta-enlace"> Ordenes pendientes</a>
        <a href="#" class="mi-cuenta-enlace"> Ordenes aprobadas </a>
    </div>

    <!-- pedidos -->
    <section class="container mi-cuenta">
        <h2 class="fw-bold text-center pb-5"> Ordenes Aprobadas </h2>

        <article>
            <table class="table table-hover" id="table_data">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Pago</th>
                        <th scope="col">Referencia</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Estatus</th>
                        <!-- <th scope="col" class="text-center">Fecha</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php while ($resultado = mysqli_fetch_array($datos)) { ?>
                        <tr>
                            <td scope="col"><?= $resultado['id_pago'] ?></td>
                            <td scope="col"><?= $resultado['nombre'] ?></td>
                            <td scope="col"><?= $resultado['descripcion']?></td>
                            <td scope="col"><?= $resultado['referencia_p']?></td>
                            <td scope="col"><?= $resultado['direccion']?></td>
                            <td class="text-center"> <span class="btn btn-success"><?= $resultado['estatus_p'] ?></span> </td>                             
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </article>
    </section>
</section>

<script src="vistas/../js/dataTables.js"></script>