<section class="py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Detalles </h1>

    <!-- cards -->
    <section class="container mi-cuenta">
        <a href="#" class="btn btn-warning orden__factura my-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <span class="header__info-cuenta">Ver Productos</span></a>
        <h2 class="fw-bold text-center">Orden #1</h2>
        <p class="text-center m-0">22/10/2022</p>
        <h2 class="fw-bold text-center display-5 m-3 orden__estado">Enviado</h3>
        <p class="text-center">El pedido ha sido enviado para su preparación</p>

        <a href="#" class="btn btn-danger orden__btn mt-4 mb-2" onclick="pedidoProceso(1)"> <span class="header__info-cuenta">En Proceso</span></a>
        <!-- <a href="#" class="btn btn-danger orden__btn mt-4 mb-2" onclick="pedidoFinalizado(1)"> <span class="header__info-cuenta">Finalizar</span></a> -->
    </section>
</section>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"> Productos del Pedido </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="" method="POST">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jugo de Papaya <span class="carrito__categoria-producto">Bebidas</span></td>
                                <td>2</td>
                                <td>$ 00,00</td>
                            </tr>
                            <tr>
                                <td>Pollo y Tocino <span class="carrito__categoria-producto">Pizza</span></td>
                                <td>1</td>
                                <td>$ 00,00</td>
                            </tr>
                            <tr>
                                <td>Tarta de Queso <span class="carrito__categoria-producto">Postres</span></td>
                                <td>1</td>
                                <td>$ 00,00</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                <th></th>
                                <td>$ 16,00</td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal"> Cerrar </button>
            </div>
        </div>
    </div>
</div>