<?php
    require ('../../modelos/Conexion.php');
    require ('../../controladores/autoCarga.php');

    $tabla = "opinion";
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

    require ('../../fpdf/fpdf.php');
    date_default_timezone_set("America/Caracas");
        
    class PDF extends FPDF {
        public function header() {
            $this->SetFont('Arial', '', 10);
            $this->Image('../../publico/activos/iconos/icono-oscuro.png', 10, 10, 10);
            $this->Cell(160);
            $this->Cell(25, 10, date("d/m/Y"), 0, 1, 'C');
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(50);
            $this->Cell(100, 10, utf8_decode('Restaurante Italiano ROMANZA'), 0, 0, 'C');
            $this->Ln(20);
        }
            
        public function footer() {
            $this->SetY(-20);
            $this->SetFont('Arial', 'I', 10);
            $this->Cell(0, 10, utf8_decode('Página ').$this->PageNo(), 0, 1, 'C');
        }
    }

    $fpdf = new PDF();
    $fpdf->SetTitle('Opiniones Registradas', 0);
    $fpdf->AddPage('portrait', 'letter');
    $fpdf->SetFont('Arial', 'B', 12);
    $fpdf->Cell(75);
    $fpdf->Cell(50, 5, 'Opiniones Registradas', 0, 1, 'C');
    $fpdf->Ln(5);
    $fpdf->Cell(75);
    $fpdf->Cell(50, 5, 'Desde: '.$fecha->fechaFormato($desde).' - Hasta: '.$fecha->fechaFormato($hasta), 0, 1, 'C');

    // tabla
    $fpdf->SetY(60);
    $fpdf->SetFont('Arial', '', 10);

    $opiniones = new Fechas();
    $datosOpn = $opiniones->fechasRango($tabla, $desde, $hasta);
    $totalRegistros = @mysqli_num_rows($datosOpn);
    $fpdf->Cell(195, 8, 'Total de Opiniones ('.$totalRegistros.')', 0, 1, 'R');

    $fpdf->SetFillColor(173, 181, 189);
    $fpdf->SetFont('Arial', 'B', 10);
    $fpdf->Cell(15, 8, '#', 1, 0, 'C', 1);
    $fpdf->Cell(50, 8, 'Usuario', 1, 0, 'C', 1);
    $fpdf->Cell(100, 8, 'Opinion', 1, 0, 'C', 1);
    $fpdf->Cell(30, 8, 'Registro', 1, 1, 'C', 1);

    $fpdf->SetFont('Arial', '', 10);
        
    while ($resultado = mysqli_fetch_array($datosOpn)) {
        $fpdf->Cell(15, 8, $resultado['id_opinion'], 1, 0, 'C');

        $usuario = new Usuarios();
        $datos = $usuario -> obtenerUser($resultado['id_usuario']);
        while ($datos_usuario = mysqli_fetch_array($datos)) {
            $fpdf->Cell(50, 8, utf8_decode($datos_usuario['nombre_usuario']), 1, 0, 'C');
        }

        $fpdf->Cell(100, 8, utf8_decode(''), 1, 0, 'C');
        $fpdf->Cell(30, 8, $fecha->fechaFormato($resultado['fecha_registro']), 1, 1, 'C');

    }

    $fpdf->OutPut('I', 'Opiniones Registradas.pdf', true);
?>