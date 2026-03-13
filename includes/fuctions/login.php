<?php
session_start();

if(isset($_POST['submit'])){
    require 'db.php';
    $user = $_POST['email_l'];
    $pass = $_POST['password_l'];

    if(empty($user) || empty($pass)){
        header("Location: ../../perfill.php?error=Campos_vacios");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE usuario = ? OR correo = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../../perfill.php?error=Error_SQL_code_003");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $user, $user);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($resultado)){
                if(password_verify($pass, $row['pass'])){
                    session_regenerate_id(true);
                    $_SESSION['telefono'] = $row['telefono'];
                    $_SESSION['usuario']  = $row['usuario'];
                    $_SESSION['imgp']     = $row['imgpor'];
                    $_SESSION['id']       = $row['id'];
                    $_SESSION['admins']   = $row['admins'];
                    $_SESSION['nombre']   = $row['nombre'];
                    $_SESSION['apellido'] = $row['apellido'];
                    $_SESSION['correo']   = $row['correo'];
                    $_SESSION['pais']     = $row['pais'];
                    header("Location: ../../index.php");
                    exit();
                } else {
                    header("Location: ../../perfill.php?error=ContraseñaErronea");
                    exit();
                }
            } else {
                header("Location: ../../perfill.php?error=ContraseñaErronea");
                exit();
            }
        }
    }
} else {
    header("Location: ../../index.php");
    exit();
}
