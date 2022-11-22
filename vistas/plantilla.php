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

<?php
    include ('pie-pagina.php');
?>