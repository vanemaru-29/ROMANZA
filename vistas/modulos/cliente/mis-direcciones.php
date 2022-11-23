<?php
    clearstatcache();

    if (!isset($_SESSION['nombre_usuario'])) {
        ?>
            <script> window.location.href = "vistas/../index.php?romanza=inicio"; </script>
        <?php
    } else {
        $nombre_usuario = $_SESSION['nombre_usuario'];

        $usuario = new Usuarios();
        $datos = $usuario->listaCli();
    }
?>

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
                <p class="text-center">
                    <?php
                        $usuario = new Usuarios();
                        $datos = $usuario -> datosUser($nombre_usuario);
                        while ($datos_usuario = mysqli_fetch_array($datos)) {
                            $id_usuario = $datos_usuario['id_usuario'];
                            $direcciones = new Direcciones();
                            $cant_dir = $direcciones->misDir($id_usuario);
                        }

                        $totalRegistros = @mysqli_num_rows($cant_dir);
                    ?>
                    Total de <?= $totalRegistros ?> direcciones
                </p>
                <a href="#" class="btn btn-warning mx-2 mi-cuenta__cta" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <span class="header__carrito-cuenta">Administrar Direcciones</span> </a>
            </div>

            <hr class="my-5">

            <!-- formulario -->
            <form action="" method="POST" class="formulario" id="direccion">
                <h4 class="text-center mb-2 mi-cuenta__editar-titulo">Registrar Nueva Dirección</h4>

                <!-- Grupo: Dirección -->
                <div class="formulario__grupo editarInfo__tlfn" id="grupo__direccion">
                    <label for="direccion" class="form-label login__label"> Dirección </label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" placeholder="Cabudare la Piedad, Barquisimeto. United Kingdom, Lara" name="direccion" id="direccion">
                        <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                    </div>
                    <p class="formulario__input-error m-2">Este campo contiene caracteres no admitidos, el texto debe ser mayor a 20 caracteres.</p>
                </div>
                
                <!-- Grupo: Referencia -->
                <div class="formulario__grupo editarInfo__tlfn" id="grupo__referencia">
                    <label for="referencia" class="form-label login__label"> Referencia </label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" placeholder="Ninguna referencia añadida" name="referencia" id="referencia">
                        <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                    </div>
                    <p class="formulario__input-error m-2">Este campo contiene caracteres no admitidos.</p>
                </div>

                <div class="d-grid m-auto formulario__grupo formulario__btn-centro editarInfo__actualizar">
                    <button type="submit" name="submit" class="formulario__btn btn btn-danger"> REGISTRAR </button>
                </div>

                <?php
                    if (empty($_POST['submit'])) {
                        if (isset($_POST['direccion']) && isset($_POST['referencia'])) {
                            if (strlen($_POST['direccion']) >= 1 && strlen($_POST['referencia']) >= 1 ) {
                                $direccion = $_POST['direccion'];
                                $referencia = $_POST['referencia'];

                                $usuario = new Usuarios();
                                $datos = $usuario -> datosUser($nombre_usuario);
                                while ($datos_usuario = mysqli_fetch_array($datos)) {
                                    $id_usuario = $datos_usuario['id_usuario'];
                                }

                                $nuevoDireccion = new Direcciones();
                                $nuevoDireccion->registroD($direccion, $referencia, $id_usuario);
                            } else {
                                $camposVacios = new ErrFormularios();
                                $camposVacios->camposVacios();
                            }
                        }
                    }
                ?>
            </form>
        </article>
    </section>
</section>

<!-- Modal -->
<?php
    include ('vistas/modulos/modal/modal-direcciones.php');
?>

<script src="vistas/../js/validacion-direccion.js"></script>