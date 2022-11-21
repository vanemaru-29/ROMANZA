<?php
    require_once ('autoCarga.php');
    date_default_timezone_set("America/Caracas");

    class Metodos {
        private $ID_pdt;
        private $nombre_metodo;
        private $descripcion_metodo;
        private $estatus_metodo;
        private $registro_metodo;

        // constructor
        public function __construct () {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conectar();
        }

        // nuevo producto
        public function registroMetodo($nombre, $descripcion, $estatus) {
            $this->nombre_metodo = $nombre;
            $this->descripcion_metodo = $descripcion;
            $this->estatus_metodo = $estatus;
            $this->registro_metodo = date("d/m/Y");

            $sql = "INSERT INTO metodo_pago (nombre, info,  fecha_registro) VALUES ('".$this->nombre_metodo."', '".$this->descripcion_metodo."', '".$this->registro_metodo."', '".$this->estatus_metodo."')";
            $insertar = $this->conexion->prepare($sql);
            $insertarDatos = $insertar->execute();

            if (isset($insertarDatos)) {
                $ultimo_id = mysqli_insert_id($this->conexion);
              
                // crear directorio
          /*       if (!is_dir(filename: "vistas/../publico/activos/pedidos")) {
                    mkdir(pathname: "vistas/../publico/activos/pedidos", mode: 0777);
                } */
            } else {
                $errorRegistro = new ErrFormularios();
                $errorRegistro -> registro();

                return 0;
            }
        }

        // todos los productos
        public function listaPdt () {
            $sql = mysqli_query($this->conexion, "SELECT * FROM producto");
            return $sql;
        }
        
        // todos los productos activos
        public function activosPdt () {
            $sql = mysqli_query($this->conexion, "SELECT * FROM producto WHERE estatus = 'activo'");
            return $sql;
        }

        // cambiar estatus
        public function estatusPdt ($ID, $estatus) {
            if ($estatus == "activo") {
                
                $sql = "UPDATE producto SET estatus='inactivo' WHERE id_producto = '$ID'";
                $cambiar = $this->conexion->prepare($sql);
                $ejecutar = $cambiar->execute();

                if (isset($ejecutar)) {
                    $respuesta = new Redirecciones();
                    $respuesta->listaPdt();
                    include $respuesta;

                    return 1;
                } else {
                    return 0;
                }
            } else if ($estatus == "inactivo") {
                $estatus = "activo";
                
                $sql = "UPDATE producto SET estatus='activo' WHERE id_producto = '$ID'";
                $cambiar = $this->conexion->prepare($sql);
                $ejecutar = $cambiar->execute();

                if (isset($ejecutar)) {
                    $respuesta = new Redirecciones();
                    $respuesta->listaPdt();
                    include $respuesta;

                    return 1;
                } else {
                    return 0;
                }
            }            
        }

        // obtener producto
        public function obtenerPdt ($ID) {
            $sql = mysqli_query($this->conexion, "SELECT * FROM producto WHERE id_producto = '$ID'");
            return $sql;
        }

        // editar información de producto
        public function editarPdt ($ID, $nombre, $descripcion, $precio, $categoria) {
            $this->ID_pdt = $ID;
            $this->nombre_pdt = $nombre;
            $this->descripcion_pdt = $descripcion;
            $this->precio_pdt = $precio;
            $this->categoria_pdt = $categoria;

            $this->registro_pdt = date("d/m/Y");

            var_dump($this->categoria_pdt);
        }

        // eliminar un producto
        public function eliminarPdt ($ID) {
            $this->ID_pdt = $ID;

            $imagen = $ID.".webp";

            if (file_exists("vistas/../publico/activos/pedidos/".$imagen)) {
                if (unlink("vistas/../publico/activos/pedidos/".$imagen)) {
                    $sql = "DELETE FROM producto WHERE id_producto = '".$this->ID_pdt."'";
                    $eliminar = $this->conexion->prepare($sql);
                    $ejecutar = $eliminar->execute();

                    if (isset($ejecutar)) {
                        $respuesta = new Redirecciones();
                        $respuesta->listaPdt();
                        include $respuesta;

                        return 1;
                    } else {
                        $errorEliminar = new ErrFormularios();
                        $errorEliminar->eliminar();

                        return 0;
                    }
                } else {
                    $errorEliminar = new ErrFormularios();
                    $errorEliminar->eliminar();
                }
            }
        }
    }
?>