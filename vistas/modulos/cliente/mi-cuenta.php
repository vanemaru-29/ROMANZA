<?php
    clearstatcache();

    require_once ('vistas/../controladores/autoCarga.php');

    $usuario = new Usuarios();
    $datos = $usuario->getUsuario($ID);

?>

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

            <!-- formulario editar información -->
            <form action="#" method="POST" class="formulario" id="editar-info">
                <h4 class="text-center mb-5 mi-cuenta__editar-titulo">Editar Información</h4>

                <!-- Grupo: Nombre -->
                <div class="formulario__grupo" id="grupo__nombre">
                    <label for="nombre" class="form-label login__label"> Nombre </label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" placeholder="Vanessa Barboza" name="nombre" id="nombre">
                        <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                    </div>
                    <p class="formulario__input-error m-2">Este campo sólo admite letras y espacios, debe ser mayor a 8 caracteres.</p>
                </div>

                <!-- Grupo: Nombre de Usuario -->
                <div class="formulario__grupo" id="grupo__nombre_usuario">
                    <label for="nombre_usuario" class="form-label login__label"> Nombre de Usuario </label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control" placeholder="Vanemaru29" name="nombre_usuario" id="nombre_usuario">
                        <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                    </div>
                    <p class="formulario__input-error m-2">Este campo contiene caracteres no admitidos, debe ser mayor a 8 caracteres.</p>
                </div>
                            
                <!-- Grupo: Teléfono -->
                <div class="formulario__grupo editarInfo__tlfn" id="grupo__telefono">
                    <label for="telefono" class="form-label login__label"> Teléfono </label>
                    <div class="formulario__grupo-input">
                        <input type="tel" format="+58 (###) ###-####" class="form-control" placeholder="414 544-5583" name="telefono" id="telefono">
                        <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                    </div>
                    <p class="formulario__input-error m-2">Este campo sólo admite números, debe ingresarse un teléfono válido.</p>
                </div>

                <div class="d-grid m-auto formulario__grupo formulario__btn-centro editarInfo__actualizar">
                    <button type="submit" name="actualizar-info" class="formulario__btn btn btn-danger"> ACTUALIZAR </button>
                </div>
            </form>

            <hr class="my-5">

            <!-- formulario editar contraseña -->
            <form action="#" method="POST" class="formulario" id="editar-clave">
                <h4 class="text-center mb-5 mi-cuenta__editar-titulo">Editar Contraseña</h4>

                <!-- Grupo: Contraseña Antigua -->
                <div class="formulario__grupo" id="grupo__clave">
                    <label for="clave" class="form-label login__label"> Contraseña </label>
                    <div class="formulario__grupo-input">
                        <input type="password" class="form-control" placeholder="Contraseña actual" name="clave" id="clave">
                        <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                    </div>
                    <p class="formulario__input-error m-2">Este campo debe contener de 6 a 12 caracteres.</p>
                </div>

                <!-- Grupo: Nueva Contraseña -->
                <div class="formulario__grupo" id="grupo__clave2">
                    <label for="clave2" class="form-label login__label"> Nueva Contraseña </label>
                    <div class="formulario__grupo-input">
                        <input type="password" class="form-control" placeholder="Nueva contraseña" name="clave2" id="clave2">
                        <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                    </div>
                    <p class="formulario__input-error m-2">Este campo debe contener de 6 a 12 caracteres.</p>
                </div>

                <!-- Grupo: Confirmar Nueva Contraseña -->
                <div class="formulario__grupo editarInfo__tlfn" id="grupo__clave3">
                    <label for="clave3" class="form-label login__label"> Confirmar Nueva Contraseña </label>
                    <div class="formulario__grupo-input">
                        <input type="password" class="form-control" placeholder="Repetir nueva contraseña" name="clave3" id="clave3">
                        <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                    </div>
                    <p class="formulario__input-error m-2">Ambas contraseñas deben ser iguales.</p>
                </div>

                <div class="d-grid m-auto formulario__grupo formulario__btn-centro editarInfo__actualizar">
                    <button type="submit" name="actualizar-clave" class="formulario__btn btn btn-danger"> ACTUALIZAR </button>
                </div>
            </form>
        </article>
    </section>
</section>

<script src="vistas/../js/validacion-miCuenta.js"></script>