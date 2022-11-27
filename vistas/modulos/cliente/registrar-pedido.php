<!-- <section class="my-5 py-5"></section> -->

<?php
    class RegistrarPedido extends Conexion {
        // constructor
        public function __construct () {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conectar();
        }

        // registrar pedido
        public function registrar () {
            $cliente = $_SESSION['id_usuario'];

            // insertar el pedido
            if (isset($_SESSION['carrito'])) {
                $mi_carrito = $_SESSION['carrito'];
                $total = 0;
                
                $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
                $key = '';
                $longitud = 8;
                for($i=0; $i < $longitud; $i++) {
                    $key.=substr($pattern,rand(0, 64), 1);
                }                
                $codigo = $key;
                
                for ($i=0; $i < count($mi_carrito); $i++) { 
                    if (isset($mi_carrito[$i])) {
                        if ($mi_carrito[$i]!=NULL) {
                            $id = $mi_carrito[$i]['id'];
                            $precio = $mi_carrito[$i]['precio'];
                            $cantidad = $mi_carrito[$i]['cantidad'];
                            $total = number_format($precio * $cantidad, 2);

                            $fecha = new Fechas();
                            $fechaActual = $fecha -> fechaActual();

                            $sql = "INSERT  INTO pedido (codigo, id_usuario, id_producto, cantidad, total, estatus, fecha_registro)
                                            VALUES ('$codigo', '$cliente', '$id', '$cantidad', '$total', 'pendiente', '$fechaActual')";
                            $insertar = $this->conexion->prepare($sql);
                            $insertarDatos = $insertar->execute();
                        }

                        unset($_SESSION['carrito']);

                        $redireccion = new Redirecciones();
                        $redireccion -> pedidos();
                    }
                }
            }
        }
    }

    $registrar = new RegistrarPedido();
    $registrar->registrar();
?>