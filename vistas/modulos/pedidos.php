<section class="pedidos py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Solicitar Pedido </h1>

    <!-- sidebar -->
    <div class="pedidos__menu">
        <a href="#" class="pedidos__menu-enlace"> Bebidas </a>
        <a href="#" class="pedidos__menu-enlace"> Carnes </a>
        <a href="#" class="pedidos__menu-enlace"> Ensaladas </a>
        <a href="#" class="pedidos__menu-enlace"> Pastas </a>
        <a href="#" class="pedidos__menu-enlace"> Pizzas </a>
        <a href="#" class="pedidos__menu-enlace"> Postres </a>
        <a href="#" class="pedidos__menu-enlace"> Sopas </a>
    </div>

    <!-- cards -->
    <section class="container pedidos__cartas">
        <div class="pedidos__producto">
            <div class="pedidos__producto-img">
                <img src="vistas/../publico/activos/pedidos/bebida1.webp" alt="Producto ROMANZA">
            </div>
            <div class="pedidos__card-contenido shadow px-2">
                <button type="button" class="btn btn-danger pedidos__card-detalles" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Detalles </button>
                <p class="pedidos__card-nombre"> Jugos Naturales </p>
                <span class="pedidos__card-precio"> € 02,00 </span>
            </div>
        </div>

        <div class="pedidos__producto">
            <div class="pedidos__producto-img">
                <img src="vistas/../publico/activos/pedidos/bebida2.webp" alt="Producto ROMANZA">
            </div>
            <div class="pedidos__card-contenido shadow px-2">
                <a href="#" class="btn btn-danger pedidos__card-detalles"> Detalles </a>
                <p class="pedidos__card-nombre"> Batidos Naturales </p>
                <span class="pedidos__card-precio"> € 04,50 </span>
            </div>
        </div>

        <div class="pedidos__producto">
            <div class="pedidos__producto-img">
                <img src="vistas/../publico/activos/pedidos/bebida3.webp" alt="Producto ROMANZA">
            </div>
            <div class="pedidos__card-contenido shadow px-2">
                <a href="#" class="btn btn-danger pedidos__card-detalles"> Detalles </a>
                <p class="pedidos__card-nombre"> Tés Naturales </p>
                <span class="pedidos__card-precio"> € 06,00 </span>
            </div>
        </div>

        <div class="pedidos__producto">
            <div class="pedidos__producto-img">
                <img src="vistas/../publico/activos/pedidos/bebida4.webp" alt="Producto ROMANZA">
            </div>
            <div class="pedidos__card-contenido shadow px-2">
                <a href="#" class="btn btn-danger pedidos__card-detalles"> Detalles </a>
                <p class="pedidos__card-nombre"> Sorbetes </p>
                <span class="pedidos__card-precio"> € 08,98 </span>
            </div>
        </div>

        <div class="pedidos__producto">
            <div class="pedidos__producto-img">
                <img src="vistas/../publico/activos/pedidos/bebida5.webp" alt="Producto ROMANZA">
            </div>
            <div class="pedidos__card-contenido shadow px-2">
                <a href="#" class="btn btn-danger pedidos__card-detalles"> Detalles </a>
                <p class="pedidos__card-nombre"> Cócteles </p>
                <span class="pedidos__card-precio"> € 10,50 </span>
            </div>
        </div>
        
        <div class="pedidos__producto">
            <div class="pedidos__producto-img">
                <img src="vistas/../publico/activos/pedidos/bebida6.webp" alt="Producto ROMANZA">
            </div>
            <div class="pedidos__card-contenido shadow px-2">
                <a href="#" class="btn btn-danger pedidos__card-detalles"> Detalles </a>
                <p class="pedidos__card-nombre"> Té de Burbujas </p>
                <span class="pedidos__card-precio"> € 06,00 </span>
            </div>
        </div>

        <div class="pedidos__producto">
            <div class="pedidos__producto-img">
                <img src="vistas/../publico/activos/pedidos/bebida7.webp" alt="Producto ROMANZA">
            </div>
            <div class="pedidos__card-contenido shadow px-2">
                <a class="btn btn-danger pedidos__card-detalles"> Detalles </a>
                <p class="pedidos__card-nombre"> Refrescos </p>
                <span class="pedidos__card-precio"> € 02,00 </span>
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