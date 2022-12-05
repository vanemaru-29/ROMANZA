<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Mi Carrito</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <table class="table table-hover m-0">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (isset($_SESSION['carrito'])) {
                                $total = 0;
                            for ($i=0; $i < count($mi_carrito)-1; $i++) { 
                                if (isset($mi_carrito[$i])) {
                                if ($mi_carrito[$i]!=NULL) {
                        ?>
                            <tr>
                                <td><?= $mi_carrito[$i]['nombre'] ?> <span class="carrito__categoria-producto"><?= $mi_carrito[$i]['categoria'] ?></span> <span class="modal__carrito-usd">$ <?= number_format(($mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad']), 2) ?></span></td>
                            </tr>
                        <?php
                            $total = $total + ($mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad']);
                            }}}} else { ?> <tr><td class="text-center">No hay productos añadidos al carrito</td></tr> <?php }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Total (USD) 
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
                                <span class="modal__carrito-usd">$ <?= number_format($total, 2) ?></span>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="modal-footer">
                <a href="vistas/../index.php?romanza=vaciar-carro" class="btn btn-danger">Vaciar Carrito</a>
                <a href="vistas/../index.php?romanza=mi-pedido" class="btn btn-warning">Ir al Pedido</a>
            </div>
        </div>
    </div>
</div>