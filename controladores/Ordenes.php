<?php
    require_once ('autoCarga.php');

    class Ordenes extends Conexion {
        private $cogido_od;

        // constructor
        public function __construct () {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conectar();
        }

        public function obtenerO($ID)
        {
            $sql = mysqli_query($this->conexion, "SELECT * FROM orden WHERE id_orden = '$ID'");
            return $sql;
        }

        // todas las ordenes
        public function listaOrdenes () {
            $sql = mysqli_query($this->conexion, "SELECT * FROM orden");
            return $sql;
        }

         // cambiar estatus
         public function estatusOrden ($ID, $estatus) {
            if ($estatus == "pendiente") {
                
                $sql = "UPDATE orden SET estatus='aprobado' WHERE id_orden = '$ID'";
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
            }  else if ($estatus == "aprobado") {
                $estatus = "enviado";
                
                $sql = "UPDATE orden SET estatus='enviado' WHERE id_orden = '$ID'";
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
            }       
        }

        // no trae la fecha de la orden
        public function listaOrden () {
            $sql = mysqli_query($this->conexion, "SELECT * FROM orden o LEFT OUTER JOIN usuario u ON u.id_usuario = o.id_usuario ");
            return $sql;
        }
        
        // lista usuarios
        public function orden ($id_orden) {
            $sql = mysqli_query($this->conexion, "SELECT * FROM orden WHERE id_orden = '$id_orden'");
            return $sql;
        }

        // obtener ordenes segun usuario
        public function obtenerOrdenes ($id_usuario) {
            $sql = mysqli_query($this->conexion, "SELECT * FROM orden WHERE id_usuario = '$id_usuario'");
            return $sql;
        }
    }
