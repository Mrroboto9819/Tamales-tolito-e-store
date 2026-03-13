<?php
session_start();
if(isset($_SESSION['usuario'])){
    include_once 'includes/templades/headerloget.php';
}else{
    include_once 'includes/templades/header.php';
}
?>

    <!-- ================================================
         HERO: NUESTRA HISTORIA
         ================================================ -->
    <section class="nosotros-hero">
        <div class="contenedor">
            <span class="seccion-label" style="color: var(--color-dorado-claro); display:block; text-align:center; margin-bottom:1.4rem;">✦ Desde 1999 ✦</span>
            <h1>25 Años de Tradición<br>y Sabor Auténtico</h1>
            <p>
                Bienvenidos a la familia Tolito, donde el corazón de nuestra cocina late
                con el ritmo del nixtamal y recetas ancestrales.
            </p>
        </div>
    </section>

    <!-- ================================================
         NUESTRA TRAYECTORIA (Timeline)
         ================================================ -->
    <section class="seccion-historia">
        <div class="contenedor">
            <span class="seccion-label" style="text-align:center; display:block; margin-bottom:1.2rem;">Nuestra trayectoria</span>
            <h2 style="text-align:center;">Una Historia de Amor por la Tradición</h2>

            <div class="timeline">
                <!-- Inicio -->
                <div class="timeline-item">
                    <div class="timeline-dot">1</div>
                    <div class="timeline-content">
                        <span class="year">El Comienzo · 1999</span>
                        <h3>El Comienzo</h3>
                        <p>
                            Doña Tolito comenzó en una pequeña cocina local con un solo molino,
                            compartiendo tortillas hechas a mano con las recetas que su abuela le heredó.
                        </p>
                    </div>
                </div>

                <!-- Crecimiento -->
                <div class="timeline-item">
                    <div class="timeline-dot">2</div>
                    <div class="timeline-content">
                        <span class="year">Crecimiento · 2010</span>
                        <h3>Crecimiento Artesanal</h3>
                        <p>
                            Incorporamos molinos de piedra volcánica tradicionales para mantener
                            la textura original del maíz, expandiendo nuestra presencia a toda la región.
                        </p>
                    </div>
                </div>

                <!-- Legado -->
                <div class="timeline-item">
                    <div class="timeline-dot">3</div>
                    <div class="timeline-content">
                        <span class="year">Legado · Hoy</span>
                        <h3>Legado Generacional</h3>
                        <p>
                            Cumplimos 25 años honrando nuestras raíces, integrando a la tercera
                            generación de la familia y manteniendo la esencia del nixtamal puro.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================================================
         PROCESO ARTESANAL
         ================================================ -->
    <section class="seccion-proceso">
        <div class="contenedor">
            <span class="seccion-label" style="text-align:center; display:block; margin-bottom:1.2rem;">Nuestro método</span>
            <h2 style="text-align:center;">Nuestro Proceso Artesanal</h2>
            <p style="text-align:center; max-width:60rem; margin:0 auto;">
                No usamos harinas industriales. Seleccionamos el mejor maíz criollo y seguimos
                el proceso milenario que garantiza sabor y nutrición.
            </p>

            <div class="proceso-grid">
                <div class="proceso-card">
                    <div class="proceso-icon">💧</div>
                    <h3>Nixtamalización</h3>
                    <p>Cocción lenta con cal de grado alimenticio para liberar nutrientes y desarrollar el sabor único del maíz nixtamalizado.</p>
                </div>
                <div class="proceso-card">
                    <div class="proceso-icon">⚙️</div>
                    <h3>Molienda en Piedra</h3>
                    <p>Piedras de cantera que otorgan esa textura única e inigualable, preservando la tradición milenaria del pueblo mexicano.</p>
                </div>
                <div class="proceso-card">
                    <div class="proceso-icon">🌽</div>
                    <h3>Selección de Maíz</h3>
                    <p>Trabajamos con agricultores locales para asegurar maíz criollo no transgénico de la mejor calidad de la temporada.</p>
                </div>
                <div class="proceso-card">
                    <div class="proceso-icon">🤲</div>
                    <h3>Envuelto a Mano</h3>
                    <p>Cada tamal es envuelto individualmente por nuestros maestros tamaleros, garantizando calidad y amor en cada pieza.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================================================
         NUESTRA ESENCIA (Visual)
         ================================================ -->
    <section class="seccion-esencia">
        <div class="contenedor">
            <span class="seccion-label">El arte de la Nixtamalización</span>
            <h2>Tradición que se siente</h2>
            <p class="sec-subtitle">
                Nuestros secretos son ingredientes seleccionados con pasión y conocimiento ancestral.
            </p>

            <div class="esencia-grid">
                <div class="esencia-card">
                    <div class="esencia-icon">🌽</div>
                    <h3>Maíz Criollo</h3>
                    <p>Seleccionamos variedades criollas locales libres de transgénicos, preservando la biodiversidad agrícola de México.</p>
                </div>
                <div class="esencia-card">
                    <div class="esencia-icon">🌵</div>
                    <h3>Nopal Orgánico</h3>
                    <p>Incorporamos nopal fresco orgánico para enriquecer nutricionalmente nuestras preparaciones especiales.</p>
                </div>
                <div class="esencia-card">
                    <div class="esencia-icon">🌶️</div>
                    <h3>Especias de Origen</h3>
                    <p>Chiles, hierbas y especias directamente de los productores regionales. Sabores auténticos de la tierra mexicana.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================================================
         NUESTROS VALORES
         ================================================ -->
    <section class="seccion-valores">
        <div class="contenedor">
            <span class="seccion-label" style="text-align:center; display:block; margin-bottom:1.2rem;">Por qué elegirnos</span>
            <h2 style="text-align:center;">Nuestros Valores</h2>

            <div class="valores-grid">
                <div class="valor-card">
                    <div class="valor-icon">🛡️</div>
                    <h3>Seguridad Alimentaria</h3>
                    <p>Garantizamos los más altos estándares de higiene en cada paso de nuestra cadena de producción.</p>
                </div>
                <div class="valor-card">
                    <div class="valor-icon">💰</div>
                    <h3>Mejor Precio</h3>
                    <p>Calidad premium a precios justos, para que la verdadera tradición esté en todas las mesas.</p>
                </div>
                <div class="valor-card">
                    <div class="valor-icon">🚀</div>
                    <h3>A Tiempo</h3>
                    <p>Compromiso con la puntualidad en nuestras entregas para que nunca falte el sabor en tu negocio u hogar.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================================================
         CTA FINAL
         ================================================ -->
    <section class="cta-historia">
        <div class="contenedor">
            <span class="seccion-label" style="display:block; text-align:center; margin-bottom:1.2rem;">Únete a la familia</span>
            <h2>¿Quieres ser parte de nuestra historia?</h2>
            <p>
                Estamos listos para llevar el sabor del verdadero nixtamal a tu mesa o negocio.
                Contáctanos hoy mismo.
            </p>
            <div style="display:flex; gap:1.6rem; justify-content:center; flex-wrap:wrap;">
                <a href="contacto.php" class="btn btn-primary">Contáctanos &nbsp;<i class="fa fa-envelope"></i></a>
                <a href="anuncios.php" class="btn btn-outline" style="color:var(--color-tierra); border-color:var(--color-tierra);">Ver catálogo</a>
            </div>
        </div>
    </section>

<?php include_once 'includes/templades/footer.php'?>