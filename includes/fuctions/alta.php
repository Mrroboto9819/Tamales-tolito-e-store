<?php
require('db.php');

if(isset($_POST['submit'])){
    // Validar que se subió una imagen
    if(!isset($_FILES['p_img']) || $_FILES['p_img']['error'] !== UPLOAD_ERR_OK){
        header("Location: ../../uporfile.php?error=imagen_requerida");
        exit();
    }

    $extension = strtolower(pathinfo($_FILES['p_img']['name'], PATHINFO_EXTENSION));
    $permitidos = array('jpg', 'png', 'gif', 'jpeg');

    if(!in_array($extension, $permitidos)){
        header("Location: ../../uporfile.php?error=tipo_imagen_invalido");
        exit();
    }

    $data        = file_get_contents($_FILES['p_img']['tmp_name']);
    $producto_id = uniqid(rand(), false);
    $producto    = $_POST['n_producto'];
    $des         = $_POST['d_producto'];
    $precio      = $_POST['p_producto'];
    $etiquetas   = $_POST['etiquetas'];

    $sql  = "INSERT INTO productos (id_producto, img_producto, producto, descripcion, precio, clasificacion) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../../uporfile.php?error=Error_SQL_code_006");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ssssds", $producto_id, $data, $producto, $des, $precio, $etiquetas);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: ../../uporfile.php?action=RegistroExitoso");
        exit();
    }
} else {
    header("Location: ../../uporfile.php");
    exit();
}
