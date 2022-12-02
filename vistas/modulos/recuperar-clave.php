<section class="w-100 vh-100 d-flex justify-content-center align-items-center">
    <section class="login__cont formulario_sm container bg-white shadow">
        <div class="row">            
            <div class="col p-5">
                <div class="text-end">
                    <h2 class="fw-bold text-center pt-2 pb-4" > Recuperar Contraseña </h2>

                    <!-- contacto -->
                    <form action="#" method="POST" class="formulario" id="recuperar-clave">
                        <!-- Grupo: Nombre -->
                        <!-- <div class="formulario__grupo editarInfo__tlfn" id="grupo__nombre">
                            <label for="nombre" class="form-label login__label"> Nombre </label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input" placeholder="Vanessa Barboza" name="nombre" id="nombre">
                                <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                            </div>
                            <p class="formulario__input-error m-2">Este campo sólo admite letras y espacios, debe ser mayor a 8 caracteres.</p>
                        </div> -->

                        <!-- Grupo: Correo Electrónico -->
                        <div class="formulario__grupo editarInfo__tlfn" id="grupo__correo">
                            <label for="correo" class="form-label login__label"> Correo Electrónico </label>
                            <div class="formulario__grupo-input">
                                <input type="email" class="form-control formulario__input" placeholder="vanemaru29@gmail.com" name="correo" id="correo">
                                <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                            </div>
                            <p class="formulario__input-error m-2">Debe ingresar una dirección de correo válida.</p>
                        </div>

                        <div class="d-grid m-2 formulario__grupo editarInfo__tlfn">
                            <button type="submit" name="submit" class="formulario__btn btn btn-danger"> ENVIAR </button>
                        </div>

                        <?php
                            if (empty($_POST['submit'])) {
                                if (isset($_POST['correo'])) {
                                    if (strlen($_POST['correo']) >= 1) {
                                        $correo = $_POST['correo'];

                                        $nuevoMetodo = new Usuarios();
                                        $nuevoMetodo->recuperarClave($correo);
                                    } else {
                                        $camposVacios = new ErrFormularios();
                                        $camposVacios -> camposVaciosAlerta2();
                                    }
                                }
                            }
                        ?>
                    </form>

                    <div class="my-3 text-center">
                        <p class="color-mensaje my-0">¿Aún no tienes una cuenta? <a href="vistas/../index.php?romanza=registro" class="enlace">Registrarme</a></p>
                        <p class="color-mensaje my-0">¿Ya tienes una cuenta? <a href="vistas/../index.php?romanza=login" class="enlace">Ir a login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>