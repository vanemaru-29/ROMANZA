<?php
    clearstatcache();
    
    require_once ('vistas/../controladores/autoCarga.php');

    $metodos = new Metodos();
    $datos = $metodos->listaM();
?>

<section class="w-100 py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Lista de metodos de pago </h1>

    <!-- navbar -->
    <div class="mi-cuenta__menu mb-5">
        <a href="index.php?romanza=lista-metodo-pago" class="mi-cuenta-enlace"> Lista de metodos de pago </a>
        <a href="index.php?romanza=registrar-metodo-pago" class="mi-cuenta-enlace"> Registrar metodo de pago </a>
        <a href="index.php?romanza=conversion" class="mi-cuenta-enlace"> Conversion </a>
    </div>

    <!-- pedidos -->
    <section class="container mi-cuenta">
        <img src="vistas/../publico/activos/iconos/icono-oscuro.svg" class="icono__romanza" width="" alt="Logo ROMANZA">
        <h2 class="fw-bold text-center pb-5">Metodos de pago registrados</h2>

        <!-- formulario reportes por fecha -->
        <article>
            <?php
                $nombreTabla = "metodo_pago";
                $fecha = new Fechas();
                $fechaActual = $fecha->fechaActual();
                $fechaPrimera = $fecha->fechaPrimera($nombreTabla);
            ?>

            <form action="vistas/reportes/productos-registrados.php" method="POST" class="formulario formulario-fechas" target="_blank"> 
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



        <article>
            <table class="table table-hover" id="table_data">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre del banco</th>
                        <th scope="col">Descripción</th>
                        <th scope="col" class="text-center">Numero de cuenta</th>
                        <th scope="col" class="text-center">Cedula</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($resultado = mysqli_fetch_array($datos)) {
                            ?>
                                <tr>
                                    <td><?= $resultado['id_metodo_pago'] ?></td>
                                    <td><?= $resultado['nombre'] ?></td>
                                    <td><?= $resultado['descripcion'] ?></td>
                                    <td><?= $resultado['numero_cuenta'] ?></td>
                                    <td><?= $resultado['cedula'] ?></td>
                                    <td><?= $resultado['telefono'] ?></td>
                                    <td class="text-center"> <a href="index.php?romanza=lista-metodo-pago&&estatus=<?= $resultado['id_metodo_pago'] ?>" class="btn" id="estatus-<?= $resultado['estatus'] ?>"><?= $resultado['estatus'] ?></a> </td>
                              
                                   
                                    <td>
                                        <a href="index.php?romanza=lista-metodo-pago&&metodo-pago=<?= $resultado['id_metodo_pago'] ?>" class="direcciones__icono direcciones__icono-borrar" title="Eliminar"><i class="fa-solid fa-circle-xmark"></i></a>
                                        <a href="index.php?romanza=editar-producto&&producto=<?= $resultado['id_producto'] ?>" class="direcciones__icono direcciones__icono-editar" title="Editar"><i class="fa-solid fa-square-pen carrito__icono-btn"></i></a>
                                    </td>
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