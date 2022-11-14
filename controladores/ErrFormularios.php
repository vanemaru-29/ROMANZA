<?php
    require_once ('autoCarga.php');

    class ErrFormularios {
        // campos vacíos
        public function camposVacios () {
            ?>
                <div class="formulario__mensaje-activo alert alert-danger editarInfo__tlfn" role="alert" id="formulario__mensaje">
                    <p class="m-0"> <i class="fa-solid fa-triangle-exclamation"></i> <b>Error:</b> Se debe completar el formulario correctamente. </p>
                </div>
            <?php
        }

        // error de registro
        public function registro () {
            ?>
                <div class="formulario__mensaje-activo alert alert-danger editarInfo__tlfn" role="alert" id="formulario__mensaje">
                    <p class="m-0"> <i class="fa-solid fa-triangle-exclamation"></i> <b>Error:</b> No se ha podido completar el registro. </p>
                </div>
            <?php
        }

        // error de edición
        public function editar () {
            ?>
                <div class="formulario__mensaje-activo alert alert-danger editarInfo__tlfn" role="alert" id="formulario__mensaje">
                    <p class="m-0"> <i class="fa-solid fa-triangle-exclamation"></i> <b>Error:</b> No se ha podido editar el registro. </p>
                </div>
            <?php
        }
        
        // error de eliminación
        public function eliminar () {
            ?>
                <div class="formulario__mensaje-activo alert alert-danger editarInfo__tlfn" role="alert" id="formulario__mensaje">
                    <p class="m-0"> <i class="fa-solid fa-triangle-exclamation"></i> <b>Error:</b> No se ha podido eliminar el registro. </p>
                </div>
            <?php
        }
    }
?>