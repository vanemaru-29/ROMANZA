<?php
    // navegación
    require_once ('controladores/navegacion.php');
    require_once ('modelos/navegacion.php');

    $mvc = new ControladorDeNavegacion;
    $mvc -> plantilla();
?>