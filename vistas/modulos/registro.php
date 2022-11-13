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
            <div class="col login-imagen d-none d-lg-block"></div>
            <div class="col p-5">
                <div class="text-end">
                    <img src="vistas/../publico/activos/iconos/icono-oscuro.svg" width="" alt="Logo ROMANZA">
                    <h2 class="fw-bold text-center py-3"> Registrarse </h2>

                    <!-- login -->
                    <form action="index.php?romanza=registro" method="POST">
                       
                        <div class="row">
                            <div class="col mb-3">
                                <label for="usuario" class="form-label login__label"> Nombre de Usuario </label>
                                <input type="text" class="form-control" placeholder="Ingrese un nombre de usuario" name="usuario" id="usuario">
                            </div>
                            <div class="col mb-3">
                                <label for="nombre" class="form-label login__label"> Nombre </label>
                                <input type="text" class="form-control" placeholder="Ingrese su nombre completo" name="nombre" id="nombre">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-4">
                                <label for="telefono" class="form-label login__label"> Telefono </label>
                                <input type="tel" format="+58 (###) ###-####" class="form-control" placeholder="Ingrese el numero de telefono" name="telefono" id="telefono">
                            </div>
                            <div class="col mb-4">
                                <label for="password" class="form-label login__label"> Contraseña </label>
                                <input type="password" class="form-control" placeholder="Ingrese contraseña" name="password" id="password">
                            </div>
                        </div>
                        
                        <div class="d-grid my-5">
                            <button type="submit" class="btn btn-danger" name="registrarse"> REGISTRARSE </button>
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