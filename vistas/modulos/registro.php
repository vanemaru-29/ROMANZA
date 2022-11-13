<?php 
require './controladores/registrar-usuario.php';


/* $message = '';

if(!empty($_POST['usuario'] && $_POST['nombre'] && $_POST['telefono'] && $_POST['password'])) {

    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : false;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
    $contrasena = isset($_POST['password']) ? $_POST['password'] : false;
    $register_date = date("y/m/d");

    $sql =  "INSERT INTO usuarios (usuario, nombre, telefono, clave) VALUES ('$usuario', '$nombre', '$telefono', '$contrasena')";
    $stmt = $conn->prepare($sql);


    $stmt->bind_param(':nombre', $_POST['usuario']);
    $stmt->bind_param(':nombre_usuario', $_POST['nombre_usuario']);
    $stmt->bind_param(':telefono', $_POST['telefono']);
    $password = password_hash($_POST['passsword'], PASSWORD_BCRYPT);
    $stmt->bind_param(':passsword', $_POST['password']);


    if($stmt->execute()) {
        $message = "Registro exitoso";
    }else {
        $message = "Ha ocurrido un error intente de nuevo";
    }
} */

?>
<section class="w-100 vh-100 d-flex justify-content-center align-items-center">
    <section class="login__cont container bg-white shadow">
        <div class="row">
            <div class="col registro-imagen d-none d-lg-block"></div>

            <div class="col p-5">
                <div class="text-end">
                    <img src="vistas/../publico/activos/iconos/icono-oscuro.svg" width="" alt="Logo ROMANZA">
                    <h2 class="fw-bold text-center py-3"> Registrarse </h2>

                    <!-- registro -->
                    <form action="index.php?romanza=registro" method="POST" class="formulario formulario-registro" id="registro-cliente">
                        <!-- Grupo: Nombre -->
                        <div class="formulario__grupo" id="grupo__nombre">
                            <label for="nombre" class="form-label login__label"> Nombre </label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input" placeholder="Vanessa Barboza" name="nombre" id="nombre">
                                <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                            </div>
                            <p class="formulario__input-error m-2">Este campo sólo admite letras y espacios, debe ser mayor a 8 caracteres.</p>
                        </div>

                        <!-- Grupo: Nombre de Usuario -->
                        <div class="formulario__grupo" id="grupo__nombre_usuario">
                            <label for="nombre_usuario" class="form-label login__label"> Nombre de Usuario </label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control" placeholder="Vanemaru29" name="nombre_usuario" id="nombre_usuario">
                                <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                            </div>
                            <p class="formulario__input-error m-2">Este campo contiene caracteres no admitidos, debe ser mayor a 8 caracteres.</p>
                        </div>
                            
                        <!-- Grupo: Teléfono -->
                        <div class="formulario__grupo" id="grupo__telefono">
                            <label for="telefono" class="form-label login__label"> Teléfono </label>
                            <div class="formulario__grupo-input">
                                <input type="tel" format="+58 (###) ###-####" class="form-control" placeholder="414 544-5583" name="telefono" id="telefono">
                                <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                            </div>
                            <p class="formulario__input-error m-2">Este campo sólo admite números, debe ingresarse un teléfono válido.</p>
                        </div>
                            
                        <!-- Grupo: Contraseña -->
                        <div class="formulario__grupo" id="grupo__clave">
                            <label for="clave" class="form-label login__label"> Contraseña </label>
                            <div class="formulario__grupo-input">
                                <input type="password" class="form-control" placeholder="Ingrese una contraseña" name="clave" id="clave">
                                <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                            </div>
                            <p class="formulario__input-error m-2">Este campo debe contener de 6 a 12 caracteres.</p>
                        </div>
                        
                        <div class="d-grid m-2 formulario__grupo formulario__grupo-btn-enviar">
                            <button type="submit" name="submit" class="formulario__btn btn btn-danger"> REGISTRARSE </button>
                        </div>
             <?php if(!empty($message)): ?>
                <p><?=$message ?></p>
                <?php endif;?>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>

<script src="vistas/../js/validacion-registro.js"></script>