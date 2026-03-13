<?php
session_start();
if(isset($_SESSION['usuario'])){
    // Manejar acciones del carrito ANTES de enviar HTML
    include 'includes/fuctions/carritof.php';
    include_once 'includes/templades/headerloget.php';
?>
    <div class="contenedor">
        <section>
            <div class="carritotienda">

            <?php
            // Mensajes flash
            if(isset($_GET['msg'])){
                if($_GET['msg'] == 'agregado')
                    echo '<div class="alert alert-success">Producto agregado al carrito.</div>';
                if($_GET['msg'] == 'ya_existe')
                    echo '<div class="alert alert-warning">Este producto ya está en el carrito.</div>';
                if($_GET['msg'] == 'eliminado')
                    echo '<div class="alert alert-info">Producto eliminado del carrito.</div>';
            }
            ?>

            <?php if(!empty($_SESSION['carrito'])){ ?>
                <table class="table table-bordered">
                    <tr>
                        <th class="fondogriss">ID Producto</th>
                        <th class="fondogriss text-center">Producto</th>
                        <th class="fondogriss text-center">Descripcion</th>
                        <th class="fondogriss text-center">Cantidad</th>
                        <th class="fondogriss text-center">Precio</th>
                        <th class="fondogriss text-center">Total</th>
                        <th class="fondogriss text-center">--</th>
                    </tr>
                    <?php
                    $total = 0;
                    foreach($_SESSION['carrito'] as $producto){
                        $subtotal = $producto['Precio'] * $producto['Cantidad'];
                        $total   += $subtotal;
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($producto['Id']); ?></td>
                        <td><?php echo htmlspecialchars($producto['Producto']); ?></td>
                        <td><?php echo htmlspecialchars($producto['Descripcion']); ?></td>
                        <td><?php echo htmlspecialchars($producto['Cantidad']); ?></td>
                        <td><?php echo '$ ' . htmlspecialchars($producto['Precio']); ?></td>
                        <td><?php echo number_format($subtotal, 2); ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($producto['Id']); ?>">
                                <button type="submit" name="añadir_carro" value="eliminar" class="remover-carrito">
                                    <i class="crossn fa fa-times-circle"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

            <?php } else { ?>
                <div class="alert alert-secondary">No hay productos en el Carrito.</div>
            <?php $total = 0; } ?>

            <div class="carrito-orden anuncio1">
                <h3 class="fw-300">Precio Final</h3>
                <div class="compycal">
                    <hr>
                    <div class="listapro">
                        <p class="precio">Calculos:</p>
                        <?php if(!empty($_SESSION['carrito'])): ?>
                            <?php foreach($_SESSION['carrito'] as $producto): ?>
                                <?php echo htmlspecialchars($producto['Producto']) . ' $ ' . htmlspecialchars($producto['Precio']) . ' x' . htmlspecialchars($producto['Cantidad']); ?><br>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <hr>
                    <form action="pago.php" method="POST">
                        <input type="hidden" name="correo" value="<?php echo htmlspecialchars($_SESSION['correo']); ?>">
                        <input type="hidden" name="total" value="<?php echo number_format($total, 2, '.', ''); ?>">
                        <p>Total a Pagar: <span id="precio"><?php echo number_format($total, 2); ?></span></p>
                        <button type="submit" name="pago">Realizar Compra</button>
                    </form>
                </div>
            </div>

            </div>
        </section>
    </div>

<?php } else { ?>
    <?php include_once 'includes/templades/header.php'; ?>
    <div class="alert alert-danger">
        Debes iniciar sesion para tener acceso a esta sección.
        <a href="perfill.php"><button type="button">Iniciar Sesion</button></a>
    </div>
<?php } ?>
    <div class="rango-foot">
        <?php include_once 'includes/templades/footer.php'; ?>
    </div>
