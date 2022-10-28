<section class="w-100 vh-100 py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Editar Categoria </h1>

    <!-- navbar -->
    <div class="mi-cuenta__menu mb-5">
        <a href="index.php?romanza=lista-categorias" class="mi-cuenta-enlace"> Lista de Categorias </a>
        <a href="index.php?romanza=registrar-categoria" class="mi-cuenta-enlace"> Registrar Categoria </a>
    </div>

    <!-- registrar producto -->
    <section class="container bg-light carrito__tabla p-5">
        <img src="vistas/../publico/activos/iconos/icono-oscuro.svg" class="icono__romanza" width="" alt="Logo ROMANZA">
        <h2 class="fw-bold text-center pb-5"> Editar Categoria </h2>

        <form action="#" method="POST" class="row">
            <div class="col-sm-12 mb-3 categoria__grupo">
                <label for="username" class="form-label login__label"> Nombre de la Categoria</label>
                <input type="text" class="form-control" placeholder="Ingrese un nombre" name="nombre" id="nombre">
            </div>

            <div class="col-sm-12 categoria__grupo">
                <label for="username" class="form-label login__label"> Descripción </label>
                <input type="text" class="form-control" placeholder="Escriba una descripción" name="descripcion" id="descripcion">
            </div>

            <div class="d-grid mt-5 formulario__btn-centro">
                <button type="submit" class="btn btn-danger"> Actualizar </button>
            </div>
        </form>
    </section>
</section>