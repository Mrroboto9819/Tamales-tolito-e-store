<?php
session_start();
if(isset($_SESSION['usuario'])){
    // Manejar acciones de favoritos ANTES de enviar HTML
    include 'includes/fuctions/favf.php';
    include_once 'includes/templades/headerloget.php';
?>
    <div class="contenedor">
        <section>
            <h2 class="fw-300 centrar-texto">Tus Favoritos:</h2>
            <hr>

            <?php
            // Mensajes flash
            if(isset($_GET['msg'])){
                if($_GET['msg'] == 'agregado')
                    echo '<div class="alert alert-success">Producto agregado a favoritos.</div>';
                if($_GET['msg'] == 'ya_existe')
                    echo '<div class="alert alert-warning">Este producto ya está en tus favoritos.</div>';
                if($_GET['msg'] == 'eliminado')
                    echo '<div class="alert alert-info">Producto eliminado de favoritos.</div>';
            }
            ?>

            <?php if(!empty($_SESSION['fav'])){ ?>
                <table class="table table-bordered">
                    <tr>
                        <th class="fondogriss">ID Producto</th>
                        <th class="fondogriss text-center">Producto</th>
                        <th class="fondogriss text-center">Descripcion</th>
                        <th class="fondogriss text-center">--</th>
                    </tr>
                    <?php foreach($_SESSION['fav'] as $producto){ ?>
                    <tr>
                        <td><?php echo htmlspecialchars($producto['Id']); ?></td>
                        <td><?php echo htmlspecialchars($producto['Producto']); ?></td>
                        <td><?php echo htmlspecialchars($producto['Descripcion']); ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($producto['Id']); ?>">
                                <button type="submit" name="añadir_fav" value="eliminar" class="remover-carrito">
                                    <i class="fa fa-heart"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <div class="alert alert-secondary">No tienes productos en favoritos.</div>
            <?php } ?>

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
