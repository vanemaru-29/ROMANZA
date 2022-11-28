<?php
    require_once ('vistas/../controladores/autoCarga.php');
?>

<section class="w-100 vh-100 py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Reportes </h1>

    <!-- navbar -->
    <div class="mi-cuenta__menu mb-5">
        <a href="index.php?romanza=administrar" class="mi-cuenta-enlace"> Precios </a>
        <a href="index.php?romanza=reportes" class="mi-cuenta-enlace"> Reportes </a>
    </div>

    <article class="container row reportes__contenedor">    
        <div class="col-sm-12 col-md-6 my-4">
            <a class="btn btn-danger reportes__btn" href="vistas/reportes/clientes-registrados.php" target="_blank"> Clientes Registrados </a>
        </div>
        <div class="col-sm-12 col-md-6 my-4">
            <a class="btn btn-danger reportes__btn" href="vistas/reportes/productos-registrados.php" target="_blank"> Productos Registrados </a>
        </div>
        <div class="col-sm-12 col-md-6 my-4">
            <a class="btn btn-danger reportes__btn" href="vistas/reportes/pedidos-registrados.php" target="_blank"> Pedidos Generados </a>
        </div>
        <div class="col-sm-12 col-md-6 my-4">
            <a class="btn btn-danger reportes__btn"> Facturas Generadas </a>
        </div>
        <div class="col-sm-12 col-md-6 my-4">
            <a class="btn btn-danger reportes__btn" href="vistas/reportes/opiniones-registradas.php" target="_blank"> Opiniones Registradas </a>
        </div>
        <div class="col-sm-12 col-md-6 my-4">
            <a class="btn btn-danger reportes__btn" href="vistas/reportes/categorias-registradas.php" target="_blank"> Categorias Registradas </a>
        </div>
    </article>
</section>