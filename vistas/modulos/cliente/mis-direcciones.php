<section class="py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Direcciones </h1>

    <!-- navbar -->
    <div class="mi-cuenta__menu mb-5">
        <a href="index.php?romanza=mi-cuenta" class="mi-cuenta-enlace"> Mi Cuenta </a>
        <a href="index.php?romanza=mis-direcciones" class="mi-cuenta-enlace"> Direcciones </a>
        <a href="index.php?romanza=mis-ordenes" class="mi-cuenta-enlace"> Pedidos Recientes </a>
    </div>

    <!-- direcciones -->
    <section class="container mi-cuenta">
        <img src="vistas/../publico/activos/iconos/icono-oscuro.svg" class="icono__romanza" width="" alt="Logo ROMANZA">
        <h2 class="fw-bold text-center pb-5"> Direcciones Registradas </h2>

        <article class="row">            
            <div class="col-sm-12 my-3">
                <p class="text-center">Total de 2 direcciones</p>
                <a href="#" class="btn btn-warning mx-2 mi-cuenta__cta" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <span class="header__carrito-cuenta">Administrar Direcciones</span> </a>
            </div>

            <hr class="my-5">

            <!-- formulario -->
            <form action="#" method="POST" class="formulario" id="direccion">
                <h4 class="text-center mb-2 mi-cuenta__editar-titulo">Registrar Nueva Dirección</h4>

                <!-- Grupo: Dirección -->
                <div class="formulario__grupo editarInfo__tlfn" id="grupo__direccion">
                    <label for="direccion" class="form-label login__label"> Dirección </label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" placeholder=". . ." name="direccion" id="direccion">
                        <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                    </div>
                    <p class="formulario__input-error m-2">Este campo contiene caracteres no admitidos, el texto debe ser mayor a 20 caracteres.</p>
                </div>
                
                <!-- Grupo: Referencia -->
                <div class="formulario__grupo editarInfo__tlfn" id="grupo__referencia">
                    <label for="referencia" class="form-label login__label"> Referencia </label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" placeholder=". . ." name="referencia" id="referencia">
                        <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                    </div>
                    <p class="formulario__input-error m-2">Este campo contiene caracteres no admitidos.</p>
                </div>

                <div class="d-grid m-auto formulario__grupo formulario__btn-centro editarInfo__actualizar">
                    <button type="submit" name="actualizar-info" class="formulario__btn btn btn-danger"> REGISTRAR </button>
                </div>
            </form>
        </article>
    </section>
</section>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"> Administrar Direcciones </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Dirección</th>
                                <th scope="col">Referencia</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cabudare la Piedad, Barquisimeto. United Kingdom, Lara</td>
                                <td>Ninguna referencia añadida</td>
                                <td><a href="#" class="direcciones__icono direcciones__icono-borrar"><i class="fa-solid fa-circle-xmark"></i></a> <a href="index.php?romanza=editar-direccion" class="direcciones__icono direcciones__icono-editar"><i class="fa-solid fa-square-pen carrito__icono-btn"></i></a></td>
                            </tr>
                            <tr>
                                <td>Cabudare la Piedad, Barquisimeto. United Kingdom, Lara</td>
                                <td>Ninguna referencia añadida</td>
                                <td><a href="#" class="direcciones__icono direcciones__icono-borrar"><i class="fa-solid fa-circle-xmark"></i></a> <a href="index.php?romanza=editar-direccion" class="direcciones__icono direcciones__icono-editar"><i class="fa-solid fa-square-pen carrito__icono-btn"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="vistas/../js/validacion-direccion.js"></script>