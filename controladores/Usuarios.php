<?php
require_once('autoCarga.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

class Usuarios extends Conexion {
    private $ID_user;
    private $nombre_user;
    private $usuario_user;
    private $telefono_user;
    private $correo_user;
    private $clave_user;
    private $clave_nueva_user;
    private $rol_user;
    private $registro_user;

    private $asunto;
    private $mensaje;

    // constructor
    public function __construct() {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conectar();
    }

    // extraer rol de usuario
    public function consultarRol($nombre_usuario) {
        $this->rol_user = $nombre_usuario;
        $sql = mysqli_query($this->conexion, "SELECT * FROM usuario WHERE nombre_usuario = '" . $this->rol_user . "'");

        while ($datos = mysqli_fetch_array($sql)) {
            return $datos['id_rol'];
        }
    }

    // registro de usuario
    public function registroUsuario($nombre, $usuario, $telefono, $correo, $clave, $rol) {
        $this->nombre_user = $nombre;
        $this->usuario_user = $usuario;
        $this->telefono_user = $telefono;
        $this->correo_user = $correo;
        $this->clave_user = md5($clave);
        $this->rol_user = $rol;

        $fecha = new Fechas();
        $fechaActual = $fecha->fechaActual();

        $this->registro_user = $fechaActual;

        // nombre de usuario ya existe
        $evaluar_usuario = mysqli_query($this->conexion, "SELECT * FROM usuario WHERE nombre_usuario = '$this->usuario_user'");
        // correo ya existe
        $evaluar_correo = mysqli_query($this->conexion, "SELECT * FROM usuario WHERE correo = '$this->correo_user'");
        // telefono ya existe
        $evaluar_tlfn = mysqli_query($this->conexion, "SELECT * FROM usuario WHERE telefono = '$this->telefono_user'");

        if ($evaluar_usuario->num_rows > 0) {
            $usuarioExiste = new MsjFormularios();
            $usuarioExiste->usuarioExiste();
        } else if ($evaluar_correo->num_rows > 0) {
            $correoExiste = new MsjFormularios();
            $correoExiste->correoExiste();
        } else if ($evaluar_tlfn->num_rows > 0) {
            $tlfnExiste = new MsjFormularios();
            $tlfnExiste->tlfnExiste();
        } else {
            $sql = "INSERT INTO usuario (nombre, nombre_usuario, telefono, correo, clave, id_rol, fecha_registro) VALUES ('" . $this->nombre_user . "', '" . $this->usuario_user . "', '" . $this->telefono_user . "', '".$this->correo_user."', '" . $this->clave_user . "', '" . $this->rol_user . "', '" . $this->registro_user . "')";
            $insertar = $this->conexion->prepare($sql);
            $insertarDatos = $insertar->execute();

            $usuario = new Usuarios();
            $datos = $usuario->datosUser($this->usuario_user);
            while ($datos_usuario = mysqli_fetch_array($datos)) {
                if (isset($insertarDatos)) {
                    if (!session_id()) session_start();
                    $_SESSION['id_usuario'] = $datos_usuario['id_usuario'];
                    $_SESSION['nombre_usuario'] = $this->usuario_user;
            
                    $usuario = new Usuarios();
                    $rol = $usuario->consultarRol($this->usuario_user);
            
                    $_SESSION['id_rol'] = $rol;
            
                    $pedidos = new Redirecciones();
                    $pedidos->pedidos();
                } else {
                    $errorRegistro = new ErrFormularios();
                    $errorRegistro->registroAlerta();
            
                    return 0;
                }
            }
        }
    }

    // buscar datos de clientes segun su correo
    public function userDatosCorreo ($correo) {
        $sql = mysqli_query($this->conexion, "SELECT * FROM usuario WHERE correo = '$correo'");
        return $sql;
    }

    // recuperar clave
    public function recuperarClave ($correo) {
        $this->correo_user = trim($correo);
        
        // correo ya existe
        $evaluar_correo = mysqli_query($this->conexion, "SELECT * FROM usuario WHERE correo = '$this->correo_user'");
        if ($evaluar_correo->num_rows > 0) {
            $userDatosCorreo = new Usuarios();
            $correoU = $userDatosCorreo -> userDatosCorreo($this->correo_user);

            while ($datos_usuario = mysqli_fetch_array($correoU)) {
                // crear clave temporal
                $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
                $key = '';
                $longitud = 8;
                for ($i=0; $i < $longitud; $i++) {
                    $key.=substr($pattern,rand(0, 64), 1);
                }
                $tmp_clave = $key;
                $md5_clave = md5($key);
        
                $sql_clave = "UPDATE usuario SET clave = '$md5_clave' WHERE correo = '".$this->correo_user."'";
                $insertar = $this->conexion->prepare($sql_clave);
                $insertarClave = $insertar->execute();
        
                if ($insertarClave) {
                    $destino = $this->correo_user;

                    //Create instancia de PHPMailer
                    $mail = new PHPMailer(true);
                    try {
                        // configuración sel servidor
                        $mail->isSMTP();
                        $mail->Host       = 'smtp.gmail.com';
                        $mail->SMTPAuth   = true;
                        $mail->Username   = 'romanza.restaurante2022@gmail.com';
                        $mail->Password   = 'ltonjmzafblioobi';
                        $mail->Port       = 587;

                        // información para el envío de correos
                        $mail->setFrom('romanza.restaurante2022@gmail.com', 'Romanza Restaurante');
                        $mail->addAddress($destino, $datos_usuario['nombre_usuario']);

                        //Content
                        $mail->isHTML(true);
                        $mail->Subject = utf8_decode('Recuperar Contraseña - ROMANZA');
                        $mail->Body =  '<p>Se ha generado una contraseña temporal.</p>
                                        <p>Se recomienda al ingresar, editar nuevamente su contraseña.</p>
                                        <p>Sus datos de inicio de sesión son los siguientes:</p>
                                        <p>Nombre de Usuario: <b>'.$datos_usuario['nombre_usuario'].'</b></p>
                                        <p>Contraseña: <b>'.$tmp_clave.'</b></p>';

                        $mail->send();
                        
                        $mensaje = new MsjFormularios();
                        $mensaje -> mensajeEnviado();
                    } catch (Exception $e) {
                        $formError = new ErrFormularios();
                        $formError -> formError();                        
                        echo "¡Atención! {$mail->ErrorInfo}";
                    }
                } else {
                    $formError = new ErrFormularios();
                    $formError -> formError();
                        
                    return 0;
                }
            }
        } else {
            $correoError = new ErrFormularios();
            $correoError -> correoError();
        
            return 0;
        }
    }

    // lista usuarios
    public function datosUser($usuario) {
        $sql = mysqli_query($this->conexion, "SELECT * FROM usuario WHERE nombre_usuario = '$usuario'");
        return $sql;
    }

    // lista usuarios
    public function listaUser() {
        $sql = mysqli_query($this->conexion, "SELECT * FROM usuario");
        return $sql;
    }

    // login 
    public function login($usuario, $clave) {
        $this->usuario_user = $usuario;
        $this->clave_user = md5($clave);

        $usuario = new Usuarios();
        $datos = $usuario->datosUser($this->usuario_user);
        while ($datos_usuario = mysqli_fetch_array($datos)) {
            $clave_usuario = $datos_usuario['clave'];

            if ($this->clave_user == $clave_usuario) {
                $sql = "SELECT * FROM usuario WHERE nombre_usuario = '" . $this->usuario_user . "' AND clave = '" . $this->clave_user . "'";
                $consultar = $this->conexion->prepare($sql);
                $ejecutar = $consultar->execute();

                if (isset($ejecutar)) {
                    if (!session_id()) session_start();
                    $_SESSION['id_usuario'] = $datos_usuario['id_usuario'];
                    $_SESSION['nombre_usuario'] = $this->usuario_user;

                    $usuario = new Usuarios();
                    $rol = $usuario->consultarRol($this->usuario_user);

                    $_SESSION['id_rol'] = $rol;

                    $pedidos = new Redirecciones();
                    $pedidos->pedidos();

                    return 1;
                } else {
                    $loginErr = new ErrFormularios();
                    $loginErr->login();

                    return 0;
                }
            } else {
                $loginErr = new ErrFormularios();
                $loginErr->datosLogin();

                return 0;
            }
        }
    }

    // lista de clientes
    public function listaCli() {
        $sql = mysqli_query($this->conexion, "SELECT * FROM usuario WHERE id_rol = 3");
        return $sql;
    }

    // obtener usuario
    public function obtenerUser($id_user) {
        $sql = mysqli_query($this->conexion, "SELECT * FROM usuario WHERE id_usuario = '$id_user'");
        return $sql;
    }

    // editar información de usuario
    public function editarUser ($ID_user, $nombre, $nombre_usuario, $correo, $telefono) {
        $this->ID_user = $ID_user;
        $this->nombre_user = $nombre;
        $this->usuario_user = $nombre_usuario;
        $this->correo_user = $correo;
        $this->telefono_user = $telefono;

        $obtenerUser = new Usuarios();
        $datos_usuario = $obtenerUser -> obtenerUser($this->ID_user);
        while ($info_usuario = mysqli_fetch_array($datos_usuario)) {
            // nombre de usuario ya existe
            $evaluar_usuario = mysqli_query($this->conexion, "SELECT * FROM usuario WHERE nombre_usuario = '$this->usuario_user'");
            // correo ya existe
            $evaluar_correo = mysqli_query($this->conexion, "SELECT * FROM usuario WHERE correo = '$this->correo_user'");
            // telefono ya existe
            $evaluar_tlfn = mysqli_query($this->conexion, "SELECT * FROM usuario WHERE telefono = '$this->telefono_user'");

            if ($evaluar_usuario->num_rows > 0 && $this->usuario_user != $info_usuario['nombre_usuario']) {
                $usuarioExiste = new MsjFormularios();
                $usuarioExiste->usuarioExiste();
            } else if ($evaluar_correo->num_rows > 0 && $this->correo_user != $info_usuario['correo']) {
                $correoExiste = new MsjFormularios();
                $correoExiste->correoExiste();
            } else if ($evaluar_tlfn->num_rows > 0 && $this->telefono_user != $info_usuario['telefono']) {
                $tlfnExiste = new MsjFormularios();
                $tlfnExiste->tlfnExiste();
            } else {
                $sql = "UPDATE usuario SET nombre='".$this->nombre_user."', nombre_usuario='".$this->usuario_user."', correo='".$this->correo_user."', telefono='".$this->telefono_user."' WHERE id_usuario = '".$this->ID_user."'";
                $editar = $this->conexion->prepare($sql);
                $insertarDatos = $editar->execute();

                if (isset($insertarDatos)) {
                    $_SESSION['nombre_usuario'] = $this->usuario_user;

                    $respuesta = new Redirecciones();
                    $respuesta->miCuenta();
                    include $respuesta;

                    return 1;
                } else {
                    $errorRegistro = new ErrFormularios();
                    $errorRegistro->editar();

                    return 0;
                }
            }
        }
    }

    // editar clave
    public function editarClave ($ID_user, $nombre_usuario, $clave, $nueva_clave) {
        $this->ID_user = $ID_user;
        $this->usuario_user = $nombre_usuario;
        $this->clave_user = md5($clave);
        $this->clave_nueva_user = md5($nueva_clave);

        $usuario = new Usuarios();
        $datos = $usuario->datosUser($this->usuario_user);
        while ($datos_usuario = mysqli_fetch_array($datos)) {
            $clave_usuario = $datos_usuario['clave'];

            if ($this->clave_user == $clave_usuario) {
                $sql = "UPDATE usuario SET clave='".$this->clave_nueva_user."' WHERE id_usuario = '" . $this->ID_user . "'";
                $editar = $this->conexion->prepare($sql);
                $insertarDatos = $editar->execute();

                if (isset($insertarDatos)) {
                    $respuesta = new Redirecciones();
                    $respuesta->miCuenta();
                    include $respuesta;

                    return 1;
                } else {
                    $errorRegistro = new ErrFormularios();
                    $errorRegistro->editar();

                    return 0;
                }
            } else {
                $errorRegistro = new ErrFormularios();
                $errorRegistro->errClave();

                return 0;
            }
        }
    }

    // eliminar cuenta ¿?
}