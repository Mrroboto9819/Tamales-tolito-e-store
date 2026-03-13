<?php
session_start();
$logueado = isset($_SESSION['usuario']);

if($logueado){
    include_once 'includes/templades/headerloget.php';
} else {
    include_once 'includes/templades/header.php';
}

/* ====================================================
   CATÁLOGO ESTÁTICO - 42 TAMALES ARTESANALES
   Las imágenes del proyecto se usan de forma rotatoria.
   ====================================================*/
$imagenes = [
    'img/anuncio1.jpg',
    'img/anuncio2.jpg',
    'img/anuncio3.jpg',
    'img/anuncio4.jpg',
    'img/anuncio5.jpg',
    'img/anuncio6.jpg',
    'img/anuncio7.jpg',
    'img/anuncio8.jpg',
    'img/anuncio9.jpg',
    'img/tamales-gourmet-a.jpg',
    'img/tamales-gourmet-b.jpg',
    'img/tamales-gourmet-h.jpg',
    'img/tamales-gourmet-m.jpg',
    'img/tamales-choco.png',
    'img/Tamal-gourmet-dulce2.jpg',
    'img/tamales_presentacion.webp',
];

$catalogo = [
    /* ─── SALADOS CLÁSICOS ─── */
    [
        'nombre'      => 'Tamal de Mole Negro',
        'descripcion' => 'Pollo deshebrado bañado en nuestro mole negro artesanal con 24 ingredientes. El más pedido de la semana.',
        'precio'      => '28.00',
        'categoria'   => 'Salados',
        'badge'       => '⭐ Favorito',
    ],
    [
        'nombre'      => 'Tamal Verde',
        'descripcion' => 'Salsa verde de tomatillo y chile serrano con carne de cerdo premium. Clásico irresistible.',
        'precio'      => '25.00',
        'categoria'   => 'Salados',
        'badge'       => '🌿 Clásico',
    ],
    [
        'nombre'      => 'Tamal Rojo de Cerdo',
        'descripcion' => 'Carne de cerdo en salsa roja de guajillo, ancho y pasilla. Tradición y sabor en cada bocado.',
        'precio'      => '25.00',
        'categoria'   => 'Salados',
        'badge'       => '',
    ],
    [
        'nombre'      => 'Tamal de Rajas con Queso',
        'descripcion' => 'Rajas de chile poblano con queso Oaxaca fundido. La opción perfecta para los amantes del queso.',
        'precio'      => '22.00',
        'categoria'   => 'Salados',
        'badge'       => '🌶️ Popular',
    ],
    [
        'nombre'      => 'Tamal de Frijoles y Epazote',
        'descripcion' => 'Frijoles negros con epazote fresco y chile de árbol. Sencillo, nutritivo y delicioso.',
        'precio'      => '18.00',
        'categoria'   => 'Salados',
        'badge'       => '🫘 Vegano',
    ],
    [
        'nombre'      => 'Tamal de Tinga de Pollo',
        'descripcion' => 'Pollo en salsa de tomate asado con chipotle en adobo y cebolla caramelizada.',
        'precio'      => '26.00',
        'categoria'   => 'Salados',
        'badge'       => '🔥 Picante',
    ],
    [
        'nombre'      => 'Tamal de Barbacoa',
        'descripcion' => 'Barbacoa de borrego cocida lentamente en hojas de maguey con chile guajillo y especias.',
        'precio'      => '30.00',
        'categoria'   => 'Salados',
        'badge'       => '🏆 Premium',
    ],
    [
        'nombre'      => 'Tamal al Pastor',
        'descripcion' => 'Carne al pastor con achiote, chile guajillo y piña caramelizada. ¡El favorito de los tacos en tamal!',
        'precio'      => '28.00',
        'categoria'   => 'Salados',
        'badge'       => '🍍 Especial',
    ],
    [
        'nombre'      => 'Tamal de Cochinita Pibil',
        'descripcion' => 'Cerdo marinado en achiote yucateco con naranja agria, envuelto en hoja de plátano. Auténtico sabor del sureste.',
        'precio'      => '32.00',
        'categoria'   => 'Salados',
        'badge'       => '🌺 Yucatán',
    ],
    [
        'nombre'      => 'Tamal Habanero Spicy',
        'descripcion' => 'Pollo con salsa de chile habanero y toques de olivo. Para los valientes que aman el picante extremo.',
        'precio'      => '27.00',
        'categoria'   => 'Salados',
        'badge'       => '🌶️🌶️ Muy Picante',
    ],
    [
        'nombre'      => 'Tamal de Jalapeño con Queso',
        'descripcion' => 'Chile jalapeño tatemado con mezcla de quesos manchego y Oaxaca. Equilibrio perfecto de sabor.',
        'precio'      => '24.00',
        'categoria'   => 'Salados',
        'badge'       => '',
    ],
    [
        'nombre'      => 'Tamal de Chipotle con Pollo',
        'descripcion' => 'Pollo deshebrado en salsa de chipotle ahumado con crema y epazote. Sabor profundo e irresistible.',
        'precio'      => '26.00',
        'categoria'   => 'Salados',
        'badge'       => '🤤 Nuevo',
    ],
    [
        'nombre'      => 'Tamal de Picadillo',
        'descripcion' => 'Carne molida de res con zanahoria, papa, chícharo y pasas en salsa de tomate. Receta de abuela.',
        'precio'      => '23.00',
        'categoria'   => 'Salados',
        'badge'       => '',
    ],
    [
        'nombre'      => 'Tamal de Chorizo con Papa',
        'descripcion' => 'Chorizo de cerdo con papa dorada y chiles serranos. Desayuno o cena, siempre cae bien.',
        'precio'      => '24.00',
        'categoria'   => 'Salados',
        'badge'       => '🥔 Popular',
    ],
    [
        'nombre'      => 'Tamal de Camarones a la Diabla',
        'descripcion' => 'Camarones jugosos en salsa roja diabla con chile de árbol y cascabel. Del mar a tu tamal.',
        'precio'      => '35.00',
        'categoria'   => 'Mariscos',
        'badge'       => '🦐 Del Mar',
    ],
    [
        'nombre'      => 'Tamal de Pulpo al Ajo',
        'descripcion' => 'Pulpo tierno en aceite de ajo con chile de árbol y perejil fresco. Exclusivo de temporada.',
        'precio'      => '38.00',
        'categoria'   => 'Mariscos',
        'badge'       => '🐙 Exclusivo',
    ],
    [
        'nombre'      => 'Tamal de Elote con Rajas',
        'descripcion' => 'Masa de elote fresco con rajas de chile poblano y queso fresco. Vegano y lleno de sabor.',
        'precio'      => '20.00',
        'categoria'   => 'Salados',
        'badge'       => '🌽 Vegano',
    ],
    [
        'nombre'      => 'Tamal de Hongos con Chile',
        'descripcion' => 'Mezcla de hongos portobello, shiitake y champiñones con chile pasilla. Alta cocina artesanal.',
        'precio'      => '26.00',
        'categoria'   => 'Salados',
        'badge'       => '🍄 Gourmet',
    ],
    [
        'nombre'      => 'Tamal de Verduras Mixtas',
        'descripcion' => 'Calabaza, zanahoria, chayote y espinaca con salsa verde. El favorito de quienes cuidan su alimentación.',
        'precio'      => '20.00',
        'categoria'   => 'Salados',
        'badge'       => '🥦 Vegano',
    ],
    [
        'nombre'      => 'Tamal Oaxaqueño de Mole',
        'descripcion' => 'Envuelto en hoja de plátano al estilo oaxaqueño, con mole negro y pollo. Tradición del istmo.',
        'precio'      => '34.00',
        'categoria'   => 'Regionales',
        'badge'       => '🌿 Oaxaca',
    ],
    [
        'nombre'      => 'Uchepo Michoacano',
        'descripcion' => 'Tamal de elote tierno estilo Michoacán, dulce y suave, servido con crema y salsa. Una delicia única.',
        'precio'      => '22.00',
        'categoria'   => 'Regionales',
        'badge'       => '✨ Regional',
    ],
    [
        'nombre'      => 'Corunda Purépecha',
        'descripcion' => 'Masa triangular rellena de rajas y crema. El tamal sagrado de los purépechas de Michoacán.',
        'precio'      => '22.00',
        'categoria'   => 'Regionales',
        'badge'       => '🔺 Regional',
    ],
    [
        'nombre'      => 'Tamal Veracruzano de Elote',
        'descripcion' => 'Masa de elote con azúcar envuelta en hoja de elote, al estilo veracruzano. Dulce y aromático.',
        'precio'      => '20.00',
        'categoria'   => 'Regionales',
        'badge'       => '🌊 Veracruz',
    ],
    [
        'nombre'      => 'Tamal de Mole Amarillo',
        'descripcion' => 'Pollo con mole amarillo oaxaqueño y ejotes. Una experiencia de color y sabor inigualable.',
        'precio'      => '30.00',
        'categoria'   => 'Salados',
        'badge'       => '🟡 Especial',
    ],
    [
        'nombre'      => 'Tamal de Res con Chile Colorado',
        'descripcion' => 'Carne de res deshebrada en chile colorado con comino y orégano. Nutritivo y abundante.',
        'precio'      => '27.00',
        'categoria'   => 'Salados',
        'badge'       => '',
    ],
    [
        'nombre'      => 'Tamal de Guajolote en Recado',
        'descripcion' => 'Pavo guisado con recado negro y especias yucatecas en hoja de plátano. Alta cocina maya.',
        'precio'      => '36.00',
        'categoria'   => 'Salados',
        'badge'       => '🦃 Navideño',
    ],
    [
        'nombre'      => 'Tamal de Rajas con Crema',
        'descripcion' => 'Rajas de chile poblano, elote, crema y queso panela. El más cremoso de nuestra colección.',
        'precio'      => '23.00',
        'categoria'   => 'Salados',
        'badge'       => '🧀 Cremoso',
    ],
    /* ─── DULCES ─── */
    [
        'nombre'      => 'Tamal de Dulce Clásico',
        'descripcion' => 'El clásico rosa con pasas y un toque de canela. Dulzura tradicional para toda la familia.',
        'precio'      => '18.00',
        'categoria'   => 'Dulces',
        'badge'       => '🍬 Clásico',
    ],
    [
        'nombre'      => 'Tamal de Piña',
        'descripcion' => 'Exquisito tamal con base de piña dulce y coco rallado tostado. Sabor tropical irresistible.',
        'precio'      => '20.00',
        'categoria'   => 'Dulces',
        'badge'       => '🍍 Tropical',
    ],
    [
        'nombre'      => 'Tamal de Fresa',
        'descripcion' => 'Masa teñida con fresas naturales y rellena de mermelada artesanal. Dulce y frutal.',
        'precio'      => '21.00',
        'categoria'   => 'Dulces',
        'badge'       => '🍓 Frutal',
    ],
    [
        'nombre'      => 'Tamal de Chocolate',
        'descripcion' => 'Masa de cacao puro con relleno de crema de chocolate chocolate amargo 70%. Para los chocolateros.',
        'precio'      => '24.00',
        'categoria'   => 'Dulces',
        'badge'       => '🍫 Premium',
    ],
    [
        'nombre'      => 'Tamal de Cajeta',
        'descripcion' => 'Relleno de cajeta artesanal de Celaya con nuez picada. Dulce de leche que derrite el corazón.',
        'precio'      => '23.00',
        'categoria'   => 'Dulces',
        'badge'       => '🥛 Favorito',
    ],
    [
        'nombre'      => 'Tamal de Mango con Chile',
        'descripcion' => 'Mango manila caramelizado con chamoy y chile piquín. El contraste perfecto entre dulce y picante.',
        'precio'      => '22.00',
        'categoria'   => 'Dulces',
        'badge'       => '🥭 Antojito',
    ],
    [
        'nombre'      => 'Tamal de Coco',
        'descripcion' => 'Masa de coco con relleno de crema de coco y leche condensada. Recuerda las playas mexicanas.',
        'precio'      => '21.00',
        'categoria'   => 'Dulces',
        'badge'       => '🥥 Tropical',
    ],
    [
        'nombre'      => 'Tamal de Nuez con Pasas',
        'descripcion' => 'Masa de piloncillo con nuez tostada y pasas sultanas. Textura crujiente y sabor profundo.',
        'precio'      => '22.00',
        'categoria'   => 'Dulces',
        'badge'       => '',
    ],
    [
        'nombre'      => 'Tamal de Guayaba',
        'descripcion' => 'Puré de guayaba fresca con azúcar de caña y canela. Un sabor que transporta a lo mejor del campo.',
        'precio'      => '20.00',
        'categoria'   => 'Dulces',
        'badge'       => '',
    ],
    [
        'nombre'      => 'Tamal de Naranja con Almendra',
        'descripcion' => 'Masa aromatizada con ralladura de naranja y rellena de crema de almendra tostada.',
        'precio'      => '22.00',
        'categoria'   => 'Dulces',
        'badge'       => '🍊 Cítrico',
    ],
    /* ─── EDICIÓN ESPECIAL ─── */
    [
        'nombre'      => 'Tamal Gourmet de Trufa',
        'descripcion' => 'Masa infusionada con aceite de trufa negra y relleno de setas silvestres. Edición de lujo.',
        'precio'      => '55.00',
        'categoria'   => 'Edición Especial',
        'badge'       => '⚜️ Lujo',
    ],
    [
        'nombre'      => 'Tamal de Langosta al Ajillo',
        'descripcion' => 'Langosta fresca con mantequilla de ajo negro y hierbas finas. El tamal más exclusivo de la colección.',
        'precio'      => '75.00',
        'categoria'   => 'Edición Especial',
        'badge'       => '🦞 Exclusivo',
    ],
    [
        'nombre'      => 'Tamal de Salmón con Alcaparras',
        'descripcion' => 'Salmón ahumado con crema de alcaparras y eneldo fresco en hoja de plátano. Fusión gourmet.',
        'precio'      => '45.00',
        'categoria'   => 'Edición Especial',
        'badge'       => '🐟 Fusión',
    ],
    [
        'nombre'      => 'Tamal Vegano Superfoods',
        'descripcion' => 'Quinoa, chía, espinaca baby y queso de anacardo. Salud y tradición en perfecta armonía.',
        'precio'      => '32.00',
        'categoria'   => 'Edición Especial',
        'badge'       => '💚 Superfood',
    ],
    [
        'nombre'      => 'Tamal de Cabrito Norteño',
        'descripcion' => 'Cabrito estilo Nuevo León con chile ancho y epazote. El norte de México en cada bocado.',
        'precio'      => '40.00',
        'categoria'   => 'Edición Especial',
        'badge'       => '🐐 Norte',
    ],
    [
        'nombre'      => 'Tamal de Flor de Jamaica',
        'descripcion' => 'Masa rojiza con flor de Jamaica y jengibre, rellena de queso de cabra. Único e irresistible.',
        'precio'      => '30.00',
        'categoria'   => 'Edición Especial',
        'badge'       => '🌺 Artesanal',
    ],
];

