<?php session_start();
if(isset($_SESSION['usuario'])){
    include_once 'includes/templades/header_index_log.php';?>

<?php }else{
    include_once 'includes/templades/header_index.php';?>
<?php } ?>

    <!-- ================================================
         SECCIÓN: NUESTROS FAVORITOS
         ================================================ -->
    <section class="seccion-favoritos">
        <div class="contenedor">
            <div class="fav-header">
                <div>
                    <span class="seccion-label">Lo más pedido</span>
                    <h2>Nuestros Favoritos</h2>
                    <p class="sec-subtitle">Los más pedidos de la semana por nuestra comunidad.</p>
                </div>
                <a href="anuncios.php" class="ver-todo-link">
                    Ver todo el catálogo &nbsp;<i class="fa fa-arrow-right"></i>
                </a>
            </div>

            <div class="grid-tamales">
                <!-- Tamal de Mole -->
                <article class="card-tamal">
                    <div class="card-tamal-img-wrap">
                        <img src="img/anuncio1.jpg" alt="Tamal de Mole" class="card-tamal-img">
                        <span class="card-tamal-badge">⭐ Favorito</span>
                    </div>
                    <div class="card-tamal-body">
                        <h3>Tamal de Mole</h3>
                        <p>Pollo deshebrado en nuestro mole artesanal con 24 ingredientes.</p>
                        <a href="anuncios.php" class="btn btn-primary">Ver más</a>
                    </div>
                </article>

                <!-- Tamal Verde -->
                <article class="card-tamal">
                    <div class="card-tamal-img-wrap">
                        <img src="img/anuncio2.jpg" alt="Tamal Verde" class="card-tamal-img">
                        <span class="card-tamal-badge">🌿 Clásico</span>
                    </div>
                    <div class="card-tamal-body">
                        <h3>Tamal Verde</h3>
                        <p>Salsa verde de tomatillo y chile serrano con carne de cerdo premium.</p>
                        <a href="anuncios.php" class="btn btn-primary">Ver más</a>
                    </div>
                </article>

                <!-- Tamal de Dulce -->
                <article class="card-tamal">
                    <div class="card-tamal-img-wrap">
                        <img src="img/anuncio3.jpg" alt="Tamal de Dulce" class="card-tamal-img">
                        <span class="card-tamal-badge">🍬 Dulce</span>
                    </div>
                    <div class="card-tamal-body">
                        <h3>Tamal de Dulce</h3>
                        <p>El clásico rosa con pasas y un toque de canela. Dulzura tradicional.</p>
                        <a href="anuncios.php" class="btn btn-primary">Ver más</a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- ================================================
         SECCIÓN: TRADICIÓN VIBRANTE (Brand Storytelling)
         ================================================ -->
    <section class="seccion-tradicion">
        <div class="contenedor">
            <div class="tradicion-grid">
                <!-- Imagen -->
                <div class="tradicion-imagen">
                    <img src="img/nosotros.jpg" alt="Tradición artesanal Tolito">
                    <div class="tradicion-badge">
                        <span class="badge-number">25</span>
                        <span class="badge-text">años de<br>tradición</span>
                    </div>
                </div>

                <!-- Texto -->
                <div class="tradicion-texto">
                    <span class="seccion-label">Nuestra esencia</span>
                    <h2>Tradición Vibrante</h2>
                    <p>
                        En Tolito, creemos que un tamal es más que alimento; es un legado envuelto
                        en hojas de maíz. Llevamos la esencia de México a tu mesa con ingredientes
                        seleccionados de productores locales y procesos 100% artesanales.
                    </p>

                    <div class="pilares-grid">
                        <div class="pilar">
                            <div class="pilar-icon">🌽</div>
                            <div class="pilar-texto">
                                <h4>Receta Ancestral</h4>
                                <p>Seguimos los pasos de nuestras abuelas para un sabor inigualable.</p>
                            </div>
                        </div>
                        <div class="pilar">
                            <div class="pilar-icon">🌿</div>
                            <div class="pilar-texto">
                                <h4>Ingredientes Naturales</h4>
                                <p>Maíz no transgénico y chiles de la mejor calidad nacional.</p>
                            </div>
                        </div>
                        <div class="pilar">
                            <div class="pilar-icon">🤲</div>
                            <div class="pilar-texto">
                                <h4>Hecho con Amor</h4>
                                <p>Cada pieza es envuelta individualmente a mano por nuestros maestros tamaleros.</p>
                            </div>
                        </div>
                    </div>

                    <a href="nosotros.php" class="btn btn-primary">Conoce nuestra historia &nbsp;<i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- ================================================
         BANNER CTA
         ================================================ -->
    <section class="banner-cta">
        <div class="contenedor">
            <h2>¡Enorme variedad de sabores!</h2>
            <p>No te limites. Tenemos un abanico de opciones para que tu paladar descubra nuevas tradiciones.</p>
            <a href="anuncios.php" class="btn btn-dorado">
                Explorar catálogo &nbsp;<i class="fa fa-arrow-right"></i>
            </a>
        </div>
    </section>

<?php include_once 'includes/templades/footer.php'?>