<?php
    require_once ('autoCarga.php');
    date_default_timezone_set("America/Caracas");

    class Categorias extends Conexion {
        private $ID_cat;
        private $nombre_cat;
        private $descripcion_cat;
        private $registro_cat;

        // constructor
        public function __construct () {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conectar();
        }

        // nueva categoria
        public function registroCat ($nombre_cat, $descripcion_cat) {
            $this->nombre_cat = $nombre_cat;
            $this->descripcion_cat = $descripcion_cat;

            $fecha = new Fechas();
            $fechaActual = $fecha->fechaActual();
            $this->registro_cat = $fechaActual;
            
            // categoria ya existe
            $evaluar_cat = mysqli_query($this->conexion, "SELECT * FROM categoria WHERE nombre = '$this->nombre_cat'");

            if ($evaluar_cat->num_rows > 0) {
                $catExiste = new MsjFormularios();
                $catExiste -> catExiste();
            } else {
                $sql = "INSERT INTO categoria (nombre, descripcion, fecha_registro) VALUES ('".$this->nombre_cat."', '".$this->descripcion_cat."', '".$this->registro_cat."')";
                $insertar = $this->conexion->prepare($sql);
                $insertarDatos = $insertar->execute();

                if (isset($insertarDatos)) {
                    $respuesta = new Redirecciones();
                    $respuesta->listaCat();
                    include $respuesta;

                    return 1;
                } else {
                    $errorRegistro = new ErrFormularios();
                    $errorRegistro -> registro();

                    return 0;
                }
            }
        }

        // todas las categorias
        public function listaCat () {
            $sql = mysqli_query($this->conexion, "SELECT * FROM categoria");
            return $sql;
        }

        // obtener categoria
        public function obtenerCat ($ID) {
            $sql = mysqli_query($this->conexion, "SELECT * FROM categoria WHERE id_categoria = '$ID'");
            return $sql;
        }

        // editar información de categoria
        public function editarCat ($ID_cat, $nombre_cat, $descripcion_cat) {
            $this->ID_cat = $ID_cat;
            $this->nombre_cat = $nombre_cat;
            $this->descripcion_cat = $descripcion_cat;

            $sql = "UPDATE categoria SET nombre='".$this->nombre_cat."', descripcion='".$this->descripcion_cat."' WHERE id_categoria = '".$this->ID_cat."'";
            $editar = $this->conexion->prepare($sql);
            $insertarDatos = $editar->execute();

            if (isset($insertarDatos)) {
                $respuesta = new Redirecciones();
                $respuesta->listaCat();
                include $respuesta;

                return 1;
            } else {
                $errorRegistro = new ErrFormularios();
                $errorRegistro -> editar();

                return 0;
            }
        }

        // eliminar una categoria
        public function eliminarCat ($ID_cat) {
            $this->ID_cat = $ID_cat;

            $producto = new Productos();
            $datos_producto = $producto->categoriaPdt($ID_cat);
            while ($info_producto = mysqli_fetch_array($datos_producto)) {
                $imagen = $info_producto['id_producto'].".webp";
                if (file_exists("vistas/../publico/activos/pedidos/".$imagen)) {
                    if (unlink("vistas/../publico/activos/pedidos/".$imagen)) {
                        $pdtsCat = "DELETE FROM producto WHERE id_categoria = '".$this->ID_cat."'";
                        $eliminarPdts = $this->conexion->prepare($pdtsCat);
                        $ejecutarPdts = $eliminarPdts->execute();

                        if ($ejecutarPdts) {
                            $sql = "DELETE FROM categoria WHERE id_categoria = '".$this->ID_cat."'";
                            $eliminar = $this->conexion->prepare($sql);
                            $ejecutar = $eliminar->execute();

                            if (isset($ejecutar)) {
                                $respuesta = new Redirecciones();
                                $respuesta->listaCat();
                                include $respuesta;

                                return 1;
                            } else {
                                $errorEliminar = new ErrFormularios();
                                $errorEliminar->eliminar();

                                return 0;
                            }
                        }
                    }
                }
            }
        }
    }
?>