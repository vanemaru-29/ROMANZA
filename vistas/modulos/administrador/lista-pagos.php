<?php
    clearstatcache();
    
    require_once ('vistas/../controladores/autoCarga.php');

    $pagos = new Pago();
    $datos = $pagos->listaOrden();
?>

<section class="w-100 py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo">Lista de Ordenes</h1>

    <!-- pedidos -->
    <section class="container mi-cuenta">
        <h2 class="fw-bold text-center pb-5">Ordenes Realizadas</h2>

        <!-- formulario reportes por fecha -->
        <article>
            <?php
                $nombreTabla = "pago";
                $fecha = new Fechas();
                $fechaActual = $fecha->fechaActual();
                $fechaPrimera = $fecha->fechaPrimera($nombreTabla);
            ?>

            <form action="vistas/reportes/pagos-registradas.php" method="POST" class="formulario formulario-fechas" target="_blank"> 
                <?php
                    while ($verFecha = mysqli_fetch_array($fechaPrimera)) {
                ?>
                    <!-- Grupo: Desde -->
                    <div class="formulario__grupo" id="grupo__desde">
                        <label for="desde" class="form-label login__label"> Desde: </label>
                        <div class="formulario__grupo-input">
                            <input type="date" class="form-control formulario__input" name="desde" id="desde" value="<?= $verFecha['fecha_registro'] ?>">
                        </div>
                        <!-- <p class="formulario__input-error m-2">Algo.</p> -->
                    </div>
                <?php } ?>

                <!-- Grupo: Hasta -->
                <div class="formulario__grupo" id="grupo__hasta">
                    <label for="hasta" class="form-label login__label"> Hasta </label>
                    <div class="formulario__grupo-input">
                        <input type="date" class="form-control formulario__input" name="hasta" id="hasta" value="<?= $fechaActual ?>">
                    </div>
                    <!-- <p class="formulario__input-error m-2">Algo.</p> -->
                </div>
                
                <div class="d-grid my-4 formulario__grupo">
                    <label for="exportar-pdf" class="form-label login__label">  </label>
                    <button type="submit" name="exportar-pdf" id="exportar-pdf" class="formulario__btn btn btn-secondary"> Exportar PDF </button>
                </div>
            </form>
        </article>

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
                        <th scope="col">Pago</th>
                        <th scope="col">Referencia</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Total</th>
                        <th scope="col">Estatus</th>
                        <th scope="col" class="text-center">Registro</th>
             
                        
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

                                    <td scope="col"><?= $resultado['estatus_p'] ?></td>

                                   <!--  <td class="text-center"> <a href="index.php?romanza=lista-pagos&&estatus=<?= $resultado['id_orden'] ?>" class="btn" id="estatus-<?= $resultado['estatus_p'] ?>"><?= $resultado['estatus_p'] ?></a> </td> -->
                            
                                   <td scope="col" class="text-center"><?= $fecha->fechaFormato($resultado['fecha_registro']) ?></td>
                             
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </article>
    </section>
</section>

<script src="vistas/../js/dataTables.js"></script>
<script src="vistas/../publico/js/estatuspago.js"></script>