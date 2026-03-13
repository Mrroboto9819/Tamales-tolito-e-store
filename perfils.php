<?php 
session_start();
if(isset($_SESSION['usuario'])){
    include_once 'includes/templades/headerloget.php';
?>

<!-- Usuario ya logueado -->
<main style="background:var(--color-crema); padding:10rem 0; min-height:70vh; display:flex; align-items:center;">
    <div class="contenedor" style="text-align:center; max-width:60rem;">
        <div style="font-size:6rem; margin-bottom:2rem;">✅</div>
        <h2>¡Ya estás registrado!</h2>
        <p style="font-size:1.7rem; color:var(--color-texto-claro); margin-bottom:3.5rem;">
            Bienvenido, <strong style="color:var(--color-tierra);"><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong>. Gracias por unirte a Tolito.
        </p>
        <div style="display:flex; gap:1.6rem; justify-content:center; flex-wrap:wrap;">
            <a href="index.php" class="btn btn-primary"><i class="fa fa-home" style="margin-right:0.6rem;"></i> Inicio</a>
            <a href="anuncios.php" class="btn btn-dorado"><i class="fa fa-shopping-bag" style="margin-right:0.6rem;"></i> Ir a la Tienda</a>
        </div>
    </div>
</main>

<?php } else {
    include_once 'includes/templades/header.php';
?>

<!-- ================================================
     REGISTRO - SPLIT SCREEN
     ================================================ -->
<main style="min-height:100vh; background:var(--color-crema);">
    <div style="display:grid; grid-template-columns:1fr; min-height:calc(100vh - 80px);">
        <div style="display:grid; grid-template-columns:1fr; min-height:80vh;">
            <style>@media(min-width:768px){ #register-grid{ grid-template-columns:1fr 1fr !important; } }</style>
            <div id="register-grid" style="display:grid; grid-template-columns:1fr; min-height:80vh;">

                <!-- Panel Izquierdo - Decorativo -->
                <div style="background:linear-gradient(135deg, var(--color-verde) 0%, var(--color-negro) 100%); display:flex; flex-direction:column; justify-content:center; align-items:center; padding:6rem 4rem; text-align:center; position:relative; overflow:hidden; min-height:40rem;">
                    <div style="position:absolute; top:-4rem; right:-4rem; width:20rem; height:20rem; border-radius:50%; background:rgba(200,149,42,0.12);"></div>
                    <div style="position:absolute; bottom:-6rem; left:-6rem; width:28rem; height:28rem; border-radius:50%; background:rgba(200,149,42,0.06);"></div>

                    <div style="position:relative; z-index:1;">
                        <div style="font-size:5rem; margin-bottom:2rem;">🌽</div>
                        <h2 style="color:var(--color-blanco); font-size:clamp(2.4rem,4vw,3.5rem); margin-bottom:1.6rem; line-height:1.3;">
                            Únete a la familia Tolito
                        </h2>
                        <p style="color:rgba(255,255,255,0.72); font-size:1.6rem; line-height:1.8; max-width:36rem;">
                            Crea tu cuenta y disfruta de envíos a domicilio, 
                            favoritos y el historial de tus pedidos.
                        </p>
                        <div style="margin-top:3.5rem; display:flex; gap:2rem; justify-content:center; flex-wrap:wrap;">
                            <div style="text-align:center;">
                                <span style="display:block; font-size:3rem; font-weight:700; color:var(--color-dorado-claro); font-family:var(--font-heading);">🚀</span>
                                <span style="font-size:1.2rem; color:rgba(255,255,255,0.6); text-transform:uppercase; letter-spacing:0.08em;">Envío rápido</span>
                            </div>
                            <div style="text-align:center;">
                                <span style="display:block; font-size:3rem; font-weight:700; color:var(--color-dorado-claro); font-family:var(--font-heading);">❤️</span>
                                <span style="font-size:1.2rem; color:rgba(255,255,255,0.6); text-transform:uppercase; letter-spacing:0.08em;">Lista de deseos</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Panel Derecho - Formulario de Registro -->
                <div style="background:var(--color-blanco); display:flex; flex-direction:column; justify-content:center; padding:5rem 4rem; overflow-y:auto;">

                    <!-- Tabs -->
                    <div style="display:grid; grid-template-columns:1fr 1fr; border-radius:var(--radius-sm); overflow:hidden; border:2px solid var(--color-crema-oscura); margin-bottom:3.5rem;">
                        <a href="perfill.php" style="text-align:center; padding:1.4rem; font-size:1.5rem; font-weight:600; color:var(--color-texto-claro); background:var(--color-blanco); text-decoration:none; display:block;">
                            Iniciar Sesión
                        </a>
                        <a href="perfils.php" style="text-align:center; padding:1.4rem; font-size:1.5rem; font-weight:600; color:var(--color-blanco); background:var(--color-tierra); text-decoration:none; display:block;">
                            Registrarse
                        </a>
                    </div>

                    <!-- Mensajes de error -->
                    <?php if(isset($_GET['error'])): 
                        $errMsgs = [
                            "Campos_vacios"                       => "Algún campo está vacío.",
                            "Usuario_no_admitido"                 => "Caracteres no válidos en el usuario (solo a-z, A-Z, 0-9).",
                            "correo_mal_ingresado"                => "El correo electrónico no es válido.",
                            "Telefono_con_caracteres_invalidos"   => "El teléfono contiene caracteres inválidos.",
                            "Contraseñas_no_coinciden"            => "Las contraseñas no coinciden.",
                            "Error_SQL_code_001"                  => "Error de base de datos. Código: 01.",
                            "Error_SQL_code_002"                  => "Error de base de datos. Código: 02.",
                            "Error_SQL_code_003"                  => "Error de base de datos. Código: 03.",
                            "Usuario_existente"                   => "Este usuario ya existe. Por favor elige otro.",
                        ];
                        $msg = $errMsgs[$_GET['error']] ?? "Error desconocido.";
                    ?>
                    <div style="background:#fff3cd; border:1px solid #ffc107; border-radius:var(--radius-sm); padding:1.6rem 2rem; margin-bottom:2.5rem; display:flex; align-items:flex-start; gap:1rem;">
                        <span style="font-size:2rem; flex-shrink:0;">⚠️</span>
                        <p style="color:#856404; margin:0; font-size:1.5rem; font-weight:500;"><?php echo htmlspecialchars($msg); ?></p>
                    </div>
                    <?php endif; ?>

                    <!-- Formulario -->
                    <form action="includes/fuctions/registro.php" method="POST" enctype="multipart/form-data">

                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.8rem; margin-bottom:1.8rem;">
                            <div>
                                <label style="font-size:1.2rem; font-weight:700; text-transform:uppercase; letter-spacing:0.06em; margin-bottom:0.6rem; display:block; color:var(--color-texto);">
                                    <i class="fa fa-user" style="color:var(--color-tierra); margin-right:0.4rem;"></i> Usuario *
                                </label>
                                <input type="text" name="username" id="user" placeholder="usuario123" maxlength="15" required
                                    style="border:2px solid var(--color-crema-oscura); border-radius:var(--radius-sm); background:var(--color-crema); font-family:var(--font-body); font-size:1.5rem; margin-bottom:0;">
                            </div>
                            <div>
                                <label style="font-size:1.2rem; font-weight:700; text-transform:uppercase; letter-spacing:0.06em; margin-bottom:0.6rem; display:block; color:var(--color-texto);">
                                    <i class="fa fa-phone" style="color:var(--color-tierra); margin-right:0.4rem;"></i> Teléfono *
                                </label>
                                <input type="number" name="telefono" placeholder="Ej. 5512345678" required
                                    style="border:2px solid var(--color-crema-oscura); border-radius:var(--radius-sm); background:var(--color-crema); font-family:var(--font-body); font-size:1.5rem; margin-bottom:0;">
                            </div>
                        </div>

                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.8rem; margin-bottom:1.8rem;">
                            <div>
                                <label style="font-size:1.2rem; font-weight:700; text-transform:uppercase; letter-spacing:0.06em; margin-bottom:0.6rem; display:block; color:var(--color-texto);">Nombre *</label>
                                <input type="text" name="nombre" id="nombre" placeholder="Tu nombre" required
                                    style="border:2px solid var(--color-crema-oscura); border-radius:var(--radius-sm); background:var(--color-crema); font-family:var(--font-body); font-size:1.5rem; margin-bottom:0;">
                            </div>
                            <div>
                                <label style="font-size:1.2rem; font-weight:700; text-transform:uppercase; letter-spacing:0.06em; margin-bottom:0.6rem; display:block; color:var(--color-texto);">Apellido *</label>
                                <input type="text" name="apellido" id="apellido" placeholder="Tu apellido" required
                                    style="border:2px solid var(--color-crema-oscura); border-radius:var(--radius-sm); background:var(--color-crema); font-family:var(--font-body); font-size:1.5rem; margin-bottom:0;">
                            </div>
                        </div>

                        <div style="margin-bottom:1.8rem;">
                            <label style="font-size:1.2rem; font-weight:700; text-transform:uppercase; letter-spacing:0.06em; margin-bottom:0.6rem; display:block; color:var(--color-texto);">
                                <i class="fa fa-envelope" style="color:var(--color-tierra); margin-right:0.4rem;"></i> Correo Electrónico *
                            </label>
                            <input type="email" name="email" id="email" placeholder="tu@correo.com" required
                                style="border:2px solid var(--color-crema-oscura); border-radius:var(--radius-sm); background:var(--color-crema); font-family:var(--font-body); font-size:1.5rem; margin-bottom:0;">
                        </div>

                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.8rem; margin-bottom:1.8rem;">
                            <div>
                                <label style="font-size:1.2rem; font-weight:700; text-transform:uppercase; letter-spacing:0.06em; margin-bottom:0.6rem; display:block; color:var(--color-texto);">
                                    <i class="fa fa-lock" style="color:var(--color-tierra); margin-right:0.4rem;"></i> Contraseña *
                                </label>
                                <input type="password" name="passw" placeholder="Mín. 8 caracteres" required
                                    style="border:2px solid var(--color-crema-oscura); border-radius:var(--radius-sm); background:var(--color-crema); font-family:var(--font-body); font-size:1.5rem; margin-bottom:0;">
                            </div>
                            <div>
                                <label style="font-size:1.2rem; font-weight:700; text-transform:uppercase; letter-spacing:0.06em; margin-bottom:0.6rem; display:block; color:var(--color-texto);">Repetir Contraseña *</label>
                                <input type="password" name="rep_passw" placeholder="Repite tu contraseña" required
                                    style="border:2px solid var(--color-crema-oscura); border-radius:var(--radius-sm); background:var(--color-crema); font-family:var(--font-body); font-size:1.5rem; margin-bottom:0;">
                            </div>
                        </div>

                        <div style="margin-bottom:3rem;">
                            <label style="font-size:1.2rem; font-weight:700; text-transform:uppercase; letter-spacing:0.06em; margin-bottom:0.6rem; display:block; color:var(--color-texto);">🌍 País *</label>
                            <select name="pais" id="pais" required
                                style="border:2px solid var(--color-crema-oscura); border-radius:var(--radius-sm); background:var(--color-crema); font-family:var(--font-body); font-size:1.5rem; margin-bottom:0;">
                                <option value="" disabled selected>Seleccionar país</option>
                                <option value="ger">Alemania</option>
                                <option value="can">Canadá</option>
                                <option value="chl">Chile</option>
                                <option value="esp">España</option>
                                <option value="usa">Estados Unidos (USA)</option>
                                <option value="jap">Japón</option>
                                <option value="mx">México</option>
                            </select>
                        </div>

                        <button type="submit" name="submit" id="submit" class="btn btn-primary" style="width:100%; justify-content:center; font-size:1.6rem; padding:1.6rem; border-radius:var(--radius-sm);">
                            <i class="fa fa-user-plus" style="margin-right:0.6rem;"></i> Crear Cuenta
                        </button>
                    </form>

                    <p style="text-align:center; margin-top:2.5rem; font-size:1.45rem; color:var(--color-texto-claro);">
                        ¿Ya tienes cuenta? <a href="perfill.php" style="color:var(--color-tierra); font-weight:600;">Inicia sesión aquí</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php } ?>
<?php include_once 'includes/templades/footer.php'?>