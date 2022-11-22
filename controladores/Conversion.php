<?php
    require_once ('autoCarga.php');
    date_default_timezone_set("America/Caracas");

    class Conversion {
        private $ID_b;
        private $bolivares_c;
        private $registro_c;

        // constructor
        public function __construct () {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conectar();
        }

        // nuevo producto
        public function registroConversion($bolivares) {
            $this->bolivares_c = $bolivares;
            $this->registro_c = date("d/m/Y");

            $sql = "INSERT INTO conversion (bs_equivalencia, fecha_registro) VALUES ('".$this->bolivares_c."', '".$this->registro_c."')";
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
        public function listaM () {
            $sql = mysqli_query($this->conexion, "SELECT * FROM metodo_pago");
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