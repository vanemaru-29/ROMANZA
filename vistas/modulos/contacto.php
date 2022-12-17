<section class="w-100 vh-100 d-flex justify-content-center align-items-center">
    <section class="login__cont container bg-white shadow formulario_sm">
        <div class="row">            
            <div class="col p-5">
                <div class="text-end">
                    <h2 class="fw-bold text-center py-2" > Enviar Mensaje </h2>

                    <!-- contacto -->
                    <form action="https://formsubmit.co/romanza.restaurante2022@gmail.com" method="POST" id="form-contacto">
                        <!-- Grupo: Nombre -->
                        <div class="formulario__grupo mb-2" id="grupo__nombre">
                            <label for="nombre" class="form-label login__label"> Nombre </label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input" placeholder="Escriba su nombre" name="nombre" id="nombre">
                                <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                            </div>
                            <p class="formulario__input-error m-2">Este campo sólo admite letras y espacios, debe ser mayor a 8 caracteres.</p>
                        </div>
                        
                        <!-- Grupo: Asunto -->
                        <div class="formulario__grupo mb-2" id="grupo__asunto">
                            <label for="asunto" class="form-label login__label"> Asunto </label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control formulario__input" placeholder="Escriba el asunto" name="asunto" id="asunto">
                                <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                            </div>
                            <p class="formulario__input-error m-2">Éste campo contiene caracteres no admitidos.</p>
                        </div>

                        <!-- Grupo: Correo Electrónico -->
                        <div class="formulario__grupo mb-2" id="grupo__email">
                            <label for="email" class="form-label login__label"> Correo Electrónico </label>
                            <div class="formulario__grupo-input">
                                <input type="email" class="form-control" placeholder="Escriba su correo" name="email" id="email">
                                <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                            </div>
                            <p class="formulario__input-error m-2">Debe ingresar una dirección de correo válida.</p>
                        </div>
                        
                        <!-- Grupo: Mensaje -->
                        <div class="formulario__grupo" id="grupo__mensaje">
                            <label for="mensaje" class="form-label login__label"> Mensaje </label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control" placeholder="Escriba el mensaje" name="mensaje" id="mensaje">
                                <i class="formulario__validacion-estado fa-solid fa-xmark"></i>
                            </div>
                            <p class="formulario__input-error m-2">Éste campo contiene caracteres no admitidos.</p>
                        </div>

                        <div class="d-grid my-4">
                            <button type="submit" name="submit" class="btn btn-danger"> ENVIAR </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>

<script src="vistas/../js/validacion-contacto.js"></script>