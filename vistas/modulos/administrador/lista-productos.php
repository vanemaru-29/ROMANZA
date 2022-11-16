<?php
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
        <img src="vistas/../publico/activos/iconos/icono-oscuro.svg" class="icono__romanza" width="" alt="Logo ROMANZA">
        <h2 class="fw-bold text-center pb-5">Productos Registrados</h2>

        <?php
            if (!empty($_GET['producto'])) {
                $producto = new Productos();
                $pdt = $producto->obtenerPdt($_GET['producto']);
                
                $eliminar = new Productos();
                $eliminar->eliminarPdt($_GET['producto']);

                while ($pdtDatos = $pdt->fetch_object()) {
                    $estatus = new Productos();
                    $estatus->estatusPdt($_GET['producto'], $pdtDatos->estatus);
                }
            }
        ?>

        <article>
            <table class="table table-hover">
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
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($resultado = mysqli_fetch_array($datos)) {
                            ?>
                                <tr>
                                    <td><?= $resultado['id_producto'] ?></td>
                                    <td><?= $resultado['nombre'] ?></td>
                                    <td><?= $resultado['descripcion'] ?></td>
                                    <td class="text-center">$ <?= $resultado['precio'] ?></td>
                                    <td class="text-center"> <a href="index.php?romanza=lista-productos&&producto=<?= $resultado['id_producto'] ?>" class="btn" id="estatus-<?= $resultado['estatus'] ?>"><?= $resultado['estatus'] ?></a> </td>
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
                                    <td><?= $resultado['fecha_registro'] ?></td>
                                    <td>
                                        <a href="index.php?romanza=lista-productos&&producto=<?= $resultado['id_producto'] ?>" class="direcciones__icono direcciones__icono-borrar" title="Eliminar"><i class="fa-solid fa-circle-xmark"></i></a>
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

<script src="vistas/../publico/js/estatus.js"></script>