<?php
    clearstatcache();

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
                            <button type="button" class="btn btn-danger pedidos__card-detalles" data-bs-toggle="modal" data-bs-target="#producto<?= $resultado['id_producto'] ?>"> Detalles </button>
                            <p class="pedidos__card-nombre"> <?= $resultado['nombre'] ?> </p>
                            <span class="pedidos__card-precio"> $ <?= $resultado['precio'] ?> </span>
                        </div>
                    </div>

                    <!-- Modal detalles -->
                    <?php
                        include ('modal/modal-detalles.php');
                    ?>
                <?php
            }
        ?>
    </section>
</section>