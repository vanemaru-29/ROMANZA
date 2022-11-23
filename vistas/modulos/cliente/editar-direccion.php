<?php
    if (!isset($_SESSION['nombre_usuario'])) {
        ?>
            <script> window.location.href = "vistas/../index.php?romanza=inicio"; </script>
        <?php
    } else {
        $nombre_usuario = $_SESSION['nombre_usuario'];

        // si no existe el ID redirecciona a mis direcciones
        if (empty($_GET['dir'])) {
            ?>
                <script> window.location.href = "vistas/../index.php?romanza=mis direcciones"; </script>
            <?php
        } else {
            $dir = $_GET['dir'];
        }   
    }
?>

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
            <?php
                $usuario = new Usuarios();
                $datos = $usuario -> datosUser($nombre_usuario);
                while ($datos_usuario = mysqli_fetch_array($datos)) {
                    $id_usuario = $datos_usuario['id_usuario'];
                    $direcciones = new Direcciones();
                    $cant_dir = $direcciones->obtenerDir($id_usuario, $dir);
                }

                while ($datos_dir = mysqli_fetch_array($cant_dir)) {
            ?>       

                <!-- Grupo: Dirección -->
                <div class="formulario__grupo editarInfo__tlfn" id="grupo__direccion">
                    <label for="direccion" class="form-label login__label"> Dirección </label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" placeholder="Cabudare la Piedad, Barquisimeto. United Kingdom, Lara" name="direccion" id="direccion" value="<?= $datos_dir['direccion'] ?>">
                        <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                    </div>
                    <p class="formulario__input-error m-2">Este campo contiene caracteres no admitidos, el texto debe ser mayor a 20 caracteres.</p>
                </div>
                
                <!-- Grupo: Referencia -->
                <div class="formulario__grupo editarInfo__tlfn" id="grupo__referencia">
                    <label for="referencia" class="form-label login__label"> Referencia </label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" placeholder="Ninguna referencia añadida" name="referencia" id="referencia" value="<?= $datos_dir['referencia'] ?>">
                        <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                    </div>
                    <p class="formulario__input-error m-2">Este campo contiene caracteres no admitidos.</p>
                </div>
            <?php
                }
            ?>

            <div class="d-grid m-auto formulario__grupo formulario__btn-centro editarInfo__actualizar">
                <button type="submit" name="editar-direccion" class="formulario__btn btn btn-danger"> ACTUALIZAR </button>
            </div>

            <?php
                if (empty($_POST['editar-direccion'])) {
                    if (isset($_POST['direccion']) && isset($_POST['referencia'])) {
                        if (strlen($_POST['direccion']) >= 1 && strlen($_POST['referencia']) >= 1) {
                            $direccion = $_POST['direccion'];
                            $referencia = $_POST['referencia'];
    
                            $editarDir = new Direcciones();
                            $editarDir -> editarDir($dir, $direccion, $referencia);
                        } else {
                            $camposVacios = new ErrFormularios();
                            $camposVacios -> camposVacios();
                        }
                    }
                }
            ?>
        </form>
    </section>
</section>

<script src="vistas/../js/validacion-direccion-editar.js"></script>