<?php
    $usuario = new Usuarios();

    // lista de todas las opiniones
    $opiniones = new Opiniones();
    $opn = $opiniones -> listaOpn();

    // formato de fecha
    $fecha = new Fechas();

    if (isset($_SESSION['nombre_usuario'])) {
        $nombre_usuario = $_SESSION['nombre_usuario'];
        $id_rol = $_SESSION['id_rol'];

        // obtener datos del usuario
        $datos = $usuario -> datosUser($nombre_usuario);
    }
?>

<section class="py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Opiniones </h1>

    <?php if (isset($id_rol) && $id_rol == 3) { ?>
        <form action="#" method="POST" class="opiniones__form">
            <div class="mb-4">
                <label for="opinion" class="form-label text-white"> Aportar una Opinión </label>
                <input type="text" class="form-control" placeholder="Escribe una opinión. . ." name="opinion" id="opinion">
            </div>

            <div class="d-grid mt-2 mb-5 opiniones__enviar">
                <button type="submit" name="enviar-opinion" class="btn btn-danger"> ENVIAR OPINIÓN </button>
            </div>

            <?php
                if (empty($_POST['enviar-opinion'])) {
                    if (isset($_POST['opinion'])) {
                        if (strlen($_POST['opinion']) >= 1) {
                            $opinion = $_POST['opinion'];

                            while ($datos_usuario = mysqli_fetch_array($datos)) {
                                $id_usuario = $datos_usuario['id_usuario'];
                            }

                            $registrarOpn = new Opiniones();
                            $registrarOpn -> registrarOpn($id_usuario, $opinion);
                        } else {
                            $camposVacios = new ErrFormularios();
                            $camposVacios -> camposVacios();
                        }
                    }
                }
            ?>
        </form>
    <?php } ?>

    <article class="inicio__opiniones-cont">
        <?php
            while ($datos_opinion = mysqli_fetch_array($opn)) {
                $datos2 = $usuario -> obtenerUser($datos_opinion['id_usuario']);

                while ($datos_usuario2 = mysqli_fetch_array($datos2)) {
        ?>
        <div class="inicio__opinion card border-light" style="max-width: 18rem;">
            <div class="card-header"><?= $fecha->fechaFormato($datos_opinion['fecha_registro']) ?></div>
            <div class="card-body">
                <h4 class="card-title mb-3"><?= $datos_usuario2['nombre_usuario'] ?></h5>
                <p class="card-text"><?= $datos_opinion['opinion'] ?></p>
            </div>
        </div>
        <?php
                }
            }
        ?>
    </article>
</section>