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

    <div class="container mb-5">
        <form class="pedidos__formulario">
            <select class="form-select pedidos__formulario-campo" aria-label="Default select example" id="buscar-cat" onchange="buscarCat()">
                <option selected value="0">Todas las categorias</option>
                <?php
                    while ($resultado = mysqli_fetch_array($cat)) {
                        ?>
                            <option value="<?= $resultado['nombre'] ?>"><?= $resultado['nombre'] ?></option>
                        <?php
                    }
                ?>
            </select>

			<div class="pedidos__formulario-campo pedidos__formulario-campo-s">
                <input type="text" class="form-control" id="buscar-pdt" placeholder="Buscar producto" onkeyup="buscarPdt()">
                <i class="fa-solid fa-magnifying-glass pedidos__formulario-campo-i"></i>
            </div>
		</form>
    </div>

    <article class="container">
        <table class="pedidos__cartas-cont">
            <thead>
                <tr>
                    <th></th>
                </tr>
            </thead>
            <tbody class="container pedidos__cartas" id="the_tabla_body">
                <?php
                    while ($resultado = mysqli_fetch_array($datos)) {
                        ?>
                            <tr>
                                <td>
                                    <div class="pedidos__producto categoria">

                                        <?php
                                            $categoria = new Categorias();
                                            $cat = $categoria->obtenerCat($resultado['id_categoria']);
    
                                            while ($catDatos = $cat->fetch_object()) {
                                                ?>
                                                    <p hidden><?= $catDatos->nombre ?></p>
                                                <?php
                                            }
                                        ?>

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
                                </td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </article>
</section>

<script src="vistas/../js/buscar-producto.js"></script>