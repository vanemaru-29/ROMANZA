<div class="modal fade" id="producto<?= $resultado['id_producto'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="" method="POST" id="cantidad-producto">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"> <?= $resultado['nombre'] ?> </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 pedidos__imagen-producto">
                            <img src="vistas/../publico/activos/pedidos/<?= $resultado['imagen'] ?>" alt="Producto ROMANZA">
                        </div>

                        <div class="col-sm-12 col-md-6 pedidos__descripcion-producto">
                            <p><span class="fw-bold">Descirpción: </span> <?= $resultado['descripcion'] ?> </p>
                        </div>
                    </div>

                    <section class="pedidos__detalles">
                        <article class="pedidos__detalles-head">
                            <p scope="col" class="text-center pedidos__detalles-h-p">Cantidad</p>
                            <p scope="col" class="text-center pedidos__detalles-h-p">Precio</p>
                            <p scope="col" class="text-center pedidos__detalles-h-p">Total</p>
                        </article>
                        <article class="pedidos__detalles-body">
                            <div class="text-center pedidos__detalles-b-d">
                                <input type="text" class="pedidos__cantidad-producto" name="cantidad" id="cantidad<?= $resultado['id_producto'] ?>" onkeyup="calcular(<?= $resultado['id_producto'] ?>)">
                            </div>
                            <div class="text-center pedidos__detalles-b-d">
                                $ <input type="text" class="pedidos__cantidad-producto" name="precio" id="precio<?= $resultado['id_producto'] ?>" value="<?= $resultado['precio'] ?>" disabled>
                            </div>
                            <div class="text-center pedidos__detalles-b-d">
                                $ <input type="text" class="pedidos__cantidad-producto" name="total" id="total<?= $resultado['id_producto'] ?>" disabled>
                            </div>
                        </article>
                    </section>
                </div>
                                                
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal"> Cancelar </button>
                    <button type="button" class="btn btn-warning"> Añadir al Carrito </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="vistas/../js/cantidad-producto.js"></script>