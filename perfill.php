<?php 
session_start();
if(isset($_SESSION['usuario'])){
    include_once 'includes/templades/headerloget.php';
?>

<!-- ================================================
     USUARIO YA LOGUEADO
     ================================================ -->
<main style="background:var(--color-crema); padding:10rem 0; min-height:70vh; display:flex; align-items:center;">
    <div class="contenedor" style="text-align:center; max-width:60rem;">
        <div style="font-size:6rem; margin-bottom:2rem;">✅</div>
        <h2>¡Ya iniciaste sesión!</h2>
        <p style="font-size:1.7rem; color:var(--color-texto-claro); margin-bottom:3.5rem;">
            Bienvenido de vuelta, <strong style="color:var(--color-tierra);"><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong>. ¿A dónde quieres ir?
        </p>
        <div style="display:flex; gap:1.6rem; justify-content:center; flex-wrap:wrap;">
            <a href="index.php" class="btn btn-primary"><i class="fa fa-home" style="margin-right:0.6rem;"></i> Inicio</a>
            <a href="anuncios.php" class="btn btn-dorado"><i class="fa fa-shopping-bag" style="margin-right:0.6rem;"></i> Ir a la Tienda</a>
            <a href="uporfile.php" class="btn btn-outline" style="color:var(--color-tierra); border-color:var(--color-tierra);">Mi Perfil</a>
        </div>
    </div>
</main>

<?php } else { 
    include_once 'includes/templades/header.php';
?>

<!-- ================================================
     LOGIN / REGISTRO - SPLIT SCREEN
     ================================================ -->
<main style="min-height:100vh; background:var(--color-crema);">
    <div style="display:grid; grid-template-columns:1fr; min-height:calc(100vh - 80px);">

        <!-- Si ya viene con un error de "necesitas iniciar sesión" -->
        <?php if(isset($_GET['error']) && $_GET['error'] == "inidicio_sesion"): ?>
        <div style="background:linear-gradient(to right, var(--color-dorado), var(--color-dorado-claro)); padding:1.6rem; text-align:center; grid-column:1/-1;">
            <p style="color:var(--color-blanco); font-weight:600; font-size:1.5rem; margin:0;">
                <i class="fa fa-info-circle" style="margin-right:0.6rem;"></i>
                Regístrate o inicia sesión para tener acceso a todas las funciones.
            </p>
        </div>
        <?php endif; ?>

        <div style="display:grid; grid-template-columns:1fr; min-height:80vh;">
            <style>@media(min-width:768px){ #login-grid{ grid-template-columns:1fr 1fr !important; } }</style>
            <div id="login-grid" style="display:grid; grid-template-columns:1fr; min-height:80vh;">

                <!-- Panel Izquierdo - Decorativo -->
                <div style="background:linear-gradient(135deg, var(--color-negro) 0%, var(--color-tierra-oscuro) 100%); display:flex; flex-direction:column; justify-content:center; align-items:center; padding:6rem 4rem; text-align:center; position:relative; overflow:hidden; min-height:40rem;">
                    <!-- Decoración -->
                    <div style="position:absolute; top:-4rem; right:-4rem; width:20rem; height:20rem; border-radius:50%; background:rgba(200,149,42,0.15);"></div>
                    <div style="position:absolute; bottom:-6rem; left:-6rem; width:28rem; height:28rem; border-radius:50%; background:rgba(200,149,42,0.08);"></div>
                    
                    <div style="position:relative; z-index:1;">
                        <div style="font-size:5rem; margin-bottom:2rem;">🫔</div>
                        <h2 style="color:var(--color-blanco); font-size:clamp(2.4rem,4vw,3.5rem); margin-bottom:1.6rem; line-height:1.3;">
                            La mejor tamalería artesanal
                        </h2>
                        <p style="color:rgba(255,255,255,0.72); font-size:1.6rem; line-height:1.8; max-width:36rem;">
                            Únete a la familia Tolito y disfruta de sabores
                            auténticos con envío a domicilio.
                        </p>
                        <div style="margin-top:3.5rem; display:flex; gap:2rem; justify-content:center; flex-wrap:wrap;">
                            <div style="text-align:center;">
                                <span style="display:block; font-size:3rem; font-weight:700; color:var(--color-dorado-claro); font-family:var(--font-heading);">25+</span>
                                <span style="font-size:1.2rem; color:rgba(255,255,255,0.6); text-transform:uppercase; letter-spacing:0.08em;">Años de tradición</span>
                            </div>
                            <div style="text-align:center;">
                                <span style="display:block; font-size:3rem; font-weight:700; color:var(--color-dorado-claro); font-family:var(--font-heading);">100%</span>
                                <span style="font-size:1.2rem; color:rgba(255,255,255,0.6); text-transform:uppercase; letter-spacing:0.08em;">Artesanal</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Panel Derecho - Formulario -->
                <div style="background:var(--color-blanco); display:flex; flex-direction:column; justify-content:center; padding:6rem 4rem;">

                    <!-- Tabs -->
                    <div style="display:grid; grid-template-columns:1fr 1fr; border-radius:var(--radius-sm); overflow:hidden; border:2px solid var(--color-crema-oscura); margin-bottom:4rem;">
                        <a href="perfill.php" style="text-align:center; padding:1.4rem; font-size:1.5rem; font-weight:600; color:var(--color-blanco); background:var(--color-tierra); text-decoration:none; display:block;">
                            Iniciar Sesión
                        </a>
                        <a href="perfils.php" style="text-align:center; padding:1.4rem; font-size:1.5rem; font-weight:600; color:var(--color-texto-claro); background:var(--color-blanco); text-decoration:none; display:block; transition:all 0.3s;">
                            Registrarse
                        </a>
                    </div>

                    <!-- Mensajes -->
                    <?php 
                    if(isset($_GET['login']) && $_GET['login'] == "RegistroExitoso"): ?>
                        <div style="background:#d4edda; border:1px solid #c3e6cb; border-radius:var(--radius-sm); padding:1.6rem 2rem; margin-bottom:2.5rem; display:flex; align-items:center; gap:1rem;">
                            <span style="font-size:2rem;">✅</span>
                            <p style="color:#155724; margin:0; font-size:1.5rem; font-weight:500;">¡Registro exitoso! Ahora puedes iniciar sesión.</p>
                        </div>
                    <?php endif; ?>

                    <?php if(isset($_GET['error'])): ?>
                        <?php $err = $_GET['error']; ?>
                        <div style="background:#fff3cd; border:1px solid #ffc107; border-radius:var(--radius-sm); padding:1.6rem 2rem; margin-bottom:2.5rem; display:flex; align-items:center; gap:1rem;">
                            <span style="font-size:2rem;">⚠️</span>
                            <p style="color:#856404; margin:0; font-size:1.5rem; font-weight:500;">
                                <?php
                                if($err == "Campos_vacios")         echo "Algún campo está vacío.";
                                elseif($err == "Error_SQL_code_003") echo "Error de conexión. Código: 03.";
                                elseif($err == "ContraseñaErronea")  echo "Contraseña o usuario incorrectos. Verifica e intenta de nuevo.";
                                elseif($err == "inidicio_sesion")    echo "Regístrate o inicia sesión para tener todas las funciones.";
                                ?>
                            </p>
                        </div>
                    <?php endif; ?>

                    <!-- Formulario Login -->
                    <form action="includes/fuctions/login.php" method="POST">
                        <div style="margin-bottom:2.2rem;">
                            <label for="email_field" style="font-size:1.3rem; color:var(--color-texto); margin-bottom:0.8rem; display:block; text-transform:uppercase; letter-spacing:0.06em; font-weight:700;">
                                <i class="fa fa-user" style="margin-right:0.5rem; color:var(--color-tierra);"></i> Usuario / Email
                            </label>
                            <input type="text" placeholder="Tu usuario o correo electrónico" id="email_field" name="email_l" required
                                style="border:2px solid var(--color-crema-oscura); border-radius:var(--radius-sm); background:var(--color-crema); font-family:var(--font-body); font-size:1.5rem; transition:border-color 0.3s; margin-bottom:0;">
                        </div>
                        <div style="margin-bottom:3rem;">
                            <label for="password_field" style="font-size:1.3rem; color:var(--color-texto); margin-bottom:0.8rem; display:block; text-transform:uppercase; letter-spacing:0.06em; font-weight:700;">
                                <i class="fa fa-lock" style="margin-right:0.5rem; color:var(--color-tierra);"></i> Contraseña
                            </label>
                            <input type="password" placeholder="Tu contraseña" id="password_field" name="password_l" required
                                style="border:2px solid var(--color-crema-oscura); border-radius:var(--radius-sm); background:var(--color-crema); font-family:var(--font-body); font-size:1.5rem; transition:border-color 0.3s; margin-bottom:0;">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary" style="width:100%; justify-content:center; font-size:1.6rem; padding:1.6rem; border-radius:var(--radius-sm);">
                            <i class="fa fa-sign-in" style="margin-right:0.6rem;"></i> Iniciar Sesión
                        </button>
                    </form>

                    <p style="text-align:center; margin-top:2.5rem; font-size:1.45rem; color:var(--color-texto-claro);">
                        ¿No tienes cuenta? <a href="perfils.php" style="color:var(--color-tierra); font-weight:600;">Regístrate aquí</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php } ?>
<?php include_once 'includes/templades/footer.php'?>