<?php
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header('Location: ../../contacto.php');
    exit();
}

// Sanitizar inputs para prevenir email header injection
function limpiar($valor){
    return str_replace(["\r", "\n", "%0a", "%0d"], '', trim($valor));
}

$nombre   = limpiar($_POST['nombre'] ?? '');
$correo   = limpiar($_POST['correo'] ?? '');
$tel      = limpiar($_POST['tel'] ?? '');
$opc      = limpiar($_POST['opc'] ?? '');
$cantidad = limpiar($_POST['cantidad'] ?? '');
$mensaje  = trim($_POST['mensaje'] ?? '');

if(empty($nombre) || empty($correo) || empty($mensaje)){
    header('Location: ../../contacto.php?mensaje=campos_vacios');
    exit();
}

if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
    header('Location: ../../contacto.php?mensaje=correo_invalido');
    exit();
}

$destino      = "Tolito.com.mx@gmail.com";
$asunto       = "Contacto Tolito";
$cuerpomensaje  = "De: $nombre\nCorreo: $correo\nTelefono: $tel\nOpcion: $opc\n";
$cuerpomensaje .= "Cantidad: $cantidad\nMensaje: $mensaje";

mail($destino, $asunto, $cuerpomensaje);
header('Location: ../../contacto.php?mensaje=enviado');
exit();
