<section class="container py-5">
    <div class="login__cont bg-white my-5 p-5">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="text-center">
                    <h1 class="">Mi Pedido</h1>
                </div>

                <div class="modal-body">
                    <table class="table table-hover m-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>

                        <form action="" method="POST">
                            <tbody>
                                <?php
                                    if (isset($_SESSION['carrito'])) {
                                        $mi_carrito = $_SESSION['carrito'];
                                        $total = 0;
                                    for ($i=0; $i < count($mi_carrito); $i++) { 
                                        if (isset($mi_carrito[$i])) {
                                        if ($mi_carrito[$i]!=NULL) {
                                ?>
                                    <tr>
                                        <td><?= $mi_carrito[$i]['id'] ?></td>
                                        <td><?= $mi_carrito[$i]['nombre'] ?></td>
                                        <td><?= $mi_carrito[$i]['cantidad'] ?></td>
                                        <td>$ <?= number_format(($mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad']), 2) ?></td>
                                        <td><strong>asawe</strong></td>
                                    </tr>
                                <?php
                                    $total = $total + ($mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad']);
                                    }}}} else { ?> <tr><td class="text-center">No hay productos añadidos al carrito</td></tr> <?php }
                                ?>
                            </tbody>
                            
                            <tfoot>
                                <tr>
                                    <td colspan="4">Total (USD)</td>
                                <?php
                                    if (isset($_SESSION['carrito'])) {
                                    $total = 0;
                                    for ($i=0; $i < count($mi_carrito)-1; $i++) { 
                                    if (isset($mi_carrito[$i])) {
                                    if ($mi_carrito[$i]!=NULL) {
                                        $total = $total + ($mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad']);
                                    }}}}

                                    if (!isset($total)) { $total = '0'; } else { $total = $total; }
                                    ?>
                                        <td><strong>$ <?= number_format($total, 2) ?></strong></td>
                                </tr>
                            </tfoot>
                        </form>
                    </table>
                </div>

                <div class="mt-4 text-center">
                    <a href="vistas/../index.php?romanza=pedidos" class="btn btn-secondary mx-3">Agregar Productos</a>
                    <a href="#" class="btn btn-warning mx-3">Continuar Pedido</a>
                </div>
            </div>
        </div>
    </div>
</section>