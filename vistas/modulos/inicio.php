<!-- imagen -->
<div class="inicio__img w-100 vh-100 d-flex justify-content-center align-items-center">
    <div class="content text-center">
        <h2 class="text-white display-1 inicio__titulo"> Romanza </h2>
        <h2 class="text-white display-1 inicio__titulo"> Restaurante Italiano </h2>

        <?php
            $clientes = new Usuarios();
            $cant_clientes = $clientes->listaCli();
            $totalRegistros = @mysqli_num_rows($cant_clientes);
        ?>
        <h4 class="text-white">
            <?= $totalRegistros ?> Clientes Registrados
        </h4>

        <div class="inicio__btn my-4">
            <?php
                if (isset($_SESSION['nombre_usuario'])) {
                    ?>
                        <a href="vistas/../index.php?romanza=pedidos" class="btn btn-danger mx-2 my-2"> Ver Productos </a>
                    <?php
                } else {
                    ?>
                        <a href="vistas/../index.php?romanza=registro" class="btn btn-danger mx-2 my-2"> Registro </a>
                        <a href="vistas/../index.php?romanza=login" class="btn btn-danger mx-2 my-2"> Inicio </a>
                    <?php
                }
            ?>
        </div>
    </div>
</div>

<!-- quienes somos -->
<section class="inicio__info py-5 px-4">
    <h2 class="text-center mb-5"> ¿Quiénes Somos? </h2>
    <p class="text-center"> Somos un restaurante de comida italiana con especialidades en pizzas, massas, calzones, ensaladas y mucho más de las delicias que podrás degustar con nosotros. Ven y disfutar de nuestra experiencia ¡Te esperamos! </p>
</section>

<!-- opiniones -->
<section class="py-5 px-4">
    <h2 class="text-center text-white mb-5">Opiniones de Clientes</h2>

    <article class="inicio__opiniones-cont">
        <?php
            $opiniones = new Opiniones ();
            $opn = $opiniones -> listaOpnLimit ();
            while ($mostrar_opn = mysqli_fetch_array($opn)) {
                $fecha = new Fechas ();
                $cliente = new Usuarios ();
                $cli = $cliente -> obtenerUser($mostrar_opn['id_usuario']);
                ?>
                <div class="inicio__opinion card border-light" style="max-width: 18rem;">
                    <div class="card-header"><?= $fecha -> fechaFormato($mostrar_opn['fecha_registro']) ?></div>
                    <div class="card-body">
                        <?php while ($mostrar_cli = mysqli_fetch_array($cli)) { ?>
                            <h5 class="card-title"><?= $mostrar_cli['nombre_usuario'] ?></h5>
                        <?php } ?>
                        <p class="card-text"><?= $mostrar_opn['opinion'] ?></p>
                    </div>
                </div>
                <?php
            }
        ?>
    </article>
</section>

<!-- dónde encontrarnos -->
<section class="inicio__mapa">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2971.94358529896!2d-8.425883584427243!3d41.851041075085966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd250bdf28312223%3A0xc088e57537f46681!2sRomanza%20Restaurante%20Pizzaria%20(%20Arcos%20Valdevez)!5e0!3m2!1ses!2sve!4v1656957401504!5m2!1ses!2sve" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<!-- imagenes -->
<div class="inicio__imagenes">
    <div class="inicio__imagenes-titulo content text-center">
        <h2 class="text-white display-1 inicio__titulo"> Romanza </h2>
        <h2 class="text-white"> Visitanos </h2>
    </div>
</div>

<?php
    include ('vistas/parciales/footer.html');
?>

<!-- redes sociales -->
<div class="inicio__redes">
    <a href="https://www.facebook.com/romanzarestaurantepizzaria" target="_blank" class="inicio__redes-icono bg-warning"><i class="fa-brands fa-square-facebook"></i></a>
    <a href="https://www.instagram.com/romanzapizzaria" target="_blank" class="inicio__redes-icono bg-warning"><i class="fa-brands fa-square-instagram"></i></a>
    <a href="vistas/../index.php?romanza=contacto" target="_blank" class="inicio__redes-icono bg-warning"><i class="fa-solid fa-square-envelope"></i></a>
</div>

<!-- volver arriba -->
<section class="inicio__top">
    <div class="inicio__top-btn"><i class="fa-solid fa-circle-chevron-up"></i></div>
</section>

<!-- js -->
<script src="vistas/../publico/js/top.js"></script>