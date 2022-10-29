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
        <h2 class="fw-bold text-center pb-5"> Nuevo Producto </h2>

        <form action="#" method="POST" class="formulario" id="producto">
            <!-- Grupo: Nombre -->
            <div class="formulario__grupo" id="grupo__nombre">
                <label for="nombre" class="form-label login__label"> Nombre del Producto </label>
                <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" placeholder=". . ." name="nombre" id="nombre">
                    <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                </div>
                <p class="formulario__input-error m-2">Este campo sólo admite letras y espacios, debe ser mayor a 8 caracteres.</p>
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
            
            <!-- Grupo: Precio -->
            <div class="formulario__grupo" id="grupo__precio">
                <label for="precio" class="form-label login__label"> Precio en USD </label>
                <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" placeholder=". . ." name="precio" id="precio">
                    <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                </div>
                <p class="formulario__input-error m-2">Este campo sólo admite números, debe ingresarse un monto válido.</p>
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
            
            <!-- Grupo: Categoria -->
            <div class="formulario__grupo" id="grupo__categoria">
                <label for="categoria" class="form-label login__label"> Categoria </label>
                <div class="formulario__grupo-input">
                    <select class="form-select" aria-label="Default select example" name="cateoria" id="cateoria">
                        <option selected value="0">Seleccione una categoria</option>
                        <option value="bebidas">Bebidas</option>
                        <option value="pizzas">Pizzas</option>
                        <option value="carnes">Carnes</option>
                        <option value="postres">Postres</option>
                        <option value="sopas">Sopas</option>
                    </select>
                </div>
            </div>
            
            <!-- Grupo: Imagen -->
            <div class="formulario__grupo" id="grupo__imagen">
                <label for="imagen" class="form-label login__label"> Imagen </label>
                <div class="formulario__grupo-input">
                    <input type="file" class="form-control" placeholder=". . ." name="imagen" id="imagen" onchange="return validarExt()">
                </div>
            </div>

            <div class="mt-2 mx-auto formulario__grupo editarInfo__actualizar grupo__verArchivo" id="ver-archivo">

            </div>

            <div class="d-grid my-2 mx-auto formulario__grupo formulario__btn-centro editarInfo__actualizar">
                <button type="submit" name="registrar-producto" class="formulario__btn btn btn-danger"> REGISTRAR </button>
            </div>
        </form>
    </section>
</section>

<script src="vistas/../js/validacion-producto.js"></script>