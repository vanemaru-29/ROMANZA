<section class="w-100 vh-100 py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Mi Carrito </h1>

    <section class="container bg-light carrito__tabla">
        <table class="table table-hover mb-4">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><a href="#" class="carrito__icono-quitar"><i class="fa-solid fa-circle-xmark"></i></a></th>
                    <td>Jugo de Manzana <span class="carrito__categoria-producto">Jugos Naturales</span></td>
                    <td>2</td>
                    <td>€ 04,00</td>
                </tr>
                <tr>
                    <th scope="row"><a href="#" class="carrito__icono-quitar"><i class="fa-solid fa-circle-xmark"></i></a></th>
                    <td>Pollo y Tocino <span class="carrito__categoria-producto">Pizza</span></td>
                    <td>1</td>
                    <td>€ 09,00</td>
                </tr>
                <tr>
                    <th scope="row"><a href="#" class="carrito__icono-quitar"><i class="fa-solid fa-circle-xmark"></i></a></th>
                    <td>Tarta de Queso <span class="carrito__categoria-producto">Postres</span></td>
                    <td>1</td>
                    <td>€ 03,00</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">
                        <div class="carrito__btns">
                            <a href="vistas/../index.php?romanza=pedidos" class="btn btn-warning mx-2"><i class="fa-solid fa-circle-plus carrito__icono-btn"></i> Añadir al Carrito </a>
                            <button type="button" class="btn btn-danger mx-2"><i class="fa-solid fa-circle-minus carrito__icono-btn"></i> Vaciar Carrito </button>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </section>

    <section class="container bg-light carrito__tabla carrito__compra-tabla pt-2">
        <table class="table">
            <h4> Total del Carrito </h3>
                <thead>
                    <tr>
                        <th scope="col">Productos</th>
                        <th scope="col">Precios</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row"> Jugo de Manzana <span class="carrito__categoria-producto">Jugos Naturales</span></td>
                        <td scope="row"> € 04,00 </td>
                    </tr>
                    <tr>
                        <td scope="row"> Pollo y Tocino <span class="carrito__categoria-producto">Pizza</span></td>
                        <td scope="row"> € 09,00 </td>
                    </tr>
                    <tr>
                        <td scope="row"> Tarta de Queso <span class="carrito__categoria-producto">Postres</span></td>
                        <td scope="row"> € 03,00 </td>
                    </tr>
                </tbody>

                <tfoot>
                    <tr>
                        <th>Total</th>
                        <td>€ 16,00</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="button" class="btn btn-warning carrito__btn-finalizar" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-circle-check carrito__icono-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i> Finalizar Compra </button>
                        </td>
                    </tr>
                </tfoot>
        </table>
    </section>
</section>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"> Pago </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="" method="POST">
                    <div class="row mb-6">
                        <div class="col mb-6">
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre">
                        </div>
                        <div class="col mb-6">
                            <input type="number" class="form-control" placeholder="Monto" name="monto" id="monto">
                        </div>
                    </div>
                    <div class="row mt-6">
                        <div class="col mb-6">
                            <input type="text" class="form-control" placeholder="Referencia" name="referencia" id="referencia">
                        </div>
                        <div class="col mb-6">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Metodo de pago</option>
                                <option value="1">Pago al delivery</option>
                                <option value="2">Cuenta Banesco</option>
                                <option value="3">Cuenta Provincial</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal"> Cancelar </button>
                <button type="button" class="btn btn-warning"> Pagar </button>
            </div>
        </div>
    </div>
</div>