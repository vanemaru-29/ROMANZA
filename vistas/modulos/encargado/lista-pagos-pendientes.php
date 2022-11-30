<?php
    clearstatcache();
    
    require_once ('vistas/../controladores/autoCarga.php');

    $pagos = new Pago();
    $datos = $pagos->listaOrdenPendientes();
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

            // cambiar estatus del producto
            if (!empty($_GET['estatus'])) {
                $pago = new Ordenes();
                $p = $pago->obtenerO($_GET['estatus']);

                while ($pDatos = $p->fetch_object()) {
                    $estatus = new Ordenes();
                    $estatus->estatusOrden($_GET['estatus'], $pDatos->estatus);
                }
            }
        ?>

        <article>
            <table class="table table-hover" id="table_data">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Metodo de pago</th>
                        <th scope="col">Referencia del pago</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Total de pago</th>
                        <th scope="col">Estatus</th>
                        <th scope="col" class="text-center">Fecha de registro</th>
             
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($resultado = mysqli_fetch_array($datos)) {
                            ?>
                                <tr>
                                    <td scope="col"><?= $resultado['id_pago'] ?></td>
                                    <td scope="col"><?= $resultado['direccion']?></td>
                                    <td scope="col"><?= $resultado['descripcion']?></td>
                                    <td scope="col"><?= $resultado['referencia_p']?></td>
                                    <td scope="col"><?= $resultado['nombre'] ?></td>

                                  
                                    <td scope="col"><?= $resultado['total'] ?></td>

                                    <td class="text-center"> <a href="index.php?romanza=lista-pagos&&estatus=<?= $resultado['id_orden'] ?>" class="btn" id="estatus-<?= $resultado['estatus_p'] ?>"><?= $resultado['estatus_p'] ?></a> </td>
                            
                                    <td scope="col"><?= $resultado['fecha_registro'] ?></td>
                          
                                <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ordenDetalles-<?= $resultado['id_orden'] ?>">
                                    Ver Detalles
                                </button>
                            </td>
                            <?php
                                include('vistas/modulos/modal/modal-orden-p.php');
                    ?>

                        </tr>
                        
                    <?php
         
                    }
                    ?>    
                            <?php
                                include('vistas/modulos/modal/modal-orden-p.php');
                    ?>
                </tbody>
            </table>
        </article>
    </section>
</section>

<script src="vistas/../js/dataTables.js"></script>
<script src="vistas/../publico/js/estatuspago.js"></script>