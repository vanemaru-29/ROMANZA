<section class="pedidos py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Mi cuenta </h1>

    <!-- sidebar -->
    <div class="pedidos__menu">
        <a href="index.php?romanza=mi-cuenta" class="pedidos__menu-enlace"> Mi cuenta </a>
        <a href="index.php?romanza=mis-ordenes" class="pedidos__menu-enlace"> Pedidos recientes </a>
        <a href="index.php?romanza=mis-direcciones" class="pedidos__menu-enlace"> Direcciones </a>
    </div>

    <!-- cards -->
    <section class="login__cont container bg-white shadow">
        <div class="row">
            <div class="col p-5 ">
                <div class="text-end">
                    <img src="vistas/../publico/activos/iconos/icono-oscuro.svg" width="" alt="Logo ROMANZA">
                    <p class="text-center">22/10/2022</p>
                    <h4 class="fw-bold text-center pb-3">Orden #1</h4>
                    <h3 class="fw-bold text-center pb-3">Recibida</h3>
                    <p class="text-center">Su pedido ha sido recibido.</p>
                    <p class="text-center">Su pedido ha sido recibido y estará con usted en breve.</p>
                    <div class="container-fluid h-100 mb-3">
                        <div class="row w-100 align-items-center">
                            <div class="col text-center">
                                <button class="btn btn-danger regular-button">
                                <a href="index.php?romanza=carrito" class=" nav-link header__salir mx-3"> <span class="header__info-cuenta">Orden</span></a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="login__cont container mt-2"> 
        <div class="row">
            <div class="col-6 p-5 bg-white shadow mr-4">
                <div class="text-end">
                    <img src="vistas/../publico/activos/iconos/icono-oscuro.svg" width="" alt="Logo ROMANZA">
                    <p class="text-center">22/10/2022</p>
                    <h4 class="fw-bold text-center pb-3">Orden #1</h4>
                    <h3 class="fw-bold text-center pb-3">Recibida</h3>
                    <p class="text-center">Su pedido ha sido recibido.</p>
                    <p class="text-center">Su pedido ha sido recibido y estará con usted en breve.</p>
                    <div class="container-fluid h-100 mb-3">
                        <div class="row w-100 align-items-center">
                            <div class="col text-center">
                                <button class="btn btn-danger regular-button">
                                <a href="index.php?romanza=carrito" class=" nav-link header__salir mx-3"> <span class="header__info-cuenta">Orden</span></a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 p-5 bg-white shadow ml-4">
                <div class="text-end">
                    <img src="vistas/../publico/activos/iconos/icono-oscuro.svg" width="" alt="Logo ROMANZA">
                    <p class="text-center">22/10/2022</p>
                    <h4 class="fw-bold text-center pb-3">Orden #1</h4>
                    <h3 class="fw-bold text-center pb-3">Recibida</h3>
                    <p class="text-center">Su pedido ha sido recibido.</p>
                    <p class="text-center">Su pedido ha sido recibido y estará con usted en breve.</p>
                    <div class="container-fluid h-100 mb-3">
                        <div class="row w-100 align-items-center">
                            <div class="col text-center">
                                <button class="btn btn-danger regular-button">
                                <a href="index.php?romanza=carrito" class=" nav-link header__salir mx-3"> <span class="header__info-cuenta">Orden</span></a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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