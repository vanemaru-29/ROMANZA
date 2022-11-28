<?php
require_once('vistas/../controladores/autoCarga.php');
?>

<script type="text/javascript">
    function showContentt() {
        element1 = document.getElementById("content");
        element2 = document.getElementById("content2");
        check = document.getElementById("check");
        check2 = document.getElementById("check2");
        if (check.checked) {
            check2.Checked = false;
            check.Checked = true;
            element1.style.display = 'block';
            element2.style.display = 'none';
        } else {
            check2.Checked = true;
            check.Checked = false;
            element1.style.display = 'none';
            element2.style.display = 'block';
        }
    }

    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display = 'block';
        } else {
            element.style.display = 'none';
        }
    }

    function showContent2() {
        element = document.getElementById("content2");
        check = document.getElementById("check2");
        if (check.checked) {
            element.style.display = 'block';
        } else {
            element.style.display = 'none';
        }
    }
</script>

<section class="py-5">
    <h1 class="text-center text-white my-5 display-1 inicio__titulo"> Registrar Metodo de pago </h1>

    <!-- navbar -->
    <div class="mi-cuenta__menu mb-5">
        <a href="index.php?romanza=lista-metodo-pago" class="mi-cuenta-enlace"> Lista de metodos de pago </a>
        <a href="index.php?romanza=registrar-producto" class="mi-cuenta-enlace"> Registrar metodo de pago </a>
        <a href="index.php?romanza=conversion" class="mi-cuenta-enlace"> Conversion </a>
    </div>

    <!-- registrar producto -->
    <section class="container bg-light carrito__tabla p-5">
        <img src="vistas/../publico/activos/iconos/icono-oscuro.svg" class="icono__romanza" width="" alt="Logo ROMANZA">
        <h2 class="fw-bold text-center pb-5"> Metodo de pago </h2>

        <b>Registrar metodo de pago por pago movil?</b>
        <input type="radio" name="check" id="check" value="1" onchange="javascript:showContentt()" />
        <b>Registrar metodo de pago por pago movil?</b>
        <input type="radio" name="check2" id="check2" value="1" onchange="javascript:showContentt()" />
        <div id="content" style="display: none;">
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
        <div id="content2" style="display: none;">
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

        <div class="d-grid my-2 mx-auto formulario__grupo formulario__btn-centro editarInfo__actualizar">
            <button type="button" class="header__btn btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"> Registrar metodo de pago por transferencia </button>
        </div>

        <div class="d-grid my-2 mx-auto formulario__grupo formulario__btn-centro editarInfo__actualizar">
            <button type="button" class="header__btn btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal1"> Registrar metodo de pago por pago movil </button>
        </div>

        <div class="d-grid my-2 mx-auto formulario__grupo formulario__btn-centro editarInfo__actualizar">
            <button type="button" class="header__btn btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal2"> Registrar metodo de pago personal </button>
        </div>

        <!-- <form action="#" method="POST" class="formulario" id="metodo">

  
            <div class="formulario__grupo" id="grupo__nombre">
                <label for="nombre" class="form-label login__label"> Nombre </label>
                <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" placeholder=". . ." name="nombre" id="nombre">
                    <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                </div>

            </div>

            <div class="formulario__grupo" id="grupo__descripcion">
                <label for="descripcion" class="form-label login__label"> Descripción </label>
                <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" placeholder=". . ." name="descripcion" id="descripcion">
                    <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                </div>
   
            </div>

            <div class="formulario__grupo" id="grupo__nombre">
                <label for="nombre" class="form-label login__label"> Nombre del titular de la cuenta</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" placeholder=". . ." name="titular" id="nombre">
                    <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                </div>

            </div>
            <div class="formulario__grupo" id="grupo__nombre">
                <label for="nombre" class="form-label login__label"> Numero de cuenta </label>
                <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" placeholder=". . ." name="numero_cuenta" id="nombre">
                    <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                </div>

            </div>

      
            <div class="formulario__grupo" id="grupo__nombre">
                <label for="nombre" class="form-label login__label"> Documento de identidad </label>
                <div class="formulario__grupo-input">
                    <input type="text" class="form-control formulario__input" placeholder=". . ." name="cedula" id="nombre">
                    <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                </div>

            </div>

       
            <div class="formulario__grupo" id="grupo__telefono">
                <label for="telefono" class="form-label login__label"> Teléfono </label>
                <div class="formulario__grupo-input">
                    <input type="tel" format="+58 (###) ###-####" class="form-control" placeholder="414 544-5583" name="telefono" id="telefono">
                    <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                </div>

            </div>

        
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

           
        </form> -->
    </section>
</section>

<!-- <script src="vistas/../js/validacion-producto.js"></script> -->
<!-- Modal -->
<?php
include('vistas/modulos/modal/modal-metodo-transferencia.php');
include('vistas/modulos/modal/modal-metodo-pago-movil.php');
include('vistas/modulos/modal/modal-metodo-personal.php');
?>