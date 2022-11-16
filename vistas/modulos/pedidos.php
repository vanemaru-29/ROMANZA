<?php
    require_once ('vistas/../controladores/autoCarga.php');

    $productos = new Productos();
    $datos = $productos->activosPdt();

    $categorias = new Categorias();
    $cat = $categorias->listaCat();
?>

<section class="pedidos py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Solicitar Pedido </h1>

    <!-- sidebar -->
    <!-- <div class="pedidos__menu">
        <a href="#" class="pedidos__menu-enlace"> Bebidas </a>
        <a href="#" class="pedidos__menu-enlace"> Carnes </a>
        <a href="#" class="pedidos__menu-enlace"> Ensaladas </a>
        <a href="#" class="pedidos__menu-enlace"> Pastas </a>
        <a href="#" class="pedidos__menu-enlace"> Pizzas </a>
        <a href="#" class="pedidos__menu-enlace"> Postres </a>
        <a href="#" class="pedidos__menu-enlace"> Sopas </a>
    </div> -->

    <div class="container mb-5">
        <select class="form-select" aria-label="Default select example">
            <option selected value="0">Seleccione una categoria</option>
            <?php
                while ($resultado = mysqli_fetch_array($cat)) {
                    ?>
                        <option value="<?= $resultado['id_categoria'] ?>"><?= $resultado['nombre'] ?></option>
                    <?php
                }
            ?>
        </select>
    </div>

    <!-- cards -->
    <section class="container pedidos__cartas">
        <?php
            while ($resultado = mysqli_fetch_array($datos)) {
                ?>
                    <div class="pedidos__producto">
                        <div class="pedidos__producto-img">
                            <img src="vistas/../publico/activos/pedidos/<?= $resultado['imagen'] ?>" alt="Producto ROMANZA">
                        </div>
                        <div class="pedidos__card-contenido shadow px-2">
                            <button type="button" class="btn btn-danger pedidos__card-detalles" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Detalles </button>
                            <p class="pedidos__card-nombre"> <?= $resultado['nombre'] ?> </p>
                            <span class="pedidos__card-precio"> $ <?= $resultado['precio'] ?> </span>
                        </div>
                    </div>
                <?php
            }
        ?>
    </section>
</section>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"> Jugo de Papaya </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 pedidos__imagen-producto">
                            <img src="vistas/../publico/activos/pedidos/bebida1.webp" alt="Producto ROMANZA">
                        </div>

                        <div class="col-sm-12 col-md-6 pedidos__descripcion-producto">
                            <p><span class="fw-bold">Descirpción: </span> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure, velit!</p>
                        </div>
                    </div>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="number" name="amount" id="" class="pedidos__cantidad-producto"></td>
                                <td>€ 02,00</td>
                                <td>€ 00,00</td>
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