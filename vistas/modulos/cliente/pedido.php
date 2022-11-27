<section class="container py-5">
    <div class="login__cont bg-white my-5 p-5">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="text-center">
                    <h1 class="mb-5">Mi Pedido</h1>
                </div>

                <!-- formulario -->
                <form action="vistas/../index.php?romanza=registrar-pedido" method="POST">
                    <div class="modal-body">
                        <table class="table table-hover m-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Quitar</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    if (isset($_SESSION['carrito'])) {
                                        $mi_carrito = $_SESSION['carrito'];
                                        $total = 0;
                                    for ($i=0; $i < count($mi_carrito); $i++) { 
                                        if (isset($mi_carrito[$i])) {
                                        if ($mi_carrito[$i]!=NULL) {
                                ?>

                                <tr id="datos_producto">     
                                    <td><?= $mi_carrito[$i]['id'] ?></td>

                                    <td><?= $mi_carrito[$i]['nombre'] ?> <span class="carrito__categoria-producto"><?= $mi_carrito[$i]['categoria'] ?></span></td>
                                                
                                    <td><input type="text" class="pedidos__cantidad-producto" name="cantidad" id="cantidad<?= $mi_carrito[$i]['id'] ?>" onkeyup="calcular(<?= $mi_carrito[$i]['id'] ?>)" value="<?= $mi_carrito[$i]['cantidad'] ?>"></td>

                                    <td>$ <input type="text" class="pedidos__cantidad-producto" name="precio" id="precio<?= $mi_carrito[$i]['id'] ?>" value="<?= number_format(($mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad']), 2) ?>" disabled></td>

                                    <td>$ <input type="text" class="pedidos__cantidad-producto total" name="total" id="total<?= $mi_carrito[$i]['id'] ?>" value="<?= number_format(($mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad']), 2) ?>" disabled></td>

                                    <td>
                                        <form action="" method="POST">
                                            <input type="hidden" name="id_pdt" value="<?= $mi_carrito[$i]['id'] ?>">
                                            <button type="submit" name="quitar_pdt" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Quitar</button>
                                            
                                            <?php
                                                if (isset($_POST['id_pdt'])) {
                                                    if ($mi_carrito[$i]['id'] == $_POST['id_pdt']) {
                                                        $id_pdt = $_POST['id_pdt'];
                                                        $mi_carrito[$i]=NULL;
                                                        $mi_carrito[$id_pdt]=NULL;

                                                        $_SESSION['carrito'] = $mi_carrito;
                                                            
                                                        $redireccion = new Redirecciones();
                                                        $redireccion->pedido();
                                                    }
                                                }
                                            ?>
                                        </form>
                                    </td>
                                </tr>

                                <?php
                                    $total = $total + ($mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad']);
                                    }}}} else { ?> <tr><td colspan="6" class="text-center">No hay productos añadidos al carrito</td></tr> <?php }
                                ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="4">Total (USD)</td>
                                    <?php
                                        if (isset($_SESSION['carrito'])) {
                                        $total = 0;
                                        for ($i=0; $i < count($mi_carrito); $i++) { 
                                        if (isset($mi_carrito[$i])) {
                                        if ($mi_carrito[$i]!=NULL) {
                                            $total = $total + ($mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad']);
                                        }}}}

                                        if (!isset($total)) { $total = '0'; } else { $total = $total; }
                                    ?>
                                    <td>$ <input type="text" class="pedidos__cantidad-producto" name="precio_total" id="precio_total" value="<?= number_format($total, 2) ?>" disabled></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="mt-4 text-center">
                        <a href="vistas/../index.php?romanza=pedidos" class="btn btn-secondary mx-3">Agregar Productos</a>
                        <button type="submit" name="registrar-pedido" class="btn btn-warning mx-3">Continuar Pedido</button>
                    </div>

                    <?php
                        // if (empty($_POST['registrar-pedido'])) {
                        //     if () {

                        //     }
                        // }
                    ?>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="vistas/../js/cantidad-producto.js"></script>