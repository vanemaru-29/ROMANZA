<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- normalizar css -->
    <link rel="stylesheet" href="vistas/../publico/css/normalizar.css">

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
    <?php
        require_once ('vistas/../controladores/navegacion.php');
        require_once ('vistas/../modelos/navegacion.php');

        require_once ('vistas/../modelos/Conexion.php');
        require_once ('vistas/../modelos/redirecciones.php');
    ?>

    <!-- header -->
    <header>
        <?php
            include ('modulos/../parciales/header-inicio.html');
        ?>
    </header>

    <!-- main -->
    <main>
        <?php
            $modulo = new ControladorDeNavegacion();
            $modulo -> enlacesPaginasC();
        ?>
    </main>

    <!-- footer -->
    <footer>
        <?php
            // include ('modulos/../parciales/footer.html');
        ?>
    </footer>

    <!-- Bootstrap JS -->
    <script src="vistas/../bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- sweetalert js -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="vistas/../js/estados-pedido.js"></script>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/095148edc4.js" crossorigin="anonymous"></script>
</body>
</html>