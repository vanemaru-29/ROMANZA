<?php
    // carga automática de las clases en controladores
    function autoCarga ($clase) {
        require_once ($clase.".php");
    }

    spl_autoload_register("autoCarga");
?>