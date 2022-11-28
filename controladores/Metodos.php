<?php
    require_once ('autoCarga.php');
    date_default_timezone_set("America/Caracas");

    class Metodos {
        private $ID_mp;
        private $nombre_metodo;
        private $descripcion_metodo;
        private $numero_cuenta_m;
        private $cedula_m;
        private $telefono_m;
        private $titular_m;
        private $estatus_metodo;
        private $registro_metodo;

        // constructor
        public function __construct () {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conectar();
        }

        // nuevo producto
        public function registroMetodo($nombre, $descripcion, $numero_cuenta, $cedula, $telefono, $estatus, $titular) {
            $this->nombre_metodo = $nombre;
            $this->descripcion_metodo = $descripcion;
            $this->numero_cuenta_m = $numero_cuenta;
            $this->cedula_m = $cedula;
            $this->telefono_m = $telefono;
            $this->estatus_metodo = $estatus;
            $this->titular_m = $titular;


            $fecha = new Fechas();
            $fechaActual = $fecha->fechaActual();

            $this->registro_metodo = $fechaActual;

            $sql = "INSERT INTO metodo_pago (nombre, descripcion, numero_cuenta, cedula, telefono, fecha_registro, estatus, titular) VALUES ('".$this->nombre_metodo."', '".$this->descripcion_metodo."', '".$this->numero_cuenta_m."', '".$this->cedula_m."', '".$this->telefono_m."','".$this->registro_metodo."', '".$this->estatus_metodo."', '".$this->titular_m."')";
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
        
        // lista usuarios
        public function metodo ($id_metodo) {
            $sql = mysqli_query($this->conexion, "SELECT * FROM metodo_pago WHERE id_metodo_pago = '$id_metodo'");
            return $sql;
        }

        // todos los productos activos
        public function activosPdt () {
            $sql = mysqli_query($this->conexion, "SELECT * FROM producto WHERE estatus = 'activo'");
            return $sql;
        }

        // cambiar estatus
        public function estatusM ($ID, $estatus) {
            if ($estatus == "activo") {
                
                $sql = "UPDATE metodo_pago SET estatus='inactivo' WHERE id_metodo_pago = '$ID'";
                $cambiar = $this->conexion->prepare($sql);
                $ejecutar = $cambiar->execute();

                if (isset($ejecutar)) {
                    $respuesta = new Redirecciones();
                    $respuesta->listaM();
                    include $respuesta;

                    return 1;
                } else {
                    return 0;
                }
            } else if ($estatus == "inactivo") {
                $estatus = "activo";
                
                $sql = "UPDATE metodo_pago SET estatus='activo' WHERE id_metodo_pago = '$ID'";
                $cambiar = $this->conexion->prepare($sql);
                $ejecutar = $cambiar->execute();

                if (isset($ejecutar)) {
                    $respuesta = new Redirecciones();
                    $respuesta->listaM();
                    include $respuesta;

                    return 1;
                } else {
                    return 0;
                }
            }            
        }

        // obtener producto
        public function obtenerM ($ID) {
            $sql = mysqli_query($this->conexion, "SELECT * FROM metodo_pago WHERE id_metodo_pago = '$ID'");
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

              // eliminar una categoria
              public function eliminarM ($ID_mp) {
                $this->ID_mp = $ID_mp;
    
                $sql = "DELETE FROM metodo_pago WHERE id_metodo_pago = '".$this->ID_mp."'";
                $eliminar = $this->conexion->prepare($sql);
                $ejecutar = $eliminar->execute();
    
                if (isset($ejecutar)) {
                    $respuesta = new Redirecciones();
                    $respuesta->listaM();
                    include $respuesta;
    
                    return 1;
                } else {
                    $errorEliminar = new ErrFormularios();
                    $errorEliminar->eliminar();
    
                    return 0;
                }
            }
    }
?>