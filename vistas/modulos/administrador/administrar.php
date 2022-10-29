<section class="w-100 vh-100 py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Administración </h1>

    <!-- navbar -->
    <div class="mi-cuenta__menu mb-5">
        <a href="index.php?romanza=administrar" class="mi-cuenta-enlace"> Precios </a>
        <a href="index.php?romanza=reportes" class="mi-cuenta-enlace"> Reportes </a>
    </div>

    <!-- precios -->
    <section class="container mi-cuenta">
        <img src="vistas/../publico/activos/iconos/icono-oscuro.svg" class="icono__romanza" width="" alt="Logo ROMANZA">
        <h2 class="fw-bold text-center pb-4"> Administrar Precios </h2>

        <!-- formulario -->
        <form action="#" method="POST" class="formulario" id="conversion">                    
            <!-- Grupo: Dolar -->
            <div class="formulario__grupo editarInfo__tlfn" id="grupo__dolares">
                <label for="dolares" class="form-label login__label"> Referencia en USD </label>
                <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" placeholder=". . ." name="dolares" id="dolares" value="01,00" disabled>
                </div>
            </div>
                
            <!-- Grupo: Equivalencia -->
            <div class="formulario__grupo editarInfo__tlfn" id="grupo__bolivares">
                <label for="bolivares" class="form-label login__label"> Equivalencia en Bs </label>
                <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" placeholder=". . ." name="bolivares" id="bolivares" value="08,59">
                    <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                </div>
                <p class="formulario__input-error m-2">Este campo sólo admite números, debe ingresarse un monto válido.</p>
            </div>

            <div class="d-grid m-auto formulario__grupo formulario__btn-centro editarInfo__actualizar">
                <button type="submit" name="equivalencia-bs" class="formulario__btn btn btn-danger"> ACTUALIZAR </button>
            </div>
        </form>
    </section>
</section>

<script src="vistas/../js/validacion-conversion.js"></script>