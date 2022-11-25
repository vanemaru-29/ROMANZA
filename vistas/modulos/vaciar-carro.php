<?php
    unset($_SESSION['carrito']);

    $redireccion = new Redirecciones();
    $redireccion -> pedidos();
?>