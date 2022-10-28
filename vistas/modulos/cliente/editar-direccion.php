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
        <form action="#" method="POST" class="row">                    
            <div class="col-sm-12 col-md-6">
                <label for="telefono" class="form-label login__label"> Dirección </label>
                <input type="text" class="form-control" placeholder="Ingrese una dirección" name="direccion" id="direccion" value="Cabudare la Piedad, Barquisimeto. United Kingdom, Lara">
            </div>
                    
            <div class="col-sm-12 col-md-6 formulario__campo-centro">
                <label for="telefono" class="form-label login__label"> Referencia </label>
                <input type="text" class="form-control" placeholder="Ingrese una dirección" name="direccion" id="direccion" value="Ninguna referencia añadida">
            </div>

            <div class="d-grid my-5 formulario__btn-centro">
                <button type="submit" class="btn btn-danger"> Actualizar </button>
            </div>
        </form>
    </section>
</section>