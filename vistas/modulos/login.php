<?php
    if (isset($_SESSION['nombre_usuario'])) {
        ?>
            <script> window.location.href = "vistas/../index.php?romanza=inicio"; </script>
        <?php
    }
?>

<section class="w-100 vh-100 d-flex justify-content-center align-items-center">
    <section class="login__cont container bg-white shadow">
        <div class="row">
            <div class="col login-imagen d-none d-lg-block"></div>
            
            <div class="col p-5">
                <div class="text-end">
                    <img src="vistas/../publico/activos/iconos/icono-oscuro.svg" width="" alt="Logo ROMANZA">
                    <h2 class="fw-bold text-center py-5" > Iniciar Sesión </h2>

                    <!-- login -->
                    <form action="#" method="POST">
                        <div class="mb-4">
                            <label for="usuario" class="form-label login__label"> Nombre de Usuario </label>
                            <input type="text" class="form-control" placeholder="Ingrese un nombre de usuario" name="usuario" id="usuario">
                        </div>
                        <div class="mb-4">
                            <label for="clave" class="form-label login__label"> Contraseña </label>
                            <input type="password" class="form-control" placeholder="Ingrese contraseña" name="clave" id="clave">
                        </div>
                        <div class="d-grid mt-5 mb-3">
                            <button type="submit" name="submit" class="btn btn-danger"> INGRESAR </button>
                        </div>

                        <?php
                            if (empty($_POST['submit'])) {
                                if (isset($_POST['usuario']) && isset($_POST['clave'])) {
                                    if (strlen($_POST['usuario']) >= 1 && strlen($_POST['clave']) >= 1) {
                                        $usuario = $_POST['usuario'];
                                        $clave = $_POST['clave'];

                                        $login = new Usuarios();
                                        $login -> login($usuario, $clave);
                                    } else {
                                        $camposVacios = new ErrFormularios();
                                        $camposVacios -> camposVaciosAlerta();
                                    }
                                }
                            }
                        ?>
                    </form>

                    <div class="my-3 text-center">
                        <p class="color-mensaje my-0">¿Aún no tienes una cuenta? <a href="vistas/../index.php?romanza=registro" class="enlace">Registrarme</a></p>
                        <p class="color-mensaje my-0">¿Has olvidado tu contraseña? <a href="vistas/../index.php?romanza=recuperar-clave" class="enlace">Recuperar Cuenta</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>