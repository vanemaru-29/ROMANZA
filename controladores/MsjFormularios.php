<?php
    require_once ('autoCarga.php');
    
    class MsjFormularios {
        // registro exitoso
        public function registroExito () {
            ?>
                <div class="formulario__mensaje-activo alert alert-success editarInfo__tlfn" role="alert" id="formulario__mensaje">
                    <p class="m-0"> <i class="fa-solid fa-circle-check carrito__icono-btn"></i> ¡El registro se ha completado exitosamente! </p>
                </div>
            <?php
        }
        
        // el usuario ya existe
        public function usuarioExiste () {
            ?>
                <p class="color-mensaje">
                    <i class="fa-solid fa-circle-exclamation"></i> El usuario ya existe en la base de datos.
                </p>
            <?php
        }
        
        // la categoria ya existe
        public function catExiste () {
            ?>
                <div class="formulario__mensaje-activo alert alert-secondary editarInfo__tlfn" role="alert" id="formulario__mensaje">
                    <p class="m-0"> <i class="fa-solid fa-circle-exclamation carrito__icono-btn"></i> La categoria ya existe en la base de datos. </p>
                </div>
            <?php
        }
        
        // el producto ya existe
        public function pdtExiste () {
            ?>
                <div class="formulario__mensaje-activo alert alert-secondary editarInfo__tlfn" role="alert" id="formulario__mensaje">
                    <p class="m-0"> <i class="fa-solid fa-circle-exclamation carrito__icono-btn"></i> El producto ya existe en la base de datos. </p>
                </div>
            <?php
        }
    }
?>