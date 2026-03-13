<?php
session_start();
$usuario = $_SESSION['usuario'];
$ide= $_SESSION['id'];
$estado = $_SESSION['admins'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$correo = $_SESSION['correo'];
$pais = $_SESSION['pais'];
$telefono = $_SESSION['telefono'];
//var_dump($_SESSION);
//echo '<script arc="js/main.js"></script>';
if(isset($_SESSION['usuario'])){
include_once 'includes/templades/headerloget.php';
switch($estado){

    case 1: ?>
        <div class="warp">
		<ul class="tabs">
            <li><a href="#tab1">Informacion Personal</a></li>
			<li><a href="#tab2">Administrar Usuarios</a></li>
            <li><a href="#tab3">Administrar Productos</a></li>
		</ul>
		<div class="secciones">
			<article id="tab1">
                <div class="informacion">
                    <div class="contenidop anuncio3 diplay">
                    <img src="img/perfildef.jpg">
                    <?php echo $usuario?>
                    </div>
                    <div class="contenidop anuncio3 txtprof contenedor">
                    <p>Nombre y Apellido: <?php echo $nombre. " " . $apellido?></p>
                    <p>Correo: <?php echo $correo?></p>
                    <p>Telefono: <?php echo $telefono?></p>
                    <p>id_unico: <?php echo $ide?></p>
                    </div>
                </div>
            </article>


			<article id="tab2">
            <?php
        try{
            require_once('includes/fuctions/db.php');
            $sql = " SELECT id, usuario, nombre, apellido, correo, telefono, pais, admins FROM users";
            $resultado = $conn->query($sql);
        }catch(\Exception $e){
            echo $e->getMessage();
        }
        ?>
    <div class="informacion">
        <div class="contenidop anuncio3 diplay">
                    <img src="img/perfildef.jpg">
                    <?php echo $usuario?>
                        <?php //ordenando Los valores de la tabla
                            $fusuarios= array();
                            while($usuarios = $resultado->fetch_assoc()){
                                $usuario = array(
                                    'Usuario' => $usuarios['usuario'],
                                    'Idunico' => $usuarios['id'],
                                    'Nombre' => $usuarios['nombre'],
                                    'Apellido' => $usuarios['apellido'],
                                    'Correo' => $usuarios['correo'],
                                    'Telefono' => $usuarios['telefono'],
                                    'Pais' => $usuarios['pais'],
                                    'Estado' => $usuarios['admins'],
                                    );
                                $fusuarios[] = $usuario;?>
                                
                                        <?php }//fin while?>
        </div>
        <div class="contenidop anuncio3 diplay">
            <div class="registrof">
            <div class="contenedor barrabusc">
            <input type="text" id="inputbuscar" placeholder="| id | Usuario | Nombre | Telefono |" class=""><button><i class="nhov fa fa-search"></i></button>
            </div>    
            <table class="table table-bordered">
					<tr>
						<th width="10%" class="fondogriss">Nombre Usuario</th>
						<th width="30%" class="fondogriss">ID</th>
						<th width="10%" class="fondogriss">Nombre y Apellido</th>
						<th width="20%" class="fondogriss">Correo</th>
                        <th width="10%" class="fondogriss">Telefono</th>
                        <th width="10%" class="fondogriss">Pais</th>
                        <th width="20%" class="fondogriss">admins</th>
                    </tr> 
                    <tr>
                        <?php foreach($fusuarios as $usuario) {?>
						<td><?php echo $usuario["Usuario"]; ?></td>
						<td><?php echo $usuario["Idunico"]; ?></td>
						<td><?php echo $usuario["Nombre"] . ' ' . $usuario["Apellido"]; ?></td>
                        <td><?php echo $usuario["Correo"]; ?></td>
                        <td><?php echo $usuario["Telefono"]; ?></td>
                        <td><?php echo $usuario["Pais"]; ?></td>
                        <td> <?php if($usuario["Usuario"] != 'ADMIN'){switch($usuario["Estado"]){
                            case 0:
                                $valora = 'No';
                            break;
                            case 1:
                                $valora = 'Si';
                            break;
                            default:
                            echo 'error basede datos';
                            break;
                        }?>
                        <select name="edit" id="estado"> 
                                        <option value='<?php $usuario["Estado"] ?>'>predefinodo: <?php echo $valora ?></option>
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                        </select></td>
                                        <?php }else{switch($usuario["Estado"]){
                            case 0:
                                $valora = 'No';
                            break;
                            case 1:
                                $valora = 'Si';
                            break;
                            default:
                            echo 'error basede datos';
                            break;
                        }?>
                         <?php echo $valora;?></td>
                    <?php }?>
					</tr>
                    <?php }?>
                    </tr>
                </table>
                <tr>            
                    <form>
                        <button type="submit">Realizar cambios</button>
                    </form>
                    </tr>
            </div>

        </div>
        </div>
            </article>
            <article id="tab3">
            <h2>Agregar Productos</h2>
            <hr>
            <?php
            if(isset($_GET['action'])){
                if($_GET['action'] == 'RegistroExitoso')
                    echo '<div class="alert alert-success">Producto agregado correctamente.</div>';
                if($_GET['action'] == 'completo_elim')
                    echo '<div class="alert alert-info">Producto eliminado correctamente.</div>';
            }
            if(isset($_GET['error'])){
                if($_GET['error'] == 'imagen_requerida')
                    echo '<div class="alert alert-danger">Debes seleccionar una imagen.</div>';
                if($_GET['error'] == 'tipo_imagen_invalido')
                    echo '<div class="alert alert-danger">Tipo de imagen no permitido. Usa jpg, png, gif o jpeg.</div>';
                if($_GET['error'] == 'error_base_datos')
                    echo '<div class="alert alert-danger">Error al realizar la operacion en la base de datos.</div>';
            }
            ?>
                <form action="includes/fuctions/alta.php" method="post" enctype="multipart/form-data">
                    <label>Imagen del Productos</label><input name="p_img" type="file" class=""/> 
                    <label>Nombre:</label> <input name="n_producto" type="text"/>
                    <label>Descripcion:</label> <textarea  name="d_producto"></textarea>
                    <label>Precio:</label> <input type="numeric" name="p_producto"/>
                    <label>Etiquetas:</label> <input type="text" name="etiquetas"/>
                    <button type="submit" name="submit">Agregar producto</button>
                </form>
            <h2>Dar de baja productos</h2>
            <hr>
            <table class="table-bordered">
					<tr>
						<th width="70%" class="fondogriss">Producto</th>
                        <th width="20%" class="fondogriss">Precio</th>
                        <th width="10%" class="fondogriss">--</th>

                    </tr> 
                    <tr>
                        <?php
                    try{
            require_once('includes/fuctions/db.php');
            $sql = " SELECT id_producto, producto, precio FROM productos";
            $resultado = $conn->query($sql);
        }catch(\Exception $e){
            echo $e->getMessage();
        }
        ?>
    <div class="informacion">
        <div class="contenidop anuncio3 diplay">

                        <?php //ordenando Los valores de la tabla
                            $fproductosa= array();
                            while($productos = $resultado->fetch_assoc()){
                                $producto = array(
                                    'Id'      => $productos['id_producto'],
                                    'Producto' => $productos['producto'],
                                    'Precio' => $productos['precio'],
                                    );
                                $fproductosa[] = $producto;?>
                                
                                        <?php }//fin while?>
                        <?php foreach($fproductosa as $producto) {?>
						<td><?php echo $producto["Producto"]; ?></td>
						<td><?php echo $producto["Precio"]; ?></td>
                        <td>
                            <form action="includes/fuctions/eliminardebase.php" method="post">
                            <button type="submit" name="btn_eliminar" value="<?php echo htmlspecialchars($producto['Id']); ?>" class="remover-carrito"><i class="crossn fa fa-times-circle"></i></button>
                            </form>
                        </td>
					</tr>
                        <?php }?>
                </table>

        </div>

            </article>
            <form action="includes/fuctions/logout.php" method="POST">
            <button type="submit">Cerrar sesion</button>
            </form>
       </div>
    </div>
    <?php
    break;
    case 0:?>
    <div class="warp">
		<ul class="tabs">
            <li><a href="#tab1">Informacion Personal</a></li>
		</ul>

		<div class="secciones">
			<article id="tab1">
                <div class="informacion">
                    <div class="contenidop anuncio3 diplay">
                    <img src="img/perfildef.jpg">
                    <?php echo $usuario?>
                    </div>
                    <div class="contenidop anuncio3 txtprof">
                    <p>Nombre y Apellido: <?php echo $nombre. " " . $apellido?></p>
                    <p>Correo: <?php echo $correo?></p>
                    <p>Telefono: <?php echo $telefono?></p>
                    <p>id_unico: <?php echo $ide?></p>
                    </div>
                </div>
            </article>
            <form action="includes/fuctions/logout.php" method="POST">
            <button type="submit">Cerrar sesion</button>
            </form>

    <?php break;
    default: ?>
<h2>Ocurrio un error al cargar el perfil.</h2>
<form action="includes/fuctions/logout.php" method="POST">
            <button type="submit">Cerrar sesion</button>
            </form>
    <?php break;

}?>

<?php }else{ ?>
<?php include_once 'includes/templades/header.php';?>
<h2>Error 404! Page not Found...</h2>
<?php }?>

<script>	$('ul.tabs li a:first').addClass('active');
	$('.secciones article').hide();
	$('.secciones article:first').show();

	$('ul.tabs li a').click(function(){
		$('ul.tabs li a').removeClass('active');
		$(this).addClass('active');
		$('.secciones article').hide();

		var activeTab = $(this).attr('href');
		$(activeTab).show();
		return false;
	});</script>
<?php include_once 'includes/templades/footer.php'?>