<?php
    clearstatcache();
    
    require_once ('vistas/../controladores/autoCarga.php');

    $productos = new Productos();
    $datos = $productos->listaPdt();
?>

<section class="w-100 py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Lista de Productos </h1>

    <!-- navbar -->
    <div class="mi-cuenta__menu mb-5">
        <a href="index.php?romanza=lista-productos" class="mi-cuenta-enlace"> Lista de Productos </a>
        <a href="index.php?romanza=registrar-producto" class="mi-cuenta-enlace"> Registrar Producto </a>
    </div>

    <!-- pedidos -->
    <section class="container mi-cuenta">
        <h2 class="fw-bold text-center pb-5">Productos Registrados</h2>

        <!-- formulario reportes por fecha -->
        <article>
            <?php
                $nombreTabla = "producto";
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

        <?php
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
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col" class="text-center">Precio</th>
                        <th scope="col" class="text-center">Estatus</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Registro</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($resultado = mysqli_fetch_array($datos)) { ?>
                                <tr>
                                    <td><?= $resultado['id_producto'] ?></td>
                                    <td><?= $resultado['nombre'] ?></td>
                                    <td><?= $resultado['descripcion'] ?></td>
                                    <td class="text-center">$ <?= $resultado['precio'] ?></td>
                                    <td class="text-center"> <a href="index.php?romanza=lista-productos&&estatus=<?= $resultado['id_producto'] ?>" class="btn" id="estatus-<?= $resultado['estatus'] ?>"><?= $resultado['estatus'] ?></a> </td>
                                    <td>
                                        <?php
                                            $categoria = new Categorias();
                                            $cat = $categoria->obtenerCat($resultado['id_categoria']);

                                            while ($catDatos = $cat->fetch_object()) {
                                                echo $catDatos->nombre;
                                            }
                                        ?>
                                    </td>
                                    <td><?= $resultado['imagen'] ?></td>
                                    <td>
                                        <?php
                                            $fecha = new Fechas();
                                            $resultadoFecha = $fecha->fechaFormato($resultado['fecha_registro']);
                                            echo $resultadoFecha;
                                        ?>
                                    </td>
                                    <td>
                                        <!-- eliminar -->
                                        <a href="#" class="direcciones__icono direcciones__icono-borrar" data-bs-toggle="modal" data-bs-target="#eliminarPdt-<?= $resultado['id_producto'] ?>">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                        </a>

                                        <a href="index.php?romanza=editar-producto&&producto=<?= $resultado['id_producto'] ?>" class="direcciones__icono direcciones__icono-editar" title="Editar"><i class="fa-solid fa-square-pen carrito__icono-btn"></i></a>
                                    </td>
                                </tr>
                    <?php
                            include ('vistas/modulos/modal/eliminar-pdt.php');
                        }
                    ?>
                </tbody>
            </table>
        </article>
    </section>
</section>

<script src="vistas/../js/dataTables.js"></script>
<script src="vistas/../publico/js/estatus.js"></script>