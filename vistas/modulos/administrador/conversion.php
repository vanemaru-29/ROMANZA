<?php
require_once('vistas/../controladores/autoCarga.php');
?>

<section class="py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Conversion de moneda </h1>

    <!-- navbar -->
    <div class="mi-cuenta__menu mb-5">
        <a href="index.php?romanza=lista-metodo-pago" class="mi-cuenta-enlace"> Lista de metodos de pago </a>
        <a href="index.php?romanza=registrar-producto" class="mi-cuenta-enlace"> Registrar metodo de pago </a>
        <a href="index.php?romanza=conversion" class="mi-cuenta-enlace"> Conversion </a>
    </div>

    <!-- registrar producto -->
    <section class="container bg-light carrito__tabla p-5">
        <img src="vistas/../publico/activos/iconos/icono-oscuro.svg" class="icono__romanza" width="" alt="Logo ROMANZA">
        <h2 class="fw-bold text-center pb-5"> Tasa del dolar en Bolivares </h2>

        <form action="#" method="POST" class="formulario" id="metodo">

            <div class="formulario__grupo" id="grupo__descripcion">
                <h4>Un dolar equivaloe a :</h4>
            </div>

            <div class="formulario__grupo" id="grupo__descripcion">
                <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" placeholder="Precio en bolivares" name="bs_equivalencia" id="descripcion">
                    <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                </div>
                <!--             <p class="formulario__input-error m-2">Este campo sólo admite letras y espacios, debe ser mayor a 15 caracteres.</p> -->
            </div>


            <div class="d-grid my-2 mx-auto formulario__grupo formulario__btn-centro editarInfo__actualizar">
                <button type="submit" name="registrar-tasa" class="formulario__btn btn btn-danger"> REGISTRAR </button>
            </div>

            <?php
            if (empty($_POST['registrar-tasa'])) {
                if (isset($_POST['bs_equivalencia'])) {
                    if (strlen($_POST['bs_equivalencia'])) {
                        $bolivares = $_POST['bs_equivalencia'];
            
                        $nuevoMetodo = new Conversion();
                        $nuevoMetodo->registroConversion($bolivares);
                    } else {
                        $camposVacios = new ErrFormularios();
                        $camposVacios->camposVacios();
                    }
                }
            }
            ?>
        </form>
    </section>
</section>

<!-- <script src="vistas/../js/validacion-producto.js"></script> -->