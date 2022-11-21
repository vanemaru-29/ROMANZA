<?php

if (isset($_POST['submit'])) {
    include('./modelos/conexion.php');
    session_start();

    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $usuario = isset($_POST['nombre_usuario']) ? $_POST['nombre_usuario'] : false;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
    $contrasena = isset($_POST['clave']) ? $_POST['clave'] : false;
    $register_date = date("y/m/d");

    $errores = array();

    if (!empty($nombre) && !is_numeric($nombre)) {
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
    }

    if (!empty($usuario)) {
        $usuario_validado = true;
    } else {
        $usuario_validado  = false;
        $errores['nombre_usuario'] = "El usuario no es valido";
    }

    if (!empty($telefono) && is_numeric($telefono)) {
        $telefono_validado = true;
    } else {
        $telefono_validado = false;
        $errores['telefono'] = "El telefono no es valido";
    }

    if (!empty($contrasena)) {
        $contrasena_validado = true;
    } else {
        $contrasena_validado = false;
        $errores['clave'] = "La contrasena no es valido";
    }

    $guardar_usuario = false;

    if (count($errores) == 0) {
        $guardar_usuario = true;
/*         $contrasena_segura= password_hash($contrasena, PASSWORD_BCRYPT, ['cost' => 4]);
        var_dump(password_verify($contrasena, $contrasena_segura)); */

        $sql = "INSERT INTO usuarios (usuario, nombre, telefono, clave) VALUES ('$usuario', '$nombre', '$telefono', '$contrasena')";

        $guardar = mysqli_query($conn, $sql);

        if($guardar) {
            $_SESSION['completado'] = "El registro de ha completado con exito";
        }else{
            $_SESSION['errores']['general'] = "Fallo al guardar el usuario";
        }


        var_dump($contrasena_segura);
    } else {
        $_SESSION['errores'] = $errores;
    }
    header('controller/../index.php?navigation=login');
}
