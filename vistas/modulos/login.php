<?php 
require './modelos/conexion.php';
session_start();

if(!empty($_POST['usuario']) && !empty($_POST['password'])) {
    $data = $conn->prepare('SELECT usuario, clave FROM usuarios WHERE usuario:usuario');
    $data->bind_param(":usuario", $_POST['usuario']);
    $data->execute();
    $result = $data->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if(count($result) > 0 && password_verify($_POST['password'], $result['password'])) {
        $_SESSION['usuario'] = $result['usuario'];
        header('./menu.html');
        $message = "Credenciales correctas";
    }else {
        $message = "Credenciales incorrectas";
    }
}
?>
<section class="w-100 vh-100 d-flex justify-content-center align-items-center">
    <section class="login__cont container bg-white shadow">
        <div class="row">
            <div class="col login-imagen d-none d-lg-block"></div>
            <div class="col p-5">
                <div class="text-end">
                    <img src="vistas/../publico/activos/iconos/icono-oscuro.svg" width="" alt="Logo ROMANZA">
                    <h2 class="fw-bold text-center py-5" > Iniciar Sesión </h2>

                    <!-- login -->
                    <form action="#" method="POST">
                        <div class="mb-4">
                            <label for="username" class="form-label login__label"> Nombre de Usuario </label>
                            <input type="text" class="form-control" placeholder="Ingrese un nombre de usuario" name="username" id="username">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label login__label"> Contraseña </label>
                            <input type="password" class="form-control" placeholder="Ingrese contraseña" name="password" id="password">
                        </div>
                        <div class="d-grid my-5">
                            <button type="submit" class="btn btn-danger"> INGRESAR </button>
                        </div>
                        <?php if(!empty($message)):?>
                            <p><?= $message?></p>
                           <?php endif;?> 
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>