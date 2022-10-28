<section class="w-100 vh-100 py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Editar Producto </h1>

    <!-- navbar -->
    <div class="mi-cuenta__menu mb-5">
        <a href="index.php?romanza=lista-productos" class="mi-cuenta-enlace"> Lista de Productos </a>
        <a href="index.php?romanza=registrar-producto" class="mi-cuenta-enlace"> Registrar Producto </a>
    </div>

    <!-- registrar producto -->
    <section class="container bg-light carrito__tabla p-5">
        <img src="vistas/../publico/activos/iconos/icono-oscuro.svg" class="icono__romanza" width="" alt="Logo ROMANZA">
        <h2 class="fw-bold text-center pb-5"> Editar Producto </h2>

        <form action="#" method="POST" class="row">
            <div class="col-sm-12 col-md-6 mb-3">
                <label for="username" class="form-label login__label"> Nombre del Producto</label>
                <input type="text" class="form-control" placeholder="Ingrese un nombre" name="nombre" id="nombre">
            </div>

            <div class="col-sm-12 col-md-6 mb-3">
                <label for="username" class="form-label login__label"> Descripción </label>
                <input type="text" class="form-control" placeholder="Escriba una descripción" name="descripcion" id="descripcion">
            </div>

            <div class="col-sm-12 col-md-6 mb-3">
                <label for="telefono" class="form-label login__label"> Precio </label>
                <input type="text" class="form-control" placeholder="Ingrese el precio del producto" name="precio" id="precio">
            </div>
            
            <div class="col-sm-12 col-md-6 mb-3">
                <label for="estatus" class="form-label login__label"> Estatus </label>
                <select class="form-select" aria-label="Default select example" id="estatus">
                    <option selected>Seleccione un estatus</option>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>
            
            <div class="col-sm-12 col-md-6">
                <label for="categoria" class="form-label login__label"> Categoria </label>
                <select class="form-select" aria-label="Default select example" id="cateoria">
                    <option selected>Seleccione una categoria</option>
                    <option value="bebidas">Bebidas</option>
                    <option value="pizzas">Pizzas</option>
                    <option value="carnes">Carnes</option>
                    <option value="postres">Postres</option>
                    <option value="sopas">Sopas</option>
                </select>
            </div>
            
            <div class="col-sm-12 col-md-6">
                <label for="telefono" class="form-label login__label"> Imagen </label>
                <input type="file" class="form-control" placeholder="Ingrese un numero de telefono" name="telefono" id="telefono">
            </div>

            <div class="d-grid mt-5 formulario__btn-centro">
                <button type="submit" class="btn btn-danger"> Actualizar </button>
            </div>
        </form>
    </section>
</section>