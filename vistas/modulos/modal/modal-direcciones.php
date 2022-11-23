<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"> Administrar Direcciones </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                    // eliminar categoria
                    if (!empty($_GET['dir'])) {
                        $eliminar = new Direcciones();
                        $eliminar->eliminarDir($_GET['dir']);
                    }
                ?>

                <form action="" method="POST">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Dirección</th>
                                <th scope="col">Referencia</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // $categorias = new Fechas();
                                // $datosCat = $categorias->fechasRango($tabla, $desde, $hasta);
                                // $totalRegistros = @mysqli_num_rows($datosCat);

                                $usuario = new Usuarios();
                                $datos = $usuario -> datosUser($nombre_usuario);
                                while ($datos_usuario = mysqli_fetch_array($datos)) {
                                    $id_usuario = $datos_usuario['id_usuario'];
                                    $direcciones = new Direcciones();
                                    $cant_dir = $direcciones->misDir($id_usuario);
                                }

                                $totalRegistros = @mysqli_num_rows($cant_dir);
                                if ($totalRegistros == 0) {
                                    ?>
                                        <tr>
                                            <td colspan="3" class="text-center">No hay direcciones registradas</td>
                                        </tr>
                                    <?php
                                } else {
                                    while ($datos_dir = mysqli_fetch_array($cant_dir)) {
                                        ?>
                                            <tr>
                                                <td><?= $datos_dir['direccion'] ?></td>
                                                <td><?= $datos_dir['referencia'] ?></td>
                                                <td>
                                                    <a href="index.php?romanza=mis-direcciones&&dir=<?= $datos_dir['id_direccion'] ?>" class="direcciones__icono direcciones__icono-borrar"><i class="fa-solid fa-circle-xmark"></i></a>
                                                    <a href="index.php?romanza=editar-direccion&&dir=<?= $datos_dir['id_direccion'] ?>" class="direcciones__icono direcciones__icono-editar"><i class="fa-solid fa-square-pen carrito__icono-btn"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>