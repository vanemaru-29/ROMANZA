<?php
    clearstatcache();
    
    require_once ('vistas/../controladores/autoCarga.php');

    $pedidos = new Pedidos();
    $datos = $pedidos->todosPedidos();
?>

<section class="w-100 py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Lista de Pedidos</h1>

    <!-- pedidos -->
    <section class="container mi-cuenta">
        <h2 class="fw-bold text-center pb-5">Pedidos Registrados</h2>

        <!-- formulario reportes por fecha -->
        <article>
            <?php
                $nombreTabla = "orden";
                $fecha = new Fechas();
                $fechaActual = $fecha->fechaActual();
                $fechaPrimera = $fecha->fechaPrimera($nombreTabla);
            ?>

            <form action="vistas/reportes/pedidos-registrados.php" method="POST" class="formulario formulario-fechas" target="_blank"> 
                <?php
                    while ($verFecha = mysqli_fetch_array($fechaPrimera)) {
                ?>
                    <!-- Grupo: Desde -->
                    <div class="formulario__grupo" id="grupo__desde">
                        <label for="desde" class="form-label login__label"> Desde: </label>
                        <div class="formulario__grupo-input">
                            <input type="date" class="form-control formulario__input" name="desde" id="desde" value="<?= $verFecha['fecha_registro'] ?>">
                        </div>
                    </div>
                <?php } ?>

                <!-- Grupo: Hasta -->
                <div class="formulario__grupo" id="grupo__hasta">
                    <label for="hasta" class="form-label login__label"> Hasta </label>
                    <div class="formulario__grupo-input">
                        <input type="date" class="form-control formulario__input" name="hasta" id="hasta" value="<?= $fechaActual ?>">
                    </div>
                </div>
                
                <div class="d-grid my-4 formulario__grupo">
                    <label for="exportar-pdf" class="form-label login__label">  </label>
                    <button type="submit" name="exportar-pdf" id="exportar-pdf" class="formulario__btn btn btn-secondary"> Exportar PDF </button>
                </div>
            </form>
        </article>

        <article>
            <table class="table table-hover" id="table_data">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Código</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Total</th>
                        <th scope="col" class="text-center">Fecha de Registro</th>
             
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($resultado = mysqli_fetch_array($datos)) {
                            ?>
                                <tr>
                                    <td scope="col"><?= $resultado['id_pedido'] ?></td>
                                    <td scope="col"><?= $resultado['codigo'] ?></td>

                                    <?php
                                        $producto = new Productos();
                                        $datos_pdt = $producto -> obtenerPdt($resultado['id_producto']);
                                        while ($info_pdt = mysqli_fetch_array($datos_pdt)) {
                                    ?>
                                        <td scope="col"><?= $info_pdt['nombre'] ?></td>
                                    <?php } ?>
                                    
                                    <td scope="col"><?= $resultado['cantidad'] ?></td>                            
                                    <td scope="col"><?= $resultado['total'] ?></td>                                  
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