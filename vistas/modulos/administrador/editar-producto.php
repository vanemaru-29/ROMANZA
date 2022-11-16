<?php
    // si no existe el ID redirecciona a la lista de productos
    if (empty($_GET['producto'])) {
        ?>
            <script> window.location.href = "vistas/../index.php?romanza=lista-productos"; </script>
        <?php
    } else {
        $ID = $_GET['producto'];
        
        require_once ('vistas/../controladores/autoCarga.php');
        
        $producto = new Productos();
        $datos = $producto->obtenerPdt($_GET['producto']);

        $categorias = new Categorias();
        $cat = $categorias->listaCat();
    }
?>

<section class="w-100 py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Editar Producto </h1>

    <!-- navbar -->
    <div class="mi-cuenta__menu mb-5">
        <a href="index.php?romanza=lista-productos" class="mi-cuenta-enlace"> Lista de Productos </a>
        <a href="index.php?romanza=registrar-producto" class="mi-cuenta-enlace"> Registrar Producto </a>
    </div>

    <!-- editar producto -->
    <section class="container bg-light carrito__tabla p-5">
        <img src="vistas/../publico/activos/iconos/icono-oscuro.svg" class="icono__romanza" width="" alt="Logo ROMANZA">
        <h2 class="fw-bold text-center pb-5"> Editar Producto </h2>

        <form action="#" method="POST" class="formulario" id="producto">
            <?php
                while ($resultado = $datos->fetch_object()) {
            ?>
                <!-- Grupo: Nombre -->
                <div class="formulario__grupo" id="grupo__nombre">
                    <label for="nombre" class="form-label login__label"> Nombre del Producto </label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" placeholder=". . ." name="nombre" id="nombre" value="<?= $resultado->nombre ?>">
                        <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                    </div>
                    <p class="formulario__input-error m-2">Este campo sólo admite letras y espacios, debe ser mayor a 8 caracteres.</p>
                </div>
                
                <!-- Grupo: Descripción -->
                <div class="formulario__grupo" id="grupo__descripcion">
                    <label for="descripcion" class="form-label login__label"> Descripción </label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" placeholder=". . ." name="descripcion" id="descripcion" value="<?= $resultado->descripcion ?>">
                        <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                    </div>
                    <p class="formulario__input-error m-2">Este campo sólo admite letras y espacios, debe ser mayor a 15 caracteres.</p>
                </div>
                
                <!-- Grupo: Precio -->
                <div class="formulario__grupo" id="grupo__precio">
                    <label for="precio" class="form-label login__label"> Precio en USD </label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" placeholder=". . ." name="precio" id="precio" value="<?= $resultado->precio ?>">
                        <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                    </div>
                    <p class="formulario__input-error m-2">Este campo sólo admite números, debe ingresarse un monto válido.</p>
                </div>
                
                <!-- Grupo: Estatus -->
                <div class="formulario__grupo" id="grupo__estatus">
                    <label for="estatus" class="form-label login__label"> Estatus </label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="form-control formulario__input" name="estatus" id="estatus" value="<?= $resultado->estatus ?>" disabled>
                    </div>
                </div>
                
                <!-- Grupo: Categoria -->
                <div class="formulario__grupo" id="grupo__categoria">
                    <label for="categoria" class="form-label login__label"> Categoria </label>
                    <div class="formulario__grupo-input">
                        <select class="form-select" aria-label="Default select example" name="categoria" id="categoria">
                            <option selected value="0">Seleccione una categoria</option>
                            <?php
                                while ($catDatos = mysqli_fetch_array($cat)) {
                                ?>
                                    <option value="<?= $catDatos['id_categoria'] ?>"><?= $catDatos['nombre'] ?></option>
                                <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <?php
                    $imagen = new Productos();
                    $img = $imagen->imagenPdt($resultado->imagen);
                ?>
                
                <!-- Grupo: Imagen -->
                <div class="formulario__grupo" id="grupo__imagen">
                    <label for="imagen" class="form-label login__label"> Imagen </label>
                    <div class="formulario__grupo-input">
                        <input type="file" class="form-control" name="imagen" id="imagen" onchange="return validarExt()" accept="image/png, image/webp">
                    </div>
                </div>

                <div class="mt-2 mx-auto formulario__grupo editarInfo__actualizar grupo__verArchivo" id="ver-archivo"> <img src="<?= $img ?>"> </div>

            <?php
                }
            ?>

            <div class="d-grid my-2 mx-auto formulario__grupo formulario__btn-centro editarInfo__actualizar">
                <button type="submit" name="editar-producto" class="formulario__btn btn btn-danger"> ACTUALIZAR </button>
            </div>

            <?php
                if (empty($_POST['editar-producto'])) {
                    if (isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['precio']) && isset($_POST['categoria'])) {
                        if (strlen($_POST['nombre']) >= 1 && strlen($_POST['descripcion']) >= 1 && strlen($_POST['precio']) >= 1 && strlen($_POST['categoria']) >= 1) {
                            $nombre = $_POST['nombre'];
                            $descripcion = $_POST['descripcion'];
                            $precio = $_POST['precio'];
                            $categoria = $_POST['categoria'];

                            $nuevoPdt = new Productos();
                            $nuevoPdt->editarPdt($ID, $nombre, $descripcion, $precio, $categoria);
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

<script src="vistas/../js/validacion-producto-editar.js"></script>