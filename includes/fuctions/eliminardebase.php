<?php
require('db.php');

if(isset($_POST['btn_eliminar'])){
    $idp  = $_POST['btn_eliminar'];
    $sql  = "DELETE FROM productos WHERE id_producto = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../../uporfile.php?error=error_base_datos");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $idp);
    if(mysqli_stmt_execute($stmt)){
        header("Location: ../../uporfile.php?action=completo_elim");
    } else {
        header("Location: ../../uporfile.php?error=error_base_datos");
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    exit();
} else {
    header("Location: ../../uporfile.php");
    exit();
}
