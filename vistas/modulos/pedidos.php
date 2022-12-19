<?php
    clearstatcache();

    $productos = new Productos();
    $datos = $productos->activosPdt();

    $categorias = new Categorias();
    $cat = $categorias->listaCat();

    if (isset($_SESSION['nombre_usuario'])) {
        $id_rol = $_SESSION['id_rol'];
    } else {
        $id_rol = "";
    }
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
        <table class="pedidos__cartas-cont" id="table_data">
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

                                        <form id="formulario" name="formulario" method="POST" action="vistas/../index.php?romanza=carta" >
                                            <?php
                                                $categoria = new Categorias();
                                                $cat = $categoria->obtenerCat($resultado['id_categoria']);
        
                                                while ($catDatos = $cat->fetch_object()) {
                                                    ?>
                                                        <p hidden><?= $catDatos->nombre ?></p>
                                                        <input type="hidden" name="categoria" id="categoria" value="<?= $catDatos->nombre ?>"/>
                                                    <?php
                                                }
                                            ?>

                                            <div class="pedidos__producto-img">
                                                <img src="vistas/../publico/activos/pedidos/<?= $resultado['imagen'] ?>" alt="Producto ROMANZA">
                                            </div>
                                            <div class="pedidos__card-contenido shadow px-2">
                                        
                                                <?php if ($id_rol == 3) { ?>
                                                    <button type="submit" class="btn btn-danger pedidos__card-detalles"> <i class="fa-solid fa-circle-plus"></i> </button>
                                                <?php } ?>
                                                
                                                <p class="pedidos__card-nombre"><?= $resultado['nombre'] ?></p>
                                                <span class="pedidos__card-descripcion"> <?= $resultado['descripcion'] ?> </span>
                                                <p class="pedidos__card-precio mb-3">$ <?= $resultado['precio'] ?></p>
                                                
                                                <input type="hidden" name="id" id="id" value="<?= $resultado['id_producto'] ?>"/>
                                                <input type="hidden" name="nombre" id="nombre" value="<?= $resultado['nombre'] ?>"/>
                                                <input type="hidden" name="precio" id="precio" value="<?= $resultado['precio'] ?>"/> 
                                                <input type="hidden" name="cantidad" id="cantidad" value="1"/>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </article>
</section>

<!-- <script src="vistas/../js/dataTables.js"></script> -->
<script src="vistas/../js/buscar-producto.js"></script>