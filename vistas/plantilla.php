<?php
    include ('encabezado.php');

    require_once ('vistas/../controladores/navegacion.php');
    require_once ('vistas/../modelos/navegacion.php');

    require_once ('vistas/../modelos/Conexion.php');
    require_once ('vistas/../modelos/redirecciones.php');
?>

<!-- header -->
<header>
    <?php
        require_once ('vistas/../controladores/autoCarga.php');
        $header = new Header();
        $header->header();

        // cerrar sesión
        if (isset($_POST['salir'])) {
            unset($_SESSION['id_usuario']);
            $_SESSION['id_usuario'] = NULL;
            unset($_SESSION['nombre_usuario']);
            $_SESSION['nombre_usuario'] = NULL;
            unset($_SESSION['id_rol']);
            $_SESSION['id_rol'] = NULL;
            unset($_SESSION['carrito']);
            $_SESSION['carrito'] = NULL;
            ?>
                <script> window.location.href = "vistas/../index.php?romanza=inicio"; </script>
            <?php
        }
    ?>
</header>

<!-- main -->
<main>
    <?php
        $modulo = new ControladorDeNavegacion();
        $modulo -> enlacesPaginasC();
    ?>
</main>

<?php
    include ('pie-pagina.php');
?>