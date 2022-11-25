<?php
    // se verifica usuario cliente
    if (isset($_SESSION['id_rol'])) {
        if ($_SESSION['id_rol'] == 3) {
            if (isset($_SESSION['carrito'])) {
                $mi_carrito = $_SESSION['carrito'];
            }

            // contamos el carrito
            if (isset($_SESSION['carrito'])) {
                for ($i=0; $i < count($mi_carrito); $i++) { 
                    if (isset($mi_carrito[$i])) {
                    if ($mi_carrito[$i]!=NULL) {
                    if (!isset($mi_carrito['cantidad'])) { $mi_carrito['cantidad'] = '0'; } else { $mi_carrito['cantidad'] = $mi_carrito['cantidad']; }
                    $total_cantidad = $i + 1;
                }}}
            }
            
            // declaramos la variable
            if (!isset($total_cantidad)) {$total_cantidad = '0'; }
        }
    }
?>

<nav class="navbar navbar-dark bg-dark fixed-top navbar-expand-lg">
    <div class="container">
        <a href="index.php" class="navbar-brand header__titulo"> <img src="vistas/../publico/activos/iconos/icono-claro.svg" alt="Logo ROMANZA" class="header__logo"> Romanza </a>

        <button type="button" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="mx-auto"></div>
            <ul class="navbar-nav">                
                <li class="nav-item mx-3"> <a href="index.php?romanza=pedidos" class="nav-link text-white"> Pedidos </a> </li>
                <li class="nav-item mx-3"> <a href="index.php?romanza=mi-cuenta" class="nav-link text-white"> Mi Cuenta </a> </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Más Opciones
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?romanza=menu">La Carta</a></li>
                        <li><a class="dropdown-item" href="index.php?romanza=galeria">Galeria</a></li>
                        <li><a class="dropdown-item" href="index.php?romanza=opiniones">Opiniones</a></li>
                    </ul>
                </li>

                <button type="button" class="header__btn btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img src="vistas/../publico/activos/iconos/carrito-oscuro.svg" alt="Mi Carrito" class="header__carrito"> <span class="header__carrito-cuenta"><?= $total_cantidad ?></span>
                </button>
                
                <li class="nav-item mx-3">
                    <form action="#" method="POST">
                        <button type="submit" name="salir" class="header__btn btn btn-warning nav-link header__salir"> <i class="fa-solid fa-power-off"></i> </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal -->
<?php
    include ('vistas/modulos/modal/modal-carrito.php');
?>