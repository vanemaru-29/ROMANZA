<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar metodo de pago</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="#" method="POST" class="formulario" id="metodo">

                    <!-- Grupo: Nombre -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="form-label login__label"> Nombre </label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="form-control formulario__input" placeholder=". . ." name="nombre" id="nombre">
                            <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                        </div>
                        <!--                 <p class="formulario__input-error m-2">Este campo sólo admite letras y espacios, debe ser mayor a 4 caracteres.</p> -->
                    </div>

                    <!-- Grupo: Descripción -->
                    <div class="formulario__grupo" id="grupo__descripcion">
                        <label for="descripcion" class="form-label login__label"> Descripción </label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="form-control formulario__input" placeholder=". . ." name="descripcion" id="descripcion">
                            <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                        </div>
                        <!--             <p class="formulario__input-error m-2">Este campo sólo admite letras y espacios, debe ser mayor a 15 caracteres.</p> -->
                    </div>



                    <!-- Grupo: Nombre -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="form-label login__label"> Documento de identidad </label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="form-control formulario__input" placeholder=". . ." name="cedula" id="nombre">
                            <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                        </div>
                        <!--            <p class="formulario__input-error m-2">Este campo sólo admite letras y espacios, debe ser mayor a 4 caracteres.</p> -->
                    </div>

                    <!-- Grupo: Teléfono -->
                    <div class="formulario__grupo" id="grupo__telefono">
                        <label for="telefono" class="form-label login__label"> Teléfono </label>
                        <div class="formulario__grupo-input">
                            <input type="tel" format="+58 (###) ###-####" class="form-control" placeholder="414 544-5583" name="telefono" id="telefono">
                            <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                        </div>
                        <!--            <p class="formulario__input-error m-2">Este campo sólo admite números, debe ingresarse un teléfono válido.</p> -->
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
                        if (isset($_POST['nombre'])) {
                            if (strlen($_POST['nombre'])) {
                                $nombre = $_POST['nombre'];
                                $descripcion = $_POST['descripcion'];
                                $estatus = $_POST['estatus'];
                                $numero_cuenta = $_POST['numero_cuenta'];
                                $cedula = $_POST['cedula'];
                                $telefono = $_POST['telefono'];
                                $titular = $_POST['titular'];


                                $nuevoMetodo = new Metodos();
                                $nuevoMetodo->registroMetodo($nombre, $descripcion, $numero_cuenta, $cedula, $telefono, $estatus, $titular);
                            } else {
                                $camposVacios = new ErrFormularios();
                                $camposVacios->camposVacios();
                            }
                        }
                    }
                    ?>
                </form>
            </div>

            <!--            <div class="modal-footer">
                <a href="vistas/../index.php?romanza=vaciar-carro" class="btn btn-danger">Vaciar Carrito</a>
                <a href="vistas/../index.php?romanza=pedido" class="btn btn-warning">Ir al Pedido</a>
            </div> -->
        </div>
    </div>
</div>