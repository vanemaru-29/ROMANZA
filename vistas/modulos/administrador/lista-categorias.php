<?php
    require_once ('vistas/../controladores/autoCarga.php');

    $categorias = new Categorias();
    $datos = $categorias->listaCat();
?>

<section class="w-100 py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Lista de Categorias </h1>

    <!-- navbar -->
    <div class="mi-cuenta__menu mb-5">
        <a href="index.php?romanza=lista-categorias" class="mi-cuenta-enlace"> Lista de Categorias </a>
        <a href="index.php?romanza=registrar-categoria" class="mi-cuenta-enlace"> Registrar Categoria </a>
    </div>

    <!-- lista de categorias -->
    <section class="container mi-cuenta">
        <h2 class="fw-bold text-center pb-5">Categorias Registradas</h2>

        <!-- formulario reportes por fecha -->
        <article>
            <?php
                $nombreTabla = "categoria";
                $fecha = new Fechas();
                $fechaActual = $fecha->fechaActual();
                $fechaPrimera = $fecha->fechaPrimera($nombreTabla);
            ?>

            <form action="vistas/reportes/categorias-registradas.php" method="POST" class="formulario formulario-fechas" target="_blank"> 
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
            // eliminar categoria
            if (!empty($_GET['categoria'])) {
                $eliminar = new Categorias();
                $eliminar->eliminarCat($_GET['categoria']);
            }
        ?>

        <article>
            <table class="table table-hover" id="table_data">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Registro</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($resultado = mysqli_fetch_array($datos)) {
                            ?>
                                <tr>
                                    <td><?= $resultado['id_categoria'] ?></td>
                                    <td><?= $resultado['nombre'] ?></td>
                                    <td><?= $resultado['descripcion'] ?></td>
                                    <td>
                                        <?php
                                            $fecha = new Fechas();
                                            $resultadoFecha = $fecha->fechaFormato($resultado['fecha_registro']);
                                            echo $resultadoFecha;
                                        ?>
                                    </td>
                                    <td>
                                        <a href="index.php?romanza=lista-categorias&&categoria=<?= $resultado['id_categoria'] ?>" class="direcciones__icono direcciones__icono-borrar" id="eliminar" title="Eliminar"><i class="fa-solid fa-circle-xmark"></i></a>
                                        <a href="index.php?romanza=editar-categoria&&categoria=<?= $resultado['id_categoria'] ?>" class="direcciones__icono direcciones__icono-editar" title="Editar"><i class="fa-solid fa-square-pen carrito__icono-btn"></i></a>
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