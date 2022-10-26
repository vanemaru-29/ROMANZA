<section class="pedidos py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Mi cuenta </h1>

    <!-- sidebar -->
    <div class="pedidos__menu">
        <a href="index.php?romanza=mi-cuenta" class="pedidos__menu-enlace"> Mi cuenta </a>
        <a href="#" class="pedidos__menu-enlace"> Pedidos recientes </a>
        <a href="index.php?romanza=mis-direcciones" class="pedidos__menu-enlace"> Direcciones </a>
    </div>

    <!-- cards -->
    <section class="login__cont container bg-white shadow">
        <div class="row">
            <div class="col p-5 ">
                <div class="text-end">
                    <img src="vistas/../publico/activos/iconos/icono-oscuro.svg" width="" alt="Logo ROMANZA">
                    <h2 class="fw-bold text-center pb-5">Mis pedidos recientes</h2>
                    <!-- login -->
                    <form action="#" method="POST">
                        <div class="row">
                            <div class="col mb-3">
                                <h4 class="text-center">Ubicacion</h4>
                                <p class="text-center">Pueblo Nuevo</p>
                            </div>
                            <div class="col mb-3">
                                <h4 class="text-center">Estado</h4>
                                <p class="text-center">Recibido</p>
                            </div>
                            <div class="col mb-3">
                                <h4 class="text-center">Fecha</h4>
                                <p class="text-center">22/10/2022</p>
                            </div>
                            <div class="col mb-3">
                                <h4 class="text-center">Total del pedido</h4>
                                <p class="text-center">£32.96 (6 artículos en total)</p>
                            </div>
                            <div class="col mb-3">
                             <a href="index.php?romanza=orden" class="header__btn btn btn-warning nav-link header__salir mx-3"> <span class="header__info-cuenta">Ver</span></a> 
                            </div>

                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <h4 class="text-center">Ubicacion</h4>
                                <p class="text-center">Pueblo Nuevo</p>
                            </div>
                            <div class="col mb-3">
                                <h4 class="text-center">Estado</h4>
                                <p class="text-center">Recibido</p>
                            </div>
                            <div class="col mb-3">
                                <h4 class="text-center">Fecha</h4>
                                <p class="text-center">22/10/2022</p>
                            </div>
                            <div class="col mb-3">
                                <h4 class="text-center">Total del pedido</h4>
                                <p class="text-center">£32.96 (6 artículos en total)</p>
                            </div>
                            <div class="col mb-3">
                             <a href="index.php?romanza=orden"  class="header__btn btn btn-warning nav-link header__salir mx-3"> <span class="header__info-cuenta">Ver</span></a> 
                            </div>

                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <h4 class="text-center">Ubicacion</h4>
                                <p class="text-center">Pueblo Nuevo</p>
                            </div>
                            <div class="col mb-3">
                                <h4 class="text-center">Estado</h4>
                                <p class="text-center">Recibido</p>
                            </div>
                            <div class="col mb-3">
                                <h4 class="text-center">Fecha</h4>
                                <p class="text-center">22/10/2022</p>
                            </div>
                            <div class="col mb-3">
                                <h4 class="text-center">Total del pedido</h4>
                                <p class="text-center">£32.96 (6 artículos en total)</p>
                            </div>
                            <div class="col mb-3">
                             <a href="index.php?romanza=orden" class="header__btn btn btn-warning nav-link header__salir mx-3"> <span class="header__info-cuenta">Ver</span></a> 
                            </div>

                        </div>
                    </form>
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