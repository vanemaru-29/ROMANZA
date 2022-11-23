<?php
    require_once ('autoCarga.php');

    class Usuarios {
        private $nombre_user;
        private $usuario_user;
        private $telefono_user;
        private $clave_user;
        private $rol_user;
        private $registro_user;

        // constructor
        public function __construct () {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conectar();
        }

        // extraer rol de usuario
        public function consultarRol ($nombre_usuario) {
            $this->rol_user = $nombre_usuario;
            $sql = mysqli_query($this->conexion, "SELECT * FROM usuario WHERE nombre_usuario = '".$this->rol_user."'");

            while ($datos = mysqli_fetch_array($sql)) {
                return $datos['id_rol'];
            }
        }

        // registro de usuario
        public function registroUsuario($nombre, $usuario, $telefono, $clave, $rol) {
            $this->nombre_user = $nombre;
            $this->usuario_user = $usuario;
            $this->telefono_user = $telefono;
            $this->clave_user = md5($clave);
            $this->rol_user = $rol;    

            $fecha = new Fechas();
            $fechaActual = $fecha->fechaActual();

            $this->registro_user = $fechaActual;

            $sql = "INSERT INTO usuario (nombre, nombre_usuario, telefono, clave, id_rol, fecha_registro) VALUES ('".$this->nombre_user."', '".$this->usuario_user."', '".$this->telefono_user."', '".$this->clave_user."', '".$this->rol_user."', '".$this->registro_user."')";
            $insertar = $this->conexion->prepare($sql);
            $insertarDatos = $insertar->execute();

            if (isset($insertarDatos)) {
                if (!session_id()) session_start();
                $_SESSION['usuario'] = $this->usuario_user;
                            
                $usuario = new Usuarios();
                $rol = $usuario->consultarRol($this->usuario_user);

                $_SESSION['rol'] = $rol;
                            
                $pedidos = new Redirecciones();
                $pedidos->pedidos();
            } else {
                $errorRegistro = new ErrFormularios();
                $errorRegistro -> registro();

                return 0;
            }
        }

        // login
        public function login ($usuario, $clave) {
            $this->usuario_user = $usuario;
            $this->clave_user = md5($clave);

            $sql = "SELECT * FROM usuario WHERE nombre_usuario = '".$this->usuario_user."' AND clave = '".$this->clave_user."'";
            $consultar = $this->conexion->prepare($sql);
            $ejecutar = $consultar->execute();

            if (isset($ejecutar)) {
                if (!session_id()) session_start();
                $_SESSION['usuario'] = $this->usuario_user;
                                
                $usuario = new Usuarios();
                $rol = $usuario->consultarRol($this->usuario_user);

                $_SESSION['rol'] = $rol;
                                
                $pedidos = new Redirecciones();
                $pedidos->pedidos();
            } else {
                $loginErr = new ErrFormularios();
                $loginErr -> login();
            }
        }
    }
?>