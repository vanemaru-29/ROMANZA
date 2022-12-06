<?php
    require_once('autoCarga.php');

    class Pago extends Conexion {
        private $ID_p;
        private $id_direccion_p;
        private $id_orden_p;
        private $id_metodo_pago_p;
        private $referencia_p;
        private $imagen_pdt;
        private $estatus_p;
        private $registro_p;

        // constructor
        public function __construct()
        {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conectar();
        }

        // nueva direccion
        public function registroP($id_direccion, $id_orden, $id_metodo_pago, $referencia, $estatus)
        {
            $this->id_direccion_p = $id_direccion;
            $this->id_orden_p = $id_orden;
            $this->id_metodo_pago_p = $id_metodo_pago;
            $this->referencia_p = $referencia;

            $this->estatus_p = $estatus;

            $fecha = new Fechas();
            $fechaActual = $fecha->fechaActual();
            $this->registro_p = $fechaActual;

            $sql = "INSERT INTO pago (id_direccion, id_orden, id_metodo_pago, referencia_p, estatus, fecha_registro) VALUES ('" . $this->id_direccion_p . "', '" . $this->id_orden_p . "', '" . $this->id_metodo_pago_p . "', '" . $this->referencia_p . "', '" . $this->estatus_p . "', '" . $this->registro_p . "')";

            $insertar = $this->conexion->prepare($sql);
            $insertarDatos = $insertar->execute();


            if (isset($insertarDatos)) {
                $redireccion = new Redirecciones();
                $redireccion->misOrdenes();
            } else {
                $errorRegistro = new ErrFormularios();
                $errorRegistro->registro();

                return 0;
            }
        }

        // todas los pagos
        public function listaPagos()
        {
            $sql = mysqli_query($this->conexion, "SELECT * FROM pago");
            return $sql;
        }

        public function listaOrden()
        {

            $sql = mysqli_query($this->conexion, "SELECT *, u.estatus as estatus_p FROM pago o INNER JOIN orden u ON u.id_orden = o.id_orden INNER JOIN direccion d ON d.id_direccion = o.id_direccion INNER JOIN metodo_pago m ON m.id_metodo_pago = o.id_metodo_pago INNER JOIN usuario c ON d.id_usuario = c.id_usuario");
            return $sql;
        }

        public function listaOrdenPendientes() {
            $sql = mysqli_query($this->conexion, "SELECT *, u.estatus as estatus_p FROM pago o INNER JOIN orden u ON u.id_orden = o.id_orden INNER JOIN direccion d ON d.id_direccion = o.id_direccion INNER JOIN metodo_pago m ON m.id_metodo_pago = o.id_metodo_pago INNER JOIN usuario c ON d.id_usuario = c.id_usuario WHERE u.estatus = 'pendiente' OR u.estatus = 'aprobado'");
            return $sql;
        }

        public function factura($orden) {

            $sql = mysqli_query($this->conexion, "SELECT *, u.estatus as estatus_p FROM pago o INNER JOIN orden u ON u.id_orden = o.id_orden INNER JOIN direccion d ON d.id_direccion = o.id_direccion INNER JOIN metodo_pago m ON m.id_metodo_pago = o.id_metodo_pago INNER JOIN usuario c ON d.id_usuario = c.id_usuario WHERE u.id_orden = '$orden'");
            return $sql;
        }

        public function listaOrdenPendientesU() {
            $sql = mysqli_query($this->conexion, "SELECT *, u.estatus as estatus_p FROM pago o INNER JOIN orden u ON u.id_orden = o.id_orden INNER JOIN direccion d ON d.id_direccion = o.id_direccion INNER JOIN metodo_pago m ON m.id_metodo_pago = o.id_metodo_pago INNER JOIN usuario c ON d.id_usuario = c.id_usuario WHERE u.estatus = 'pendiente' OR u.estatus = 'aprobado'");
            return $sql;
        }

        public function listaOrdenAprobadas() {
            $sql = mysqli_query($this->conexion, "SELECT *, u.estatus as estatus_p FROM pago o INNER JOIN orden u ON u.id_orden = o.id_orden INNER JOIN direccion d ON d.id_direccion = o.id_direccion INNER JOIN metodo_pago m ON m.id_metodo_pago = o.id_metodo_pago INNER JOIN usuario c ON d.id_usuario = c.id_usuario WHERE u.estatus = 'enviado'");
            return $sql;
        }

        // obtener pago
        public function obtenerP($ID) {
            $sql = mysqli_query($this->conexion, "SELECT * FROM pago WHERE id_pago = '$ID'");
            return $sql;
        }

        public function misDir($ID) {
            $sql = mysqli_query($this->conexion, "SELECT * FROM pago WHERE id_direccion = '$ID'");
            return $sql;
        }

        // cambiar estatus
        public function estatusP ($ID, $estatus) {
            if ($estatus == "activo") {                        
                $sql = "UPDATE pago SET estatus='inactivo' WHERE id_orden = '$ID'";
                $cambiar = $this->conexion->prepare($sql);
                $ejecutar = $cambiar->execute();
        
                if (isset($ejecutar)) {
                    $respuesta = new Redirecciones();
                    $respuesta->listaP();
                    include $respuesta;
        
                    return 1;
                } else {
                    return 0;
                }
            } else if ($estatus == "inactivo") {
                $estatus = "activo";
                        
                $sql = "UPDATE pago SET estatus='activo' WHERE id_pago = '$ID'";
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

        // cambiar el estado del pago realizado
        public function estatusPagoOrden ($ID, $estatus, $codigo) {
            if ($estatus == "pendiente") {                
                $sql = "UPDATE pago SET estatus='aprobado' WHERE id_pago = '$ID'";
                $cambiar = $this->conexion->prepare($sql);
                $ejecutar = $cambiar->execute();

                if (isset($ejecutar)) {
                    $sql_orden = "UPDATE orden SET estatus='aprobado' WHERE id_orden = '$codigo'";
                    $cambiar_orden = $this->conexion->prepare($sql_orden);
                    $ejecutar_orden = $cambiar_orden->execute();

                    if (isset($ejecutar_orden)) {
                        $respuesta = new Redirecciones();
                        $respuesta->listaP();
                        include $respuesta;

                        return 1;
                    } else {
                        // terminar mensaje
                        // $respuesta = new MsjFormularios();
                        // $respuesta -> ();

                        return 0;
                    }
                } else {
                    // terminar mensaje
                    // $respuesta = new MsjFormularios();
                    // $respuesta -> ();

                    return 0;
                }
            } else {                
                $sql = "UPDATE pago SET estatus='pendiente' WHERE id_pago = '$ID'";
                $cambiar = $this->conexion->prepare($sql);
                $ejecutar = $cambiar->execute();

                if (isset($ejecutar)) {
                    $sql_orden = "UPDATE orden SET estatus='pendiente' WHERE id_orden = '$codigo'";
                    $cambiar_orden = $this->conexion->prepare($sql_orden);
                    $ejecutar_orden = $cambiar_orden->execute();

                    if (isset($ejecutar_orden)) {
                        $respuesta = new Redirecciones();
                        $respuesta->listaP();
                        include $respuesta;

                        return 1;
                    } else {
                        // terminar mensaje
                        // $respuesta = new MsjFormularios();
                        // $respuesta -> ();

                        return 0;
                    }
                } else {
                    // terminar mensaje
                    // $respuesta = new MsjFormularios();
                    // $respuesta -> ();

                    return 0;
                }
            }
        }

        // obtener pago por código de orden
        public function pagoOrden ($id_orden) {
            $sql = mysqli_query($this->conexion, "SELECT * FROM pago WHERE id_orden = '$id_orden'");
            return $sql;
        }
    }
?>