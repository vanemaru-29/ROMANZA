<?php
    require_once ('autoCarga.php');

    class Conversion extends Conexion {
        // private $ID_b;
        private $bolivares;
        private $registro;
        private $edicion;

        // constructor
        public function __construct () {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conectar();
        }

        // obtener datos
        public function equivalenciaBs () {
            $sql = mysqli_query($this->conexion, "SELECT * FROM conversion WHERE id_conversion = 1");
            return $sql;
        }

        // registrar equivalencia
        public function registroConversion($bolivares) {
            $this->bolivares = $bolivares;

            $fecha = new Fechas();
            $fechaActual = $fecha->fechaActual();
            $this->registro = $fechaActual;

            $fechaEdc = new Conversion();
            $fecha_edicion = $fechaEdc->equivalenciaBs();

            while ($resultado = mysqli_fetch_array($fecha_edicion)) {
                if ($resultado['fecha_registro'] != $fechaActual) {
                    $sql = "UPDATE conversion SET bs_equivalencia='".$this->bolivares."', fecha_registro='".$this->registro."' WHERE id_conversion = 1";
                    $editar = $this->conexion->prepare($sql);
                    $insertarDatos = $editar->execute();

                    if (isset($insertarDatos)) {
                        $respuesta = new Redirecciones();
                        $respuesta->precios();

                        return 1;
                    } else {
                        $errorRegistro = new ErrFormularios();
                        $errorRegistro -> editar();

                        return 0;
                    }
                } else {
                    $errEdicion = new ErrFormularios();
                    $errEdicion -> errEdicion();
                    
                    return 0;
                }
            }
        }

        // ¿?
        public function listaM () {
            $sql = mysqli_query($this->conexion, "SELECT * FROM metodo_pago");
            return $sql;
        }
    }
?>