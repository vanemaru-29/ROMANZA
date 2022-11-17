<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JQuery -->
    <script src="vistas/../js/jquery-3.6.1.min.js"></script>
    
    <!-- normalizar css -->
    <link rel="stylesheet" href="vistas/../publico/css/normalizar.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="vistas/../DataTables/datatables.min.css">
    <link rel="stylesheet" href="vistas/../DataTables/DataTables-1.12.1/css/dataTables.bootstrap5.min.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="vistas/../bootstrap/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

    <!-- estilos css -->
    <link rel="stylesheet" href="vistas/../publico/css/estilos.css">

    <!-- icono -->
    <link rel="shortcut icon" href="vistas/../publico/activos/iconos/icono-oscuro.svg" type="image/x-icon">

    <?php
        require_once ('vistas/../controladores/paginas-titulo.php');
        require_once ('vistas/../modelos/paginas-titulo.php');
    ?>

    <!-- titulo de ventana -->
    <title>
        ROMANZA 
        <?php
            $titulo = new ControladoroDeTitulo;
            $titulo -> titulosPaginasC();
        ?>
    </title>
</head>
<body>