<?php
    require_once ('autoCarga.php');

    class Pago extends Conexion {
        private $ID_p;
        private $id_direccion_p;
        private $id_orden_p;
        private $id_metodo_pago_p;
        private $referencia_p;
        private $comprobante_p;
        private $estatus_p;
        private $registro_p;

        // constructor
        public function __construct () {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conectar();
        }

        // nueva direccion
        public function registroP ($id_direccion, $id_orden, $id_metodo_pago, $referencia, $comprobante, $estatus) {
            $this->id_direccion_p = $id_direccion;
            $this->id_orden_p = $id_orden;
            $this->id_metodo_pago_p = $id_metodo_pago;
            $this->referencia_p = $referencia;
            $this->comprobante_p = $comprobante;
            $this->estatus_p = $estatus;

            $fecha = new Fechas();
            $fechaActual = $fecha->fechaActual();
            $this->registro_p = $fechaActual;

            $sql = "INSERT INTO pago (id_direccion, id_orden, id_metodo_pago, referencia, comprobante, estatus, fecha_registro) VALUES ('".$this->id_direccion_p."', '".$this->id_orden_p."', '".$this->id_metodo_pago_p."', '".$this->referencia_p."', '".$this->comprobante_p."', '".$this->estatus_p."', '".$this->registro_p."')";

            $insertar = $this->conexion->prepare($sql);
            $insertarDatos = $insertar->execute();

            if (isset($insertarDatos)) {
                $redireccion = new Redirecciones();
                $redireccion -> misOrdenes();
            } else {
                $errorRegistro = new ErrFormularios();
                $errorRegistro -> registro();

                return 0;
            }
        }

        // lista de direcciones
        public function misDir ($ID) {
            $sql = mysqli_query($this->conexion, "SELECT * FROM pago WHERE id_direccion = '$ID'");
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