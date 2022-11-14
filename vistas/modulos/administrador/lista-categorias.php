<?php
    require_once ('vistas/../controladores/autoCarga.php');

    $categorias = new Categorias();
    $datos = $categorias->listaCat();
?>

<section class="w-100 vh-100 py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Lista de Categorias </h1>

    <!-- navbar -->
    <div class="mi-cuenta__menu mb-5">
        <a href="index.php?romanza=lista-categorias" class="mi-cuenta-enlace"> Lista de Categorias </a>
        <a href="index.php?romanza=registrar-categoria" class="mi-cuenta-enlace"> Registrar Categoria </a>
    </div>

    <!-- pedidos -->
    <section class="container mi-cuenta">
        <img src="vistas/../publico/activos/iconos/icono-oscuro.svg" class="icono__romanza" width="" alt="Logo ROMANZA">
        <h2 class="fw-bold text-center pb-5">Categorias Registradas</h2>

        <?php
            if (!empty($_GET['categoria'])) {
                $eliminar = new Categorias();
                $eliminar->eliminarCat($_GET['categoria']);
            }
        ?>

        <article>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha de Registro</th>
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
                                    <td><?= $resultado['fecha_registro'] ?></td>
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