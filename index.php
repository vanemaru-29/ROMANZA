<?php
    require_once ('config/config.php');
            
    // navegación
    require_once ('controller/navigation.php');
    require_once ('model/navigation.php');

    $mvc = new NavigationController();
    $mvc -> template();
?>