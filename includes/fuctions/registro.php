<?php
require('db.php');

if(isset($_POST['submit'])){
    $usuarioid = $_POST['username'] . uniqid(rand(), true);
    $imagen    = '';
    $usuario   = $_POST['username'];
    $nombre    = $_POST['nombre'];
    $apellido  = $_POST['apellido'];
    $correo    = $_POST['email'];
    $telefono  = $_POST['telefono'];
    $pass      = $_POST['passw'];
    $passr     = $_POST['rep_passw'];
    $pais      = $_POST['pais'];
    $admin     = 0;

    if(isset($_POST['pais'])){
        switch($pais){
            case 'ger': $pais = "Alemania";       break;
            case 'can': $pais = "Canada";          break;
            case 'chl': $pais = "Chile";           break;
            case 'esp': $pais = "España";          break;
            case 'usa': $pais = "Estados Unidos";  break;
            case 'jap': $pais = "Japon";           break;
            case 'mx':  $pais = "Mexico";          break;
            default:    $pais = "No seleccionado"; break;
        }

        if(empty($usuario) || empty($nombre) || empty($apellido) || empty($correo) || empty($telefono) || empty($pass)){
            header("Location: ../../perfils.php?error=Campos_vacios");
            exit();
        } else if(!preg_match("/^[a-zA-Z0-9]*$/", $usuario)){
            header("Location: ../../perfils.php?error=Usuario_no_admitido");
            exit();
        } else if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            header("Location: ../../perfils.php?error=correo_mal_ingresado&usuario=".$usuario."&nombre=".$nombre."&apellido=".$apellido);
            exit();
        } else if(!preg_match("/^[0-9]*$/", $telefono)){
            header("Location: ../../perfils.php?error=Telefono_con_caracteres_invalidos&usuario=".$usuario."&nombre=".$nombre."&apellido=".$apellido."&correo=".$correo);
            exit();
        } else if($pass !== $passr){
            header("Location: ../../perfils.php?error=Contraseñas_no_coinciden&usuario=".$usuario."&nombre=".$nombre."&apellido=".$apellido."&correo=".$correo);
            exit();
        } else {
            // Verificar si el usuario ya existe
            $sql  = "SELECT usuario FROM users WHERE usuario = ?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../../perfils.php?error=Error_SQL_code_001");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $usuario);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultadobase = mysqli_stmt_num_rows($stmt);
            }

            if($resultadobase > 0){
                header("Location: ../../perfils.php?error=Usuario_existente");
                exit();
            } else {
                $sql  = "INSERT INTO users (id, imgpor, usuario, nombre, apellido, correo, telefono, pass, pais, admins) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../../perfils.php?error=Error_SQL_code_002");
                    exit();
                } else {
                    $hashpws = password_hash($pass, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssssssssi", $usuarioid, $imagen, $usuario, $nombre, $apellido, $correo, $telefono, $hashpws, $pais, $admin);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    header("Location: ../../perfill.php?login=RegistroExitoso");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../../perfils.php");
    exit();
}
