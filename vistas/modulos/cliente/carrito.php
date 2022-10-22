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
                <h1 class="modal-title fs-5" id="staticBackdropLabel"> Jugos Naturales </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="" method="POST">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Total</th>
                                <th scope="col text-center"><img src="vistas/../publico/activos/iconos/carrito-oscuro.svg" alt="Carrito" class="pedidos__carrito-img"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jugo de Manzana</td>
                                <td><input type="number" name="amount" id="" class="pedidos__cantidad-producto"></td>
                                <td>€ 02,00</td>
                                <td>€ 00,00</td>
                                <td>
                                    <div class="form-check mx-2">
                                        <input class="form-check-input" type="checkbox" name="add_cart" id="">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Jugo de Pera</td>
                                <td><input type="number" name="amount" id="" class="pedidos__cantidad-producto"></td>
                                <td>€ 02,00</td>
                                <td>€ 00,00</td>
                                <td>
                                    <div class="form-check mx-2">
                                        <input class="form-check-input" type="checkbox" name="add_cart" id="">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Jugo de Mango</td>
                                <td><input type="number" name="amount" id="" class="pedidos__cantidad-producto"></td>
                                <td>€ 02,00</td>
                                <td>€ 00,00</td>
                                <td>
                                    <div class="form-check mx-2">
                                        <input class="form-check-input" type="checkbox" name="add_cart" id="">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal"> Cancelar </button>
                <button type="button" class="btn btn-warning"> Añadir al Carrito </button>
            </div>
        </div>
    </div>
</div>