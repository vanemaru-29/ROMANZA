<section class="my-5 py-5"></section>

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

                for ($i=0; $i < count($mi_carrito); $i++) { 
                    if (isset($mi_carrito[$i])) {
                        if ($mi_carrito[$i]!=NULL) {
                            $id = $mi_carrito[$i]['id'];
                            $nombre = $mi_carrito[$i]['nombre'];
                            $precio = $mi_carrito[$i]['precio'];
                            $cantidad = $mi_carrito[$i]['cantidad'];
                            $total = $precio * $cantidad;

                            $sql = "INSERT  INTO pedido (id_usuario, id_producto, nombre, precio, cantidad, estatus)
                                            VALUES ('$cliente', '$id', '$nombre', '$precio', '$cantidad', 'enviado')";
                            $insertar = $this->conexion->prepare($sql);
                            $insertarDatos = $insertar->execute();
                        }
                    }
                }
                // var_dump($mi_carrito);
            }



            // var_dump($_POST['cantidad'])
        }
    }

    $registrar = new RegistrarPedido();
    $registrar->registrar();
?>