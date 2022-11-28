<?php
    clearstatcache();
    
    require_once ('vistas/../controladores/autoCarga.php');

    $productos = new Ordenes();
    $datos = $productos->listaOrden();
?>

<section class="w-100 py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Lista de ordenes</h1>

    <!-- navbar -->
    <div class="mi-cuenta__menu mb-5">
        <a href="#" class="mi-cuenta-enlace"> Lista de ordenes </a>

    </div>

    <!-- pedidos -->
    <section class="container mi-cuenta">
        <h2 class="fw-bold text-center pb-5">Ordenes Realizadas</h2>

        <!-- formulario reportes por fecha -->
        <article>
            <?php
                $nombreTabla = "orden";
                $fecha = new Fechas();
                $fechaActual = $fecha->fechaActual();
                $fechaPrimera = $fecha->fechaPrimera($nombreTabla);
            ?>

            <form action="vistas/reportes/ordenes-registradas.php" method="POST" class="formulario formulario-fechas" target="_blank"> 
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
            // eliminar producto
            if (!empty($_GET['producto'])) {
                $eliminar = new Productos();
                $eliminar->eliminarPdt($_GET['producto']);
            }

            // cambiar estatus del producto
            if (!empty($_GET['estatus'])) {
                $producto = new Productos();
                $pdt = $producto->obtenerPdt($_GET['estatus']);

                while ($pdtDatos = $pdt->fetch_object()) {
                    $estatus = new Productos();
                    $estatus->estatusPdt($_GET['estatus'], $pdtDatos->estatus);
                }
            }
        ?>

        <article>
            <table class="table table-hover" id="table_data">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Precio total de la orden</th>
                        <th scope="col">Estatus</th>
                        <th scope="col" class="text-center">Fecha de registro</th>
             
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($resultado = mysqli_fetch_array($datos)) {
                            ?>
                                <tr>
                                    <td scope="col"><?= $resultado['id_orden'] ?></td>
                                    <td scope="col"><?= $resultado['nombre'] ?></td>
                                    <td scope="col"><?= $resultado['total'] ?></td>
                                  
                                    <td scope="col"><?= $resultado['estatus'] ?></td>
                            
                                    <td scope="col"><?= $resultado['fecha_registro'] ?></td>
                             
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
<script src="vistas/../publico/js/estatus.js"></script>