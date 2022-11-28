<!-- Modal -->
<div class="modal fade" id="eliminarCat-<?= $resultado['id_categoria'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Registro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <section class="text-center">
                        <div class="my-2"><i class="fa-solid fa-triangle-exclamation color-incorrecto-icono"></i></div>
                        <h4>¿Desea eliminar <?= $resultado['nombre'] ?>?</h4>
                        <p class="color-mensaje">¡Al eliminar la categoría se eliminaran todos sus productos!</p>
                    </section>
                    <input type="hidden" name="categoria" value="<?= $resultado['id_categoria'] ?>">
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>

                <?php
                    // eliminar categoria
                    if (!empty($_POST['categoria'])) {
                        $eliminar = new Categorias();
                        $eliminar->eliminarCat($_POST['categoria']);
                    }
                ?>
            </form>
        </div>
    </div>
</div>