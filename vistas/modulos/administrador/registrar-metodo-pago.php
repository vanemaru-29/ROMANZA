<?php
    require_once ('vistas/../controladores/autoCarga.php');
?>

<section class="py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Registrar Producto </h1>

    <!-- navbar -->
    <div class="mi-cuenta__menu mb-5">
        <a href="index.php?romanza=lista-productos" class="mi-cuenta-enlace"> Lista de Productos </a>
        <a href="index.php?romanza=registrar-producto" class="mi-cuenta-enlace"> Registrar Producto </a>
    </div>

    <!-- registrar producto -->
    <section class="container bg-light carrito__tabla p-5">
        <img src="vistas/../publico/activos/iconos/icono-oscuro.svg" class="icono__romanza" width="" alt="Logo ROMANZA">
        <h2 class="fw-bold text-center pb-5"> Metodo de pago </h2>

        <form action="#" method="POST" class="formulario" id="metodo">
            <!-- Grupo: Nombre -->
            <div class="formulario__grupo" id="grupo__nombre">
                <label for="nombre" class="form-label login__label"> Nombre </label>
                <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" placeholder=". . ." name="nombre" id="nombre">
                    <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                </div>
                <p class="formulario__input-error m-2">Este campo sólo admite letras y espacios, debe ser mayor a 4 caracteres.</p>
            </div>
            
            <!-- Grupo: Descripción -->
            <div class="formulario__grupo" id="grupo__descripcion">
                <label for="descripcion" class="form-label login__label"> Descripción </label>
                <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" placeholder=". . ." name="descripcion" id="descripcion">
                    <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                </div>
                <p class="formulario__input-error m-2">Este campo sólo admite letras y espacios, debe ser mayor a 15 caracteres.</p>
            </div>

              <!-- Grupo: Estatus -->
              <div class="formulario__grupo" id="grupo__estatus">
                <label for="estatus" class="form-label login__label"> Estatus </label>
                <div class="formulario__grupo-input">
                    <select class="form-select" aria-label="Default select example" name="estatus" id="estatus">
                        <option selected value="0">Seleccione un estatus</option>
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>
            </div>

            <div class="d-grid my-2 mx-auto formulario__grupo formulario__btn-centro editarInfo__actualizar">
                <button type="submit" name="registrar-metodo" class="formulario__btn btn btn-danger"> REGISTRAR </button>
            </div>

            <?php
                if (empty($_POST['registrar-metodo'])) {
                    if (isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['estatus'])) {
                        if (strlen($_POST['nombre']) >= 1 && strlen($_POST['descripcion']) >= 1  && strlen($_POST['estatus']) >= 1) {
                            $nombre = $_POST['nombre'];
                            $descripcion = $_POST['descripcion'];
                            $estatus = $_POST['estatus'];
                  

                            $nuevoMetodo = new Metodos();
                            $nuevoMetodo->registroMetodo($nombre, $descripcion, $estatus);
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

<script src="vistas/../js/validacion-producto.js"></script>