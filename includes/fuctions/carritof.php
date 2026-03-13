<?php
if(isset($_POST['añadir_carro'])){
    switch($_POST['añadir_carro']){
        case 'agregar':
            if(!isset($_SESSION['carrito'])){
                $productos = array(
                    'Id'          => $_POST['pid'],
                    'Producto'    => $_POST['producto'],
                    'Precio'      => $_POST['precio'],
                    'Descripcion' => $_POST['descripcion'],
                    'Cantidad'    => $_POST['cantidad']
                );
                $_SESSION['carrito'][0] = $productos;
                header("Location: /carrito.php?msg=agregado");
                exit();
            } else {
                $idp = array_column($_SESSION['carrito'], 'Id');
                if(in_array($_POST['pid'], $idp)){
                    header("Location: /carrito.php?msg=ya_existe");
                    exit();
                } else {
                    $numerop  = count($_SESSION['carrito']);
                    $productos = array(
                        'Id'          => $_POST['pid'],
                        'Producto'    => $_POST['producto'],
                        'Precio'      => $_POST['precio'],
                        'Descripcion' => $_POST['descripcion'],
                        'Cantidad'    => $_POST['cantidad']
                    );
                    $_SESSION['carrito'][$numerop] = $productos;
                    header("Location: /carrito.php?msg=agregado");
                    exit();
                }
            }
        break;

        case 'eliminar':
            foreach($_SESSION['carrito'] as $indice => $producto){
                if($producto['Id'] == $_POST['id']){
                    unset($_SESSION['carrito'][$indice]);
                    break;
                }
            }
            header("Location: /carrito.php?msg=eliminado");
            exit();
        break;
    }
}
