<?php
    require_once ('autoCarga.php');
    
    class MsjFormularios {
        public function registroExito () {
            ?>
                <div class="formulario__mensaje-activo alert alert-success editarInfo__tlfn" role="alert" id="formulario__mensaje">
                    <p class="m-0"> <i class="fa-solid fa-circle-check carrito__icono-btn"></i> ¡El registro se ha completado exitosamente! </p>
                </div>
            <?php
        }
    }
?>