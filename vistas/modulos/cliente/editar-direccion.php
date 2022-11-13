<section class="py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Editar Dirección </h1>

    <!-- navbar -->
    <div class="mi-cuenta__menu mb-5">
        <a href="index.php?romanza=mi-cuenta" class="mi-cuenta-enlace"> Mi Cuenta </a>
        <a href="index.php?romanza=mis-direcciones" class="mi-cuenta-enlace"> Direcciones </a>
        <a href="index.php?romanza=mis-ordenes" class="mi-cuenta-enlace"> Pedidos Recientes </a>
    </div>

    <!-- editar dirección -->
    <section class="container mi-cuenta">
        <img src="vistas/../publico/activos/iconos/icono-oscuro.svg" class="icono__romanza" width="" alt="Logo ROMANZA">
        <h2 class="fw-bold text-center pb-5"> Editar </h2>

        <!-- formulario -->
        <form action="#" method="POST" class="formulario" id="direccion">                    
            <!-- Grupo: Dirección -->
            <div class="formulario__grupo editarInfo__tlfn" id="grupo__direccion">
                    <label for="direccion" class="form-label login__label"> Dirección </label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" placeholder=". . ." name="direccion" id="direccion" value="Cabudare la Piedad, Barquisimeto. United Kingdom, Lara">
                        <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                    </div>
                    <p class="formulario__input-error m-2">Este campo contiene caracteres no admitidos, el texto debe ser mayor a 20 caracteres.</p>
                </div>
                
                <!-- Grupo: Referencia -->
                <div class="formulario__grupo editarInfo__tlfn" id="grupo__referencia">
                    <label for="referencia" class="form-label login__label"> Referencia </label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" placeholder=". . ." name="referencia" id="referencia" value="Ninguna referencia añadida">
                        <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                    </div>
                    <p class="formulario__input-error m-2">Este campo contiene caracteres no admitidos.</p>
                </div>

                <div class="d-grid m-auto formulario__grupo formulario__btn-centro editarInfo__actualizar">
                    <button type="submit" name="editar-direccion" class="formulario__btn btn btn-danger"> ACTUALIZAR </button>
                </div>
        </form>
    </section>
</section>

<script src="vistas/../js/validacion-direccion.js"></script>