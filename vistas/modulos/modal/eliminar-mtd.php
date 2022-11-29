<!-- Modal -->
<div class="modal fade" id="eliminarMtd-<?= $resultado['id_metodo_pago'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    </section>
                    <input type="hidden" name="metodo_pago" value="<?= $resultado['id_metodo_pago'] ?>">
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>

                <?php
                    // eliminar metodo de pago
                    if (!empty($_POST['metodo_pago'])) {
                        $eliminar = new Metodos();
                        $eliminar->eliminarM($_POST['metodo_pago']);
                    }
                ?>
            </form>
        </div>
    </div>
</div>