<?php
session_start();
if(isset($_SESSION['usuario'])){
    include_once 'includes/templades/headerloget.php';
?>

<!-- ================================================
     HERO INTERIOR - CONTACTO
     ================================================ -->
<section class="nosotros-hero" style="padding: 10rem 0 5rem;">
    <div class="contenedor" style="text-align:center;">
        <span class="seccion-label" style="color:var(--color-dorado-claro); display:block; margin-bottom:1.2rem;">✉️ Estamos para servirte</span>
        <h1>Contáctanos</h1>
        <p style="color:rgba(255,255,255,0.78); max-width:55rem; margin:1.2rem auto 0;">
            ¿Tienes dudas, pedidos especiales o quieres ser distribuidor? Escríbenos.
        </p>
    </div>
</section>

<!-- ================================================
     FORMULARIO DE CONTACTO
     ================================================ -->
<main style="background:var(--color-crema); padding:7rem 0 9rem;">
    <div class="contenedor" style="max-width:72rem;">

        <?php if(isset($_GET['mensaje'])): ?>
            <?php if($_GET['mensaje'] == "enviado"): ?>
                <div style="background:#d4edda; border:1px solid #c3e6cb; border-radius:var(--radius-md); padding:2rem 2.4rem; margin-bottom:3rem; display:flex; align-items:center; gap:1.2rem;">
                    <span style="font-size:2.4rem;">✅</span>
                    <p style="color:#155724; margin:0; font-size:1.6rem; font-weight:600;">¡Listo! Nos pondremos en contacto pronto.</p>
                </div>
            <?php endif; ?>
            <?php if($_GET['mensaje'] == "campos_vacios"): ?>
                <div style="background:#f8d7da; border:1px solid #f5c6cb; border-radius:var(--radius-md); padding:2rem 2.4rem; margin-bottom:3rem; display:flex; align-items:center; gap:1.2rem;">
                    <span style="font-size:2.4rem;">⚠️</span>
                    <p style="color:#721c24; margin:0; font-size:1.6rem; font-weight:600;">Por favor llena todos los campos requeridos.</p>
                </div>
            <?php endif; ?>
            <?php if($_GET['mensaje'] == "correo_invalido"): ?>
                <div style="background:#f8d7da; border:1px solid #f5c6cb; border-radius:var(--radius-md); padding:2rem 2.4rem; margin-bottom:3rem; display:flex; align-items:center; gap:1.2rem;">
                    <span style="font-size:2.4rem;">⚠️</span>
                    <p style="color:#721c24; margin:0; font-size:1.6rem; font-weight:600;">El correo electrónico no es válido.</p>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <div style="background:var(--color-blanco); border-radius:var(--radius-md); box-shadow:var(--shadow-md); overflow:hidden;">
            <!-- Card Header -->
            <div style="background:linear-gradient(135deg, var(--color-tierra), var(--color-tierra-oscuro)); padding:3.5rem; text-align:center;">
                <h2 style="color:var(--color-blanco); margin:0; font-size:2.8rem;">Llena el formulario</h2>
                <p style="color:rgba(255,255,255,0.78); margin:0.8rem 0 0; font-size:1.5rem;">Respondemos en menos de 24 horas</p>
            </div>

            <!-- Form Body -->
            <div style="padding:4rem;">
                <form class="contacto" action="includes/fuctions/Ecorreo.php" method="post">

                    <!-- Sección Personal -->
                    <div style="margin-bottom:3.5rem;">
                        <h3 style="font-size:1.8rem; color:var(--color-tierra); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:2.5rem; padding-bottom:1rem; border-bottom:2px solid var(--color-crema-oscura);">
                            <i class="fa fa-user" style="margin-right:0.8rem;"></i> Información Personal
                        </h3>

                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:2rem;">
                            <div>
                                <label for="nombre" style="font-size:1.3rem; color:var(--color-texto); margin-bottom:0.6rem; display:block; text-transform:uppercase; letter-spacing:0.05em; font-weight:600;">Nombre *</label>
                                <input type="text" id="nombre" placeholder="Tu nombre completo" name="nombre" required
                                    style="border:2px solid var(--color-crema-oscura); border-radius:var(--radius-sm); background:var(--color-crema); font-family:var(--font-body); transition:border-color 0.3s; margin-bottom:0;">
                            </div>
                            <div>
                                <label for="email" style="font-size:1.3rem; color:var(--color-texto); margin-bottom:0.6rem; display:block; text-transform:uppercase; letter-spacing:0.05em; font-weight:600;">Correo electrónico *</label>
                                <input type="email" id="email" placeholder="tu@correo.com" name="correo" required
                                    style="border:2px solid var(--color-crema-oscura); border-radius:var(--radius-sm); background:var(--color-crema); font-family:var(--font-body); transition:border-color 0.3s; margin-bottom:0;">
                            </div>
                        </div>

                        <div style="margin-top:2rem;">
                            <label for="telefono" style="font-size:1.3rem; color:var(--color-texto); margin-bottom:0.6rem; display:block; text-transform:uppercase; letter-spacing:0.05em; font-weight:600;">Teléfono *</label>
                            <input type="tel" id="telefono" placeholder="Tu número de teléfono" name="tel" required
                                style="border:2px solid var(--color-crema-oscura); border-radius:var(--radius-sm); background:var(--color-crema); font-family:var(--font-body); transition:border-color 0.3s; margin-bottom:0;">
                        </div>

                        <div style="margin-top:2rem;">
                            <label for="msg" style="font-size:1.3rem; color:var(--color-texto); margin-bottom:0.6rem; display:block; text-transform:uppercase; letter-spacing:0.05em; font-weight:600;">Mensaje *</label>
                            <textarea id="msg" name="mensaje" required
                                style="border:2px solid var(--color-crema-oscura); border-radius:var(--radius-sm); background:var(--color-crema); font-family:var(--font-body); height:15rem; resize:vertical; margin-bottom:0;"
                                placeholder="Cuéntanos en qué podemos ayudarte..."></textarea>
                        </div>
                    </div>

                    <!-- Sección Pedido -->
                    <div style="margin-bottom:3.5rem;">
                        <h3 style="font-size:1.8rem; color:var(--color-tierra); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:2.5rem; padding-bottom:1rem; border-bottom:2px solid var(--color-crema-oscura);">
                            <i class="fa fa-shopping-basket" style="margin-right:0.8rem;"></i> Información del Pedido
                        </h3>
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:2rem;">
                            <div>
                                <label for="opciones" style="font-size:1.3rem; color:var(--color-texto); margin-bottom:0.6rem; display:block; text-transform:uppercase; letter-spacing:0.05em; font-weight:600;">¿Vende o Compra? *</label>
                                <select id="opciones" name="opc" required
                                    style="border:2px solid var(--color-crema-oscura); border-radius:var(--radius-sm); background:var(--color-crema); font-family:var(--font-body); margin-bottom:0;">
                                    <option value="" disabled selected>-- Seleccione --</option>
                                    <option value="Compra">Compra</option>
                                    <option value="Vende">Vende / Distribuidor</option>
                                </select>
                            </div>
                            <div>
                                <label for="cantidad" style="font-size:1.3rem; color:var(--color-texto); margin-bottom:0.6rem; display:block; text-transform:uppercase; letter-spacing:0.05em; font-weight:600;">Cantidad aproximada</label>
                                <input type="number" id="cantidad" min="0" max="100" name="cantidad"
                                    placeholder="Ej. 50"
                                    style="border:2px solid var(--color-crema-oscura); border-radius:var(--radius-sm); background:var(--color-crema); font-family:var(--font-body); margin-bottom:0;">
                            </div>
                        </div>
                    </div>

                    <!-- Botón Enviar -->
                    <button type="submit" class="btn btn-primary" style="width:100%; justify-content:center; font-size:1.7rem; padding:1.8rem;">
                        <i class="fa fa-paper-plane" style="margin-right:0.8rem;"></i> Enviar Mensaje
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php }else{
    include_once 'includes/templades/header.php';
?>

<!-- Página para usuarios no logueados -->
<main style="background:var(--color-crema); padding:10rem 0; min-height:70vh; display:flex; align-items:center;">
    <div class="contenedor" style="text-align:center; max-width:55rem;">
        <div style="font-size:6rem; margin-bottom:2rem;">🔒</div>
        <h2>Acceso Requerido</h2>
        <p style="font-size:1.7rem; margin-bottom:3rem;">Inicia sesión para acceder al formulario de contacto y todas las funciones de Tolito.</p>
        <div style="display:flex; gap:1.6rem; justify-content:center; flex-wrap:wrap;">
            <a href="perfill.php" class="btn btn-primary">Iniciar sesión</a>
            <a href="perfils.php" class="btn btn-outline" style="color:var(--color-tierra); border-color:var(--color-tierra);">Registrarse</a>
        </div>
    </div>
</main>

<?php } ?>
<?php include_once 'includes/templades/footer.php'?>
