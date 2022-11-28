<?php
    if (!isset($_SESSION['nombre_usuario']) || $_SESSION['id_rol'] != 1) {
        ?>
            <script> window.location.href = "vistas/../index.php?romanza=login"; </script>
        <?php
    } else {
        $conversion = new Conversion();
        $datos = $conversion->equivalenciaBs();
    }
?>

<section class="w-100 vh-100 py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Conversión </h1>

    <!-- precios -->
    <section class="container mi-cuenta">
        <h2 class="fw-bold text-center pb-4"> Administrar Precios </h2>

        <!-- formulario -->
        <form action="#" method="POST" class="formulario" id="conversion">                    
            <!-- Grupo: Dolar -->
            <div class="formulario__grupo editarInfo__tlfn" id="grupo__dolares">
                <label for="dolares" class="form-label login__label"> Referencia en USD </label>
                <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" placeholder="00.00" name="dolares" id="dolares" value="01.00" disabled>
                </div>
            </div>
            
            <?php
                while ($datos_conversion = mysqli_fetch_array($datos)) {
            ?>
            <!-- Grupo: Equivalencia -->
            <div class="formulario__grupo editarInfo__tlfn" id="grupo__bolivares">
                <label for="bolivares" class="form-label login__label"> Equivalencia en Bs </label>
                <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" placeholder="00.00" name="bolivares" id="bolivares" value="<?= $datos_conversion['bs_equivalencia'] ?>">
                    <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                </div>
                <p class="formulario__input-error m-2">Este campo sólo admite números, debe ingresarse un monto válido.</p>
            </div>
            <?php
                }
            ?>

            <div class="d-grid m-auto formulario__grupo formulario__btn-centro editarInfo__actualizar">
                <button type="submit" name="conversion" class="formulario__btn btn btn-danger"> ACTUALIZAR </button>
            </div>

            <?php
                if (empty($_POST['conversion'])) {
                    if (isset($_POST['bolivares'])) {
                        if (strlen($_POST['bolivares']) >= 1) {
                            $bolivares = $_POST['bolivares'];
    
                            $conversion -> registroConversion($bolivares);
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

<script src="vistas/../js/validacion-conversion.js"></script>