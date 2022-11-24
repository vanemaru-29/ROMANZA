<?php
    // si no existe el ID redirecciona a la lista de categorias
    if (empty($_GET['categoria'])) {
        ?>
            <script> window.location.href = "vistas/../index.php?romanza=lista-categorias"; </script>
        <?php
    } else {
        $ID = $_GET['categoria'];
        
        require_once ('vistas/../controladores/autoCarga.php');
        
        $categoria = new Categorias();
        $datos = $categoria->obtenerCat($_GET['categoria']);
    }
?>

<section class="w-100 vh-100 py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Editar Categoria </h1>

    <!-- navbar -->
    <div class="mi-cuenta__menu mb-5">
        <a href="index.php?romanza=lista-categorias" class="mi-cuenta-enlace"> Lista de Categorias </a>
        <a href="index.php?romanza=registrar-categoria" class="mi-cuenta-enlace"> Registrar Categoria </a>
    </div>

    <!-- registrar producto -->
    <section class="container bg-light carrito__tabla p-5">
        <h2 class="fw-bold text-center pb-5"> Editar Categoria </h2>

        <form action="#" method="POST" class="formulario" id="categoria">
            <?php
                while ($resultado = $datos->fetch_object()) {
            ?>

                <!-- Grupo: Nombre de la Categoria -->
                <div class="formulario__grupo editarInfo__tlfn" id="grupo__nombre">
                    <label for="nombre" class="form-label login__label"> Nombre de la Categoria </label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" placeholder=". . ." name="nombre" id="nombre" value="<?= $resultado->nombre ?>">
                        <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                    </div>
                    <p class="formulario__input-error m-2">Este campo contiene caracteres no admitidos, el texto debe ser mayor a 4 caracteres.</p>
                </div>

                <!-- Grupo: Descripción -->
                <div class="formulario__grupo editarInfo__tlfn" id="grupo__descripcion">
                    <label for="descripcion" class="form-label login__label"> Descripción </label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" placeholder=". . ." name="descripcion" id="descripcion" value="<?= $resultado->descripcion ?>">
                        <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                    </div>
                    <p class="formulario__input-error m-2">Este campo sólo admite letras y espacios, debe ser mayor a 15 caracteres.</p>
                </div>

            <?php
                }
            ?>

            <div class="d-grid my-4 formulario__grupo formulario__btn-centro editarInfo__actualizar">
                <button type="submit" name="editar-categoria" class="formulario__btn btn btn-danger"> ACTUALIZAR </button>
            </div>

            <?php
                if (empty($_POST['editar-categoria'])) {
                    if (isset($_POST['nombre']) && isset($_POST['descripcion'])) {
                        if (strlen($_POST['nombre']) >= 1 && strlen($_POST['descripcion']) >= 1) {
                            $nombre = $_POST['nombre'];
                            $descripcion = $_POST['descripcion'];
    
                            $editarCat = new Categorias();
                            $editarCat -> editarCat($ID, $nombre, $descripcion);
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

<script src="vistas/../js/validacion-categoria-editar.js"></script>