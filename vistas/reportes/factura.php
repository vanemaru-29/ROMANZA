<?php
    require('../../modelos/Conexion.php');
    require('../../controladores/autoCarga.php');

    $tabla = "pago";
    $fecha = new Fechas();
    $fechaPrimera = $fecha->fechaPrimera($tabla);
    $fechaActual = $fecha->fechaActual();


    if (empty($_POST['desde']) || empty($_POST['hasta'])) {
        while ($verFecha = mysqli_fetch_array($fechaPrimera)) {
            $desde = $verFecha['fecha_registro'];
        }
        $hasta = $fechaActual;
    } else {
        $desde = $_POST['desde'];
        $hasta = $_POST['hasta'];
    }

    require('../../fpdf/fpdf.php');
    date_default_timezone_set("America/Caracas");
    if (!empty($_GET['orden'])) {
        $pagos = new Pago();
        $datos = $pagos->facturaU($_GET['orden']);
        while ($info_pago = mysqli_fetch_array($datos)) {
            $productos_od = new Pedidos();
            $producto = $productos_od->verPedido($_GET['orden']);

            $producto_datos = new Productos();

            class PDF extends FPDF {
                public function header() {
                    $this->SetFont('Arial', '', 10);
                    $this->Image('../../publico/activos/iconos/icono-oscuro.png', 10, 10, 10);
                    $this->Cell(130);
                    $this->Cell(35, 10, 'Fecha: '.date("d/m/Y"), 0, 0, 'C');
                    $this->Cell(35, 10, 'Orden: '.$_GET['orden'], 0, 1, 'C');
                    $this->SetFont('Arial', 'B', 12);
                    $this->Cell(50);
                    $this->Cell(100, 10, utf8_decode('Restaurante Italiano ROMANZA'), 0, 0, 'C');

                    $this->Ln(20);
                }

                public function footer() {
                    $this->SetY(-20);
                    $this->SetFont('Arial', 'I', 10);
                    $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo(), 0, 1, 'C');
                }
            }

            $fpdf = new PDF();
            $fpdf->SetTitle('Factura', 0);
            $fpdf->AddPage('portrait', 'letter');
            // $fpdf->SetFont('Arial', 'B', 12);
            $fpdf->SetFont('Arial', '', 10);
        
            $fpdf->Cell(50);
            $fpdf->Cell(100, 10, 'Datos del Consumidor', 0, 1, 'C');

            $fpdf->Cell(30, 8, "Cliente:", 0, 0, 'L');
            $fpdf->Cell(150, 8, $info_pago['nombre'], 0, 0, 'L');
            $fpdf->Ln(5);

            $fpdf->Cell(30, 8, utf8_decode("Dirección:"), 0, 0, 'L');
            $fpdf->Cell(150, 9, utf8_decode($info_pago['direccion']), 0, 0, 'L');
            $fpdf->Ln(5);

            $fpdf->Cell(30, 8, "Correo:", 0, 0, 'L');
            $fpdf->Cell(150, 9, utf8_decode($info_pago['correo']), 0, 0, 'L');
            $fpdf->Ln(5);
            
            // tabla
            $fpdf->SetY(70);

            $fpdf->SetFillColor(173, 181, 189);
            $fpdf->SetFont('Arial', 'B', 10);
            $fpdf->Cell(25, 8, '#', 1, 0, 'C', 1);
            $fpdf->Cell(70, 8, 'Nombre', 1, 0, 'C', 1);
            $fpdf->Cell(50, 8, 'Cantidad', 1, 0, 'C', 1);
            $fpdf->Cell(50, 8, 'Total', 1, 1, 'C', 1);

            $fpdf->SetFont('Arial', '', 10);
            while ($datos_od = mysqli_fetch_array($producto)) {
                $fpdf->Cell(25, 8, $datos_od['id_producto'], 1, 0, 'C');
                $product = $producto_datos->obtenerPdt($datos_od['id_producto']);
                while ($datos_pdt = mysqli_fetch_array($product)) {

                    $fpdf->Cell(70, 8, utf8_decode($datos_pdt['nombre']), 1, 0, 'C');
                    $fpdf->Cell(50, 8,  $datos_od['cantidad'], 1, 0, 'C');
                    $fpdf->Cell(50, 8,  '$ '.$datos_od['total'], 1, 1, 'C');
                }
            }
            $fpdf->Ln(8);

            $fpdf->SetFont('Arial', 'B', 10);
            $fpdf->Cell(25, 10, "Total a pagar:", 0, 0, 'L');
            $fpdf->Cell(120);
            $fpdf->Cell(50, 10, '$ '.$info_pago['total'], 0, 1, 'L');

            // $fpdf->Ln(8);
            $fpdf->Cell(25, 8, "Estatus:", 0, 0, 'L');
            $fpdf->Cell(50, 9, utf8_decode($info_pago['estatus_p']), 0, 1, 'L');
            
            if (utf8_decode($info_pago['estatus_p']) == 'enviado') {
                $fpdf->SetFont('Arial', '', 10);
                $fpdf->Cell(50);
                $fpdf->Cell(100, 10, 'GRACIAS POR SU COMPRA', 0, 0, 'C');
            }
        }
    }

    $fpdf->OutPut('I', 'Factura.fpdf', true);
