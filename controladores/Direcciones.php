<?php
    require_once ('autoCarga.php');

    class Direcciones {
        private $ID_d;
        private $direccion_d;
        private $referencia_d;
        private $id_usuario_d;
        private $registro_d;

        // constructor
        public function __construct () {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conectar();
        }

        // nuevo producto
        public function registroDirecccion($direccion, $referencia, $id_usuario) {
            $this->direccion_d = $direccion;
            $this->referencia_d = $referencia;
            $this->id_usuario_d = $id_usuario;


            $fecha = new Fechas();
            $fechaActual = $fecha->fechaActual();

            $this->registro_d = $fechaActual;

            $sql = "INSERT INTO direccion (direccion, referencia, id_usuario, fecha_registro) VALUES ('".$this->direccion_d."', '".$this->referencia_d."', '".$this->precio_pdt."', '".$this->id_usuario_d."', '".$this->registro_d."')";
            $insertar = $this->conexion->prepare($sql);
            $insertarDatos = $insertar->execute();

            if (isset($insertarDatos)) {
                $ultimo_id = mysqli_insert_id($this->conexion);
                $this->imagen_pdt['name'] = $ultimo_id;

                // crear directorio
                // if (!is_dir(filename: "vistas/../publico/activos/pedidos")) {
                //     mkdir(pathname: "vistas/../publico/activos/pedidos", mode: 0777);
                // }

                // mover a directorio


                $sql_imagen = "UPDATE producto SET imagen='".$this->imagen_pdt['name'].'.webp'."' WHERE id_producto = '$ultimo_id'";
                $guardar_img = $this->conexion->prepare($sql_imagen);
                $insertar_img = $guardar_img->execute();
                
                if (isset($insertar_img)) {
                    $respuesta = new Redirecciones();
                    $respuesta->listaPdt();
                    include $respuesta;

                    return 1;
                } else {
                    $errorRegistro = new ErrFormularios();
                    $errorRegistro -> registro();

                    return 0;
                }
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

        public function imagenPdt ($img) {
            $imagen = "vistas/../publico/activos/pedidos/".$img;
            return $imagen;
        }

        // editar información de producto
        public function editarPdt ($ID, $nombre, $descripcion, $precio, $categoria, $imagen) {
            $this->ID_pdt = $ID;
            $this->nombre_pdt = $nombre;
            $this->descripcion_pdt = $descripcion;
            $this->precio_pdt = $precio;
            $this->categoria_pdt = $categoria;
            $this->imagen_pdt = $imagen;

            $fecha = new Fechas();
            $fechaActual = $fecha->fechaActual();
            $this->registro_pdt = $fechaActual;

            if ($this->imagen_pdt['name'] == "") {
                $sql = "UPDATE producto SET nombre='".$this->nombre_pdt."', descripcion='".$this->descripcion_pdt."', precio='".$this->precio_pdt."', id_categoria='".$this->categoria_pdt."', fecha_registro='".$this->registro_pdt."' WHERE id_producto = '".$this->ID_pdt."'";
                $editar = $this->conexion->prepare($sql);
                $insertarDatos = $editar->execute();
            } else {
                $this->imagen_pdt['name'] = $ID.".webp";

                // cambiar imagen en directorio
                if (file_exists("vistas/../publico/activos/pedidos/".$ID.".webp")) {
                    if (unlink("vistas/../publico/activos/pedidos/".$ID.".webp")) {
                        move_uploaded_file($this->imagen_pdt['tmp_name'], 'vistas/../publico/activos/pedidos/'.$this->imagen_pdt['name']);
                    }
                }

                $sql = "UPDATE producto SET nombre='".$this->nombre_pdt."', descripcion='".$this->descripcion_pdt."', precio='".$this->precio_pdt."', id_categoria='".$this->categoria_pdt."', imagen='".$this->imagen_pdt['name']."', fecha_registro='".$this->registro_pdt."' WHERE id_producto = '".$this->ID_pdt."'";
                $editar = $this->conexion->prepare($sql);
                $insertarDatos = $editar->execute();
            }

            if (isset($insertarDatos)) {
                $respuesta = new Redirecciones();
                $respuesta->listaPdt();
                include $respuesta;

                return 1;
            } else {
                $errorRegistro = new ErrFormularios();
                $errorRegistro -> editar();

                return 0;
            }
        }

        // eliminar un producto
        public function eliminarPdt ($ID) {
            $this->ID_pdt = $ID;

            $imagen = $ID.".webp";

            // eliminando la imagen del directorio
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