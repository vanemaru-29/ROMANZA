<?php
    require_once('vistas/../controladores/autoCarga.php');
?>

<section class="py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Registrar Metodo </h1>

    <!-- navbar -->
    <div class="mi-cuenta__menu mb-5">
        <a href="index.php?romanza=lista-metodo-pago" class="mi-cuenta-enlace"> Metodos de Pago </a>
        <a href="index.php?romanza=registrar-metodo-pago" class="mi-cuenta-enlace"> Registrar </a>
    </div>

    <!-- registrar producto -->
    <section class="container bg-light carrito__tabla p-5">
        <h2 class="fw-bold text-center pb-5"> Método de Pago </h2>

        <article class="row">
            <div class="col-md-12">
                <section>
                    <form action="#" method="POST" class="formulario" id="metodo_pago">
                        <!-- Grupo: Nombre -->
                        <div class="formulario__grupo mb-4" id="grupo__nombre">
                            <label for="nombre" class="form-label login__label"> Nombre </label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input" placeholder=". . ." name="nombre" id="nombre">
                                <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                            </div>
                            <p class="formulario__input-error m-2">Este campo sólo admite letras y espacios, debe ser mayor a 6 caracteres.</p>
                        </div>

                        <!-- Grupo: Descripción -->
                        <div class="formulario__grupo mb-4" id="grupo__asunto">
                            <label for="asunto" class="form-label login__label"> Descripción </label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input" placeholder=". . ." name="asunto" id="asunto">
                                <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                            </div>
                            <p class="formulario__input-error m-2">Este campo sólo admite letras y espacios, debe ser mayor a 6 caracteres.</p>
                        </div>
                        
                        <!-- Grupo: Cédula -->
                        <div class="formulario__grupo mb-4" id="grupo__cedula">
                            <label for="cedula" class="form-label login__label"> Cédula </label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input" placeholder=". . ." name="cedula" id="cedula">
                                <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                            </div>
                            <p class="formulario__input-error m-2">Debe ingresar un número de cédula válido.</p>
                        </div>
                        
                        <!-- Grupo: Teléfono -->
                        <div class="formulario__grupo mb-4" id="grupo__telefono">
                            <label for="telefono" class="form-label login__label"> Teléfono </label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input" placeholder=". . ." name="telefono" id="telefono">
                                <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                            </div>
                            <p class="formulario__input-error m-2">Debe ingresar un número de teléfono válido.</p>
                        </div>
                        
                        <div class="d-grid mt-2 mb-4 mx-auto formulario__grupo formulario__btn-centro editarInfo__actualizar">
                            <button type="submit" name="registrar-metodo" class="formulario__btn btn btn-danger"> REGISTRAR </button>
                        </div>

                        <?php
                            if (empty($_POST['registrar-metodo'])) {
                                if (isset($_POST['nombre']) && isset($_POST['asunto'])) {
                                    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['asunto']) >= 1) {
                                        $nombre = $_POST['nombre'];
                                        $cedula = $_POST['cedula'];
                                        $telefono = $_POST['telefono'];
                                        $asunto = $_POST['asunto'];
                                        
                                        print_r($nombre);
                                        print_r($cedula);
                                        print_r($telefono);
                                        print_r($asunto);

                                        $nuevoPdt = new Metodos();
                                        $nuevoPdt->registroMtd($nombre, $cedula, $telefono, $asunto);
                                    } else {
                                        $camposVacios = new ErrFormularios();
                                        $camposVacios -> camposVacios();
                                    }
                                }
                            }
                        ?>
                    </form>
                </section>
            </div>
        </article>
    </section>
</section>

<script src="vistas/../js/validacion-metodo_pago.js"></script>