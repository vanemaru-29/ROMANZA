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
                    <td>Jugo de Papaya <span class="carrito__categoria-producto">Bebidas</span></td>
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
                        <td scope="row"> Jugo de Manzana <span class="carrito__categoria-producto">Bebidas</span></td>
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
                        <div class="col-md-12 my-3">
                            <label for="direccion" class="form-label login__label"> Dirección </label>
                            <select class="form-select" aria-label="Default select example" name="direccion" id="direccion">
                                <option selected>Seleccione una dirección</option>
                                <option value="1">Opción 1</option>
                                <option value="2">Opción 2</option>
                                <option value="3">Opción 3</option>
                                <option value="4">Opción 4</option>
                            </select>
                        </div>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="button" class="btn btn-warning carrito__btn-finalizar" onclick="solicitarPedido(1)"><i class="fa-solid fa-circle-check carrito__icono-btn"></i> Solicitar Pedido </button>
                        </td>
                    </tr>
                </tfoot>
        </table>
    </section>
</section>