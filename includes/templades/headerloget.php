<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tolito - Tamalería Artesanal. Los mejores tamales artesanales.">
    <title>Tamales Tolito</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="img/ojitos.png">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>

    <header class="site-header">
        <nav class="navbar-tolito scrolled" id="navbar">
            <div class="contenedor navbar-inner">
                <a href="index.php" class="navbar-logo">
                    <img src="img/tolito2.png" alt="Tamales tolito">
                </a>
                <div class="mobile-menu">
                    <a href="#navegacion">
                        <img src="img/barras.svg" alt="Menú">
                    </a>
                </div>
                <nav id="navegacion" class="navegacion">
                    <a href="index.php">Inicio</a>
                    <a href="anuncios.php">Tienda</a>
                    <a href="nosotros.php">Nosotros</a>
                    <a href="contacto.php">Contacto</a>
                    <a href="uporfile.php"><i class="fa fa-user"></i> <?php echo htmlspecialchars($_SESSION['usuario']); ?></a>
                    <a href="favoritos.php"><i class="fa fa-heart"></i> Favoritos</a>
                    <a href="carrito.php"><i class="fa fa-shopping-cart"></i> Carrito</a>
                </nav>
            </div>
        </nav>
    </header>

    <script>
        window.addEventListener('scroll', function() {
            var navbar = document.getElementById('navbar');
            if (window.scrollY > 60) { navbar.classList.add('scrolled'); }
            else { navbar.classList.remove('scrolled'); }
        });
    </script>