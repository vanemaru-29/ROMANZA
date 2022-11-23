<?php
    require_once ('autoCarga.php');

    class Direcciones extends Conexion {
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

        // nueva direccion
        public function registroD ($direccion, $referencia, $id_usuario) {
            $this->direccion_d = $direccion;
            $this->referencia_d = $referencia;
            $this->id_usuario_d = $id_usuario;

            $fecha = new Fechas();
            $fechaActual = $fecha->fechaActual();
            $this->registro_d = $fechaActual;

            $sql = "INSERT INTO direccion (direccion, referencia, id_usuario, fecha_registro) VALUES ('".$this->direccion_d."', '".$this->referencia_d."', '".$this->id_usuario_d."', '".$this->registro_d."')";
            $insertar = $this->conexion->prepare($sql);
            $insertarDatos = $insertar->execute();

            if (isset($insertarDatos)) {
                $redireccion = new Redirecciones();
                $redireccion -> misDirecciones();
            } else {
                $errorRegistro = new ErrFormularios();
                $errorRegistro -> registro();

                return 0;
            }
        }

        // lista de direcciones
        public function misDir ($ID) {
            $sql = mysqli_query($this->conexion, "SELECT * FROM direccion WHERE id_usuario = '$ID'");
            return $sql;
        }

        // obtener dirección
        public function obtenerDir ($ID_usuario, $ID_dir) {
            $sql = mysqli_query($this->conexion, "SELECT * FROM direccion WHERE id_usuario = '$ID_usuario' AND id_direccion = '$ID_dir'");
            return $sql;
        }

        // editar dirección
        public function editarDir ($ID_d, $direccion, $referencia) {
            $this->ID_d = $ID_d;
            $this->direccion_d = $direccion;
            $this->referencia_d = $referencia;

            $fecha = new Fechas();
            $fechaActual = $fecha->fechaActual();
            $this->registro_d = $fechaActual;

            $sql = "UPDATE direccion SET direccion='".$this->direccion_d."', referencia='".$this->referencia_d."', fecha_registro='".$this->registro_d."' WHERE id_direccion = '".$this->ID_d."'";
            $editar = $this->conexion->prepare($sql);
            $insertarDatos = $editar->execute();

            if (isset($insertarDatos)) {
                $respuesta = new Redirecciones();
                $respuesta->misDirecciones();
                include $respuesta;

                return 1;
            } else {
                $errorRegistro = new ErrFormularios();
                $errorRegistro -> editar();

                return 0;
            }
        }

        // eliminar dirección
        public function eliminarDir ($ID_d) {
            $this->ID_d = $ID_d;

            $sql = "DELETE FROM direccion WHERE id_direccion = '".$this->ID_d."'";
            $eliminar = $this->conexion->prepare($sql);
            $ejecutar = $eliminar->execute();

            if (isset($ejecutar)) {
                $respuesta = new Redirecciones();
                $respuesta->misDirecciones();
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