<section class="container py-5">
    <div class="login__cont bg-white my-5 p-5">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="text-center">
                    <h1 class="mb-5">Mi Pedido</h1>
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
                                    <th scope="col">Quitar</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if (isset($_SESSION['carrito'])) {
                                    $mi_carrito = $_SESSION['carrito'];
                                    $total = 0;
                                    for ($i = 0; $i < count($mi_carrito); $i++) {
                                        if (isset($mi_carrito[$i])) {
                                            if ($mi_carrito[$i] != NULL) {
                                ?>

                                <tr id="datos_producto">     
                                    <td><?= $mi_carrito[$i]['id'] ?></td>
                                    <td><?= $mi_carrito[$i]['nombre'] ?> <span class="carrito__categoria-producto"><?= $mi_carrito[$i]['categoria'] ?></span></td>
                                                
                                    <td>
                                        <form action="#" method="POST">
                                            <input type="hidden" name="id_pdt1" value="<?= $mi_carrito[$i]['id'] ?>">
                                            <input type="number" class="pedidos__cantidad-producto" name="cantidad_nueva" value="<?= $mi_carrito[$i]['cantidad'] ?>">
                                            <button type="submit" class="btn btn-secondary btn-sm btn-rounded" name="actualizar_pdt"><img src="vistas/../publico/activos/iconos/actualizar-claro.svg" alt="Actualizar"></button>

                                            <?php
                                                if (isset($_POST['cantidad_nueva'])) {
                                                    if ($mi_carrito[$i]['id'] == $_POST['id_pdt1']) {
                                                        $id_pdt = $_POST['id_pdt1'];
                                                        $cant_nueva = $_POST['cantidad_nueva'];

                                                        $mi_carrito[$i]['cantidad'] = $cant_nueva;
                                                        $mi_carrito[$id_pdt]['cantidad'] = $cant_nueva;
                                        
                                                        $_SESSION['carrito'] = $mi_carrito;
                                                            
                                                        $redireccion = new Redirecciones();
                                                        $redireccion->miPedido();
                                                    }
                                                }
                                            ?>
                                        </form>
                                    </td>

                                    <td>$ <input type="text" class="pedidos__cantidad-producto" name="precio" value="<?= $mi_carrito[$i]['precio'] ?>" disabled></td>
                                    <td>$ <input type="text" class="pedidos__cantidad-producto" name="precio" value="<?= $mi_carrito[$i]['precio']*$mi_carrito[$i]['cantidad'] ?>" disabled></td>

                                                                <!--     $mi_carrito[$i]['cantidad'] = $cant_nueva;
                                                                    $mi_carrito[$id_pdt]['cantidad'] = $cant_nueva; -->

                                    <td>
                                        <form action="#" method="POST">
                                            <input type="hidden" name="id_pdt2" value="<?= $mi_carrito[$i]['id'] ?>">
                                            <button type="submit" class="btn btn-danger btn-sm btn-rounded" name="quitar_pdt"><i class="fa-solid fa-trash"></i> Quitar</button>

                                            <?php
                                                if (isset($_POST['id_pdt2'])) {
                                                    if ($mi_carrito[$i]['id'] == $_POST['id_pdt2']) {
                                                        $id_pdt = $_POST['id_pdt2'];

                                                        unset($mi_carrito[$i]);
                                                        unset($mi_carrito[$id_pdt]);

                                                        $_SESSION['carrito'] = $mi_carrito;

                                                        $redireccion = new Redirecciones();
                                                        $redireccion->miPedido();
                                                    }
                                                }
                                            ?>
                                        </form>
                                    </td> -->
                                                </tr>

                                    <?php
                                                $total = $total + ($mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad']);
                                            }
                                        }
                                    }
                                } else { ?> <tr>
                                        <td colspan="6" class="text-center">No hay productos añadidos al carrito</td>
                                    </tr> <?php }
                                            ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="4">Total (USD)</td>
                                    <?php
                                    if (isset($_SESSION['carrito'])) {
                                        $total = 0;
                                        for ($i = 0; $i < count($mi_carrito); $i++) {
                                            if (isset($mi_carrito[$i])) {
                                                if ($mi_carrito[$i] != NULL) {
                                                    $total = $total + ($mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad']);
                                                }
                                            }
                                        }
                                    }

                                    if (!isset($total)) {
                                        $total = '0';
                                    } else {
                                        $total = $total;
                                    }
                                    ?>
                                    <td>$ <input type="text" class="pedidos__cantidad-producto" name="precio_total" id="precio_total" value="<?= number_format($total, 2) ?>" disabled></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="mt-4 text-center">
                        <a href="vistas/../index.php?romanza=registrar-pedido&&precio_final=<?= number_format($total, 2) ?>" name="registrar-pedido" class="btn btn-warning mx-3">Continuar Pedido</a>
                    </div>
        </div>
    </div>
</section>

<script src="vistas/../js/cantidad-producto.js"></script>