/* ─── Filtro de búsqueda ─── */
$buscar = isset($_GET['buscar']) ? trim(strtolower($_GET['buscar'])) : '';
if($buscar !== ''){
    $catalogo = array_filter($catalogo, function($p) use ($buscar){
        return strpos(strtolower($p['nombre']), $buscar) !== false
            || strpos(strtolower($p['descripcion']), $buscar) !== false
            || strpos(strtolower($p['categoria']), $buscar) !== false;
    });
}

/* ─── Filtro de categoría ─── */
$catFiltro  = isset($_GET['cat']) ? $_GET['cat'] : '';
$categorias = ['Salados','Dulces','Mariscos','Regionales','Edición Especial'];
if($catFiltro !== ''){
    $catalogo = array_filter($catalogo, fn($p) => $p['categoria'] === $catFiltro);
}
$catalogo = array_values($catalogo);
?>

<!-- ================================================
     HERO INTERIOR - TIENDA
     ================================================ -->
<section class="nosotros-hero" style="padding: 10rem 0 5rem;">
    <div class="contenedor" style="text-align:center;">
        <span class="seccion-label" style="color:var(--color-dorado-claro); display:block; margin-bottom:1.2rem;">🫔 Catálogo completo</span>
        <h1>Tamales Disponibles</h1>
        <p style="color:rgba(255,255,255,0.78); max-width:55rem; margin: 1.2rem auto 0;">
            <?php echo count($catalogo); ?> variedades artesanales, frescas y preparadas diariamente. Elige tus favoritas.
        </p>
    </div>
</section>

<!-- ================================================
     BARRA DE BÚSQUEDA + FILTROS
     ================================================ -->
<section style="background:var(--color-crema); padding: 2.5rem 0; border-bottom: 1px solid var(--color-crema-oscura); position:sticky; top:0; z-index:100; box-shadow:var(--shadow-sm);">
    <div class="contenedor">
        <!-- Búsqueda -->
        <form action="anuncios.php" method="GET" style="display:flex; gap:1rem; max-width:60rem; margin:0 auto 1.8rem;">
            <?php if($catFiltro): ?>
                <input type="hidden" name="cat" value="<?php echo htmlspecialchars($catFiltro); ?>">
            <?php endif; ?>
            <input type="text" name="buscar" id="inputbuscar"
                value="<?php echo htmlspecialchars($buscar); ?>"
                placeholder="Buscar tamal (nombre, sabor, categoría...)"
                style="flex:1; padding:1.2rem 1.8rem; border:2px solid var(--color-crema-oscura); border-radius:50px; background:var(--color-blanco); font-size:1.5rem; font-family:var(--font-body); color:var(--color-texto); outline:none;">
            <button type="submit" style="background:var(--color-tierra); color:#fff; border:none; padding:1.2rem 2.4rem; border-radius:50px; font-size:1.5rem; cursor:pointer; display:flex; align-items:center; gap:0.6rem; font-family:var(--font-body); font-weight:600; white-space:nowrap;">
                <i class="fa fa-search"></i> Buscar
            </button>
        </form>

        <!-- Filtros de categoría -->
        <div style="display:flex; gap:1rem; justify-content:center; flex-wrap:wrap;">
            <a href="anuncios.php<?php echo $buscar ? '?buscar='.urlencode($buscar) : ''; ?>"
               style="padding:0.7rem 1.8rem; border-radius:50px; font-size:1.35rem; font-weight:600; text-decoration:none; border:2px solid <?php echo $catFiltro==='' ? 'var(--color-tierra)' : 'var(--color-crema-oscura)'; ?>; background:<?php echo $catFiltro==='' ? 'var(--color-tierra)' : 'transparent'; ?>; color:<?php echo $catFiltro==='' ? '#fff' : 'var(--color-texto-claro)'; ?>; transition:all 0.25s;">
                Todos
            </a>
            <?php foreach($categorias as $cat):
                $active = ($catFiltro === $cat);
                $href = 'anuncios.php?cat='.urlencode($cat).($buscar ? '&buscar='.urlencode($buscar) : '');
            ?>
            <a href="<?php echo $href; ?>"
               style="padding:0.7rem 1.8rem; border-radius:50px; font-size:1.35rem; font-weight:600; text-decoration:none; border:2px solid <?php echo $active ? 'var(--color-tierra)' : 'var(--color-crema-oscura)'; ?>; background:<?php echo $active ? 'var(--color-tierra)' : 'transparent'; ?>; color:<?php echo $active ? '#fff' : 'var(--color-texto-claro)'; ?>; transition:all 0.25s;">
                <?php echo htmlspecialchars($cat); ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ================================================
     GRID DE PRODUCTOS
     ================================================ -->
<main style="background:var(--color-blanco); padding: 6rem 0 8rem;">
    <div class="contenedor">

        <?php if(empty($catalogo)): ?>
        <div style="text-align:center; padding:6rem 2rem;">
            <div style="font-size:5rem; margin-bottom:2rem;">🫙</div>
            <h3 style="color:var(--color-texto-claro); font-size:2.2rem;">No se encontraron tamales</h3>
            <p style="color:var(--color-texto-claro);">Intenta con otro término o categoría.</p>
            <a href="anuncios.php" class="btn btn-primary" style="margin-top:2rem; display:inline-flex;">Ver todo el catálogo</a>
        </div>
        <?php else: ?>

        <div class="grid-tamales">
        <?php foreach($catalogo as $i => $producto):
            $img = $imagenes[$i % count($imagenes)];
        ?>
            <article class="card-tamal">
                <div class="card-tamal-img-wrap">
                    <img src="<?php echo $img; ?>" alt="<?php echo htmlspecialchars($producto['nombre']); ?>" class="card-tamal-img">
                    <?php if($producto['badge']): ?>
                    <span class="card-tamal-badge"><?php echo htmlspecialchars($producto['badge']); ?></span>
                    <?php endif; ?>
                    <span style="position:absolute; bottom:1.2rem; right:1.2rem; background:rgba(26,8,0,0.7); color:rgba(255,255,255,0.85); font-size:1.1rem; padding:0.3rem 0.9rem; border-radius:50px; backdrop-filter:blur(4px);">
                        <?php echo htmlspecialchars($producto['categoria']); ?>
                    </span>
                </div>
                <div class="card-tamal-body">
                    <h3><?php echo htmlspecialchars($producto['nombre']); ?></h3>
                    <p><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                    <p style="font-size:2.2rem; font-weight:700; color:var(--color-tierra); margin-bottom:1.8rem; font-family:var(--font-heading);">
                        $<?php echo number_format((float)$producto['precio'], 2); ?>
                        <span style="font-size:1.2rem; font-weight:400; color:var(--color-texto-claro); font-family:var(--font-body);"> MXN / pieza</span>
                    </p>

                    <?php if($logueado): ?>
                    <div style="display:flex; flex-direction:column; gap:1rem;">
                        <form action="carrito.php" method="POST">
                            <input type="hidden" name="pid"         value="<?php echo $i + 1; ?>">
                            <input type="hidden" name="producto"    value="<?php echo htmlspecialchars($producto['nombre']); ?>">
                            <input type="hidden" name="precio"      value="<?php echo htmlspecialchars($producto['precio']); ?>">
                            <input type="hidden" name="descripcion" value="<?php echo htmlspecialchars($producto['descripcion']); ?>">
                            <div style="display:flex; gap:1rem; align-items:center; flex-wrap:wrap;">
                                <label style="font-size:1.3rem; color:var(--color-texto-claro); text-transform:none; font-weight:400; margin:0; display:flex; align-items:center; gap:0.6rem;">
                                    Qty:
                                    <input type="number" name="cantidad" value="1" min="1" max="50"
                                        style="width:6rem; margin:0; padding:0.8rem; border:2px solid var(--color-crema-oscura); border-radius:var(--radius-sm); background:var(--color-blanco); font-family:var(--font-body);">
                                </label>
                                <button type="submit" name="añadir_carro" class="btn btn-primary" value="agregar"
                                    style="flex:1; justify-content:center; padding:1rem 1.6rem; font-size:1.3rem; border-radius:var(--radius-sm);">
                                    <i class="fa fa-shopping-cart"></i> Añadir
                                </button>
                            </div>
                        </form>
                        <form action="favoritos.php" method="POST">
                            <input type="hidden" name="pid"         value="<?php echo $i + 1; ?>">
                            <input type="hidden" name="producto"    value="<?php echo htmlspecialchars($producto['nombre']); ?>">
                            <input type="hidden" name="descripcion" value="<?php echo htmlspecialchars($producto['descripcion']); ?>">
                            <button type="submit" name="añadir_fav" value="agregar"
                                style="background:none; border:2px solid var(--color-crema-oscura); color:var(--color-tierra); border-radius:var(--radius-sm); padding:0.8rem 1.6rem; width:100%; display:flex; align-items:center; justify-content:center; gap:0.6rem; font-size:1.3rem; cursor:pointer; font-family:var(--font-body); transition:all 0.3s;">
                                <i class="fa fa-heart"></i> Guardar en favoritos
                            </button>
                        </form>
                    </div>
                    <?php else: ?>
                    <div style="display:flex; flex-direction:column; gap:1rem;">
                        <form action="perfill.php?error=inidicio_sesion" method="POST">
                            <div style="display:flex; gap:1rem; align-items:center; flex-wrap:wrap;">
                                <label style="font-size:1.3rem; color:var(--color-texto-claro); text-transform:none; font-weight:400; margin:0; display:flex; align-items:center; gap:0.6rem;">
                                    Qty:
                                    <input type="number" name="cantidad" value="1" min="1" max="50"
                                        style="width:6rem; margin:0; padding:0.8rem; border:2px solid var(--color-crema-oscura); border-radius:var(--radius-sm); background:var(--color-blanco); font-family:var(--font-body);">
                                </label>
                                <button type="submit" class="btn btn-primary"
                                    style="flex:1; justify-content:center; padding:1rem 1.6rem; font-size:1.3rem; border-radius:var(--radius-sm);">
                                    <i class="fa fa-shopping-cart"></i> Añadir
                                </button>
                            </div>
                        </form>
                        <form action="perfill.php?error=inidicio_sesion" method="POST">
                            <button type="submit"
                                style="background:none; border:2px solid var(--color-crema-oscura); color:var(--color-tierra); border-radius:var(--radius-sm); padding:0.8rem 1.6rem; width:100%; display:flex; align-items:center; justify-content:center; gap:0.6rem; font-size:1.3rem; cursor:pointer; font-family:var(--font-body); transition:all 0.3s;">
                                <i class="fa fa-heart"></i> Guardar en favoritos
                            </button>
                        </form>
                    </div>
                    <?php endif; ?>
                </div>
            </article>
        <?php endforeach; ?>
        </div>

        <!-- Contador de resultados -->
        <p style="text-align:center; margin-top:5rem; color:var(--color-texto-claro); font-size:1.4rem;">
            Mostrando <strong style="color:var(--color-tierra);"><?php echo count($catalogo); ?></strong> tamales artesanales
            <?php if($catFiltro): echo ' en <strong>' . htmlspecialchars($catFiltro) . '</strong>'; endif; ?>
            <?php if($buscar): echo ' para "<strong>' . htmlspecialchars($buscar) . '</strong>"'; endif; ?>
        </p>

        <?php endif; ?>
    </div>
</main>

<?php include_once 'includes/templades/footer.php'; ?>
