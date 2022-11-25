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
                            <td>Cantidad <?= $mi_carrito[$i]['cantidad'] ?>: <?= $mi_carrito[$i]['nombre'] ?> <span class="carrito__categoria-producto"><?= $mi_carrito[$i]['categoria'] ?></span> <span class="modal__carrito-usd">$ <?= $mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad'] ?></span></td>
                        </tr>
                    <?php
                        $total = $total + ($mi_carrito[$i]['precio'] * $mi_carrito[$i]['cantidad']);
                        }}}}
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
                            <span class="modal__carrito-usd">$ <?= $total ?></span>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <a href="vistas/../index.php?romanza=vaciar-carro" class="btn btn-danger">Vaciar Carrito</a>
            <button type="button" class="btn btn-warning">Continuar Pedido</button>
        </div>
        </div>
    </div>
</div>