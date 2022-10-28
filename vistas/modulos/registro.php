<section class="w-100 vh-100 d-flex justify-content-center align-items-center">
    <section class="login__cont container bg-white shadow">
        <div class="row">
            <div class="col registro-imagen d-none d-lg-block"></div>

            <div class="col p-5">
                <div class="text-end">
                    <img src="vistas/../publico/activos/iconos/icono-oscuro.svg" width="" alt="Logo ROMANZA">
                    <h2 class="fw-bold text-center py-3"> Registrarse </h2>

                    <!-- registro -->
                    <form action="#" method="POST">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 mb-3">
                                <label for="username" class="form-label login__label"> Nombre </label>
                                <input type="text" class="form-control" placeholder="Ingrese su nombre" name="name" id="name">
                            </div>

                            <div class="col-sm-12 col-md-6 mb-3">
                                <label for="username" class="form-label login__label"> Nombre de Usuario </label>
                                <input type="text" class="form-control" placeholder="Ingrese un nombre de usuario" name="username" id="username">
                            </div>
                            
                            <div class="col-sm-12 col-md-6 mb-4">
                                <label for="telefono" class="form-label login__label"> Telefono </label>
                                <input type="tel" format="+58 (###) ###-####" class="form-control" placeholder="Ingrese el numero de telefono" name="telefono" id="telefono">
                            </div>
                            
                            <div class="col-sm-12 col-md-6 mb-4 formulario__campo-centro">
                                <label for="clave" class="form-label login__label"> Contraseña </label>
                                <input type="password" class="form-control" placeholder="Ingrese contraseña" name="clave" id="clave">
                            </div>
                        </div>
                        
                        <div class="d-grid mt-4 mb-5">
                            <button type="submit" class="btn btn-danger"> REGISTRARSE </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>