<section class="py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Mi cuenta </h1>

    <!-- navbar -->
    <div class="mi-cuenta__menu mb-5">
        <a href="index.php?romanza=mi-cuenta" class="mi-cuenta-enlace"> Mi Cuenta </a>
        <a href="index.php?romanza=mis-direcciones" class="mi-cuenta-enlace"> Direcciones </a>
        <a href="index.php?romanza=mis-ordenes" class="mi-cuenta-enlace"> Pedidos Recientes </a>
    </div>

    <!-- mis datos -->
    <section class="container mi-cuenta">
        <img src="vistas/../publico/activos/iconos/icono-oscuro.svg" class="icono__romanza" width="" alt="Logo ROMANZA">
        <h2 class="fw-bold text-center pb-5"> Bienvenido@ </h2>

        <!-- editar datos -->
        <article class="row">
            <div class="col-sm-12 col-md-6">
                <p class="mi-cuenta__datos"><span class="fw-bold">Nombre:</span> Fabi Martinez</p>
                <p class="mi-cuenta__datos"><span class="fw-bold">Nombre de Usiario:</span> Fabimar2712</p>
                <p class="mi-cuenta__datos"><span class="fw-bold">Teléfono:</span> 0414 351 5753</p>
            </div>
            
            <div class="col-sm-12 col-md-6">
                <p class="text-center">No hay pedidos añadidos al carrito</p>
                <a href="index.php?romanza=pedidos" class="btn btn-warning mx-2 mi-cuenta__cta"> <img src="vistas/../publico/activos/iconos/carrito-oscuro.svg" alt="Mi Carrito" class="header__carrito"> <span class="header__carrito-cuenta">Ordene ahora</span> </a>
            </div>

            <hr class="my-5">

            <!-- formulario -->
            <form action="#" method="POST" class="row">
                <h4 class="text-center mb-5">Editar Información</h4>

                <div class="col-sm-12 col-md-6 mb-3">
                    <label for="username" class="form-label login__label"> Nombre </label>
                    <input type="text" class="form-control" placeholder="Ingrese un nombre" name="name" id="name" value="Fabi Martinez">
                </div>

                <div class="col-sm-12 col-md-6 mb-3">
                    <label for="username" class="form-label login__label"> Nombre de Usuario </label>
                    <input type="text" class="form-control" placeholder="Ingrese un nombre de usuario" name="username" id="username" value="Fabimar2712">
                </div>

                <div class="col-sm-12 col-md-6 formulario__campo-centro">
                    <label for="telefono" class="form-label login__label"> Telefono </label>
                    <input type="tel" format="+58 (###) ###-####" class="form-control" placeholder="Ingrese un numero de telefono" name="telefono" id="telefono" value="0414 351 5753">
                </div>

                <div class="d-grid mt-5 formulario__btn-centro">
                    <button type="submit" class="btn btn-danger"> Actualizar </button>
                </div>
            </form>

            <hr class="my-5">

            <form action="#" method="POST" class="row">
                <h4 class="text-center mb-5">Editar Contraseña</h4>

                <div class="col-sm-12 col-md-6 mb-4">
                    <label for="telefono" class="form-label login__label"> Contraseña </label>
                    <input type="password" class="form-control" placeholder="Contraseña antigua" name="password" id="password">
                </div>

                <div class="col-sm-12 col-md-6 mb-4">
                    <label for="telefono" class="form-label login__label"> Nueva Contraseña </label>
                    <input type="password" class="form-control" placeholder="Nueva contraseña" name="password" id="password">
                </div>

                <div class="col-sm-12 col-md-6 formulario__campo-centro">
                    <label for="telefono" class="form-label login__label"> Confirmar Nueva Contraseña </label>
                    <input type="password" class="form-control" placeholder="Confirmacion de nueva contraseña" name="password" id="password">
                </div>

                <div class="d-grid my-5 formulario__btn-centro">
                    <button type="submit" class="btn btn-danger"> Actualizar </button>
                </div>
            </form>
        </article>
    </section>
</section>