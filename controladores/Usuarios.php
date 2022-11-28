<?php
require_once('autoCarga.php');

class Usuarios extends Conexion
{
    private $ID_user;
    private $nombre_user;
    private $usuario_user;
    private $telefono_user;
    private $clave_user;
    private $clave_nueva_user;
    private $rol_user;
    private $registro_user;

    // constructor
    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conectar();
    }

    // extraer rol de usuario
    public function consultarRol($nombre_usuario)
    {
        $this->rol_user = $nombre_usuario;
        $sql = mysqli_query($this->conexion, "SELECT * FROM usuario WHERE nombre_usuario = '" . $this->rol_user . "'");

        while ($datos = mysqli_fetch_array($sql)) {
            return $datos['id_rol'];
        }
    }

    // registro de usuario
    public function registroUsuario($nombre, $usuario, $telefono, $clave, $rol)
    {
        $this->nombre_user = $nombre;
        $this->usuario_user = $usuario;
        $this->telefono_user = $telefono;
        $this->clave_user = md5($clave);
        $this->rol_user = $rol;

        $fecha = new Fechas();
        $fechaActual = $fecha->fechaActual();

        $this->registro_user = $fechaActual;

        // nombre de usuario ya existe
        $evaluar_usuario = mysqli_query($this->conexion, "SELECT * FROM usuario WHERE nombre_usuario = '$this->usuario_user'");

        if ($evaluar_usuario->num_rows > 0) {
            $usuarioExiste = new MsjFormularios();
            $usuarioExiste->usuarioExiste();
        } else {
            $sql = "INSERT INTO usuario (nombre, nombre_usuario, telefono, clave, id_rol, fecha_registro) VALUES ('" . $this->nombre_user . "', '" . $this->usuario_user . "', '" . $this->telefono_user . "', '" . $this->clave_user . "', '" . $this->rol_user . "', '" . $this->registro_user . "')";
            $insertar = $this->conexion->prepare($sql);
            $insertarDatos = $insertar->execute();

            if (isset($insertarDatos)) {
                if (!session_id()) session_start();
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

    // lista usuarios
    public function datosUser($usuario)
    {
        $sql = mysqli_query($this->conexion, "SELECT * FROM usuario WHERE nombre_usuario = '$usuario'");
        return $sql;
    }

    // lista usuarios
    public function listaUser()
    {
        $sql = mysqli_query($this->conexion, "SELECT * FROM usuario");
        return $sql;
    }

    // login 
    public function login($usuario, $clave)
    {
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
    public function listaCli()
    {
        $sql = mysqli_query($this->conexion, "SELECT * FROM usuario WHERE id_rol = 3");
        return $sql;
    }

    // obtener usuario
    public function obtenerUser($id_user)
    {
        $sql = mysqli_query($this->conexion, "SELECT * FROM usuario WHERE id_usuario = '$id_user'");
        return $sql;
    }

    // editar información de usuario
    public function editarUser($ID_user, $nombre, $nombre_usuario, $telefono)
    {
        $this->ID_user = $ID_user;
        $this->nombre_user = $nombre;
        $this->usuario_user = $nombre_usuario;
        $this->telefono_user = $telefono;

        $sql = "UPDATE usuario SET nombre='" . $this->nombre_user . "', nombre_usuario='" . $this->usuario_user . "', telefono='" . $this->telefono_user . "' WHERE id_usuario = '" . $this->ID_user . "'";
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

    // editar clave
    public function editarClave($ID_user, $nombre_usuario, $clave, $nueva_clave)
    {
        $this->ID_user = $ID_user;
        $this->usuario_user = $nombre_usuario;
        $this->clave_user = md5($clave);
        $this->clave_nueva_user = md5($nueva_clave);

        $usuario = new Usuarios();
        $datos = $usuario->datosUser($this->usuario_user);
        while ($datos_usuario = mysqli_fetch_array($datos)) {
            $clave_usuario = $datos_usuario['clave'];

            if ($this->clave_user == $clave_usuario) {
                $sql = "UPDATE usuario SET clave='" . $this->clave_nueva_user . "' WHERE id_usuario = '" . $this->ID_user . "'";
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
