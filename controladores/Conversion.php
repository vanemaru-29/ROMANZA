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

        // calcular tienpo de edicion de equivalencia
        public function fechaEdc ($edicion) {
            $this->edicion = $edicion;

            $conversion = new Conversion();
            $datos = $conversion -> equivalenciaBs();

            $fecha = new Fechas();
            while ($datos_conversion = mysqli_fetch_array($datos)) {
                $fechaEdc = $fecha -> fechaFormato($datos_conversion['fecha_registro']);
                $this->registro = $fechaEdc;
            }

            if ($this->registro == $this->edicion) {
                $errEdicion = new ErrFormularios();
                $errEdicion -> errEdicion();

                return 0;
            } else {
                
                return 1;
            }
        }

        // registrar equivalencia
        public function registroConversion($bolivares) {
            $this->bolivares = $bolivares;

            $fecha = new Fechas();
            $fechaActual = $fecha->fechaActual();
            $this->registro = $fechaActual;

            $evaluarEdc = new Conversion();
            $edicion = $evaluarEdc -> fechaEdc($this->registro);

            if (!$edicion) {
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

        // obtener equivalencia en bs
        public function equivalenciaBs () {
            $sql = mysqli_query($this->conexion, "SELECT * FROM conversion WHERE id_conversion = 1");
            return $sql;
        }

        // ¿?
        public function listaM () {
            $sql = mysqli_query($this->conexion, "SELECT * FROM metodo_pago");
            return $sql;
        }
    }
?>