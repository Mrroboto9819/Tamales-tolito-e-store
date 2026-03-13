# 🌮 Tamales Tolito - E-Commerce Platform

A fully functional e-commerce platform for buying and selling authentic tamales online. Built with PHP, MySQL, and modern web technologies to provide a seamless shopping experience.

## 📋 Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Technologies](#technologies)
- [Project Structure](#project-structure)
- [Setup Instructions](#setup-instructions)
- [Usage](#usage)
- [Security](#security)
- [Known Limitations](#known-limitations)
- [Recent Improvements](#recent-improvements)
- [Contributing](#contributing)

## 📖 Overview

Tamales Tolito is an e-commerce platform dedicated to selling high-quality, artisanal tamales. The platform allows customers to:
- Browse and search a diverse catalog of tamales
- Create accounts and manage profiles
- Add products to shopping cart and favorites
- Place orders with order details
- Contact the business for special requests or partnerships

The platform also includes an admin panel for managing products and processing orders.

## ✨ Features

### Customer Features
- **User Authentication**: Secure registration and login with bcrypt password hashing
- **Product Catalog**: Browse 42+ varieties of tamales with search and category filtering
- **Shopping Cart**: Add/remove items with persistent session storage
- **Favorites List**: Mark favorite products for quick access
- **Advanced Search**: Full-text search across product names, descriptions, and categories
- **Category Filtering**: Filter products by type (Salados, Dulces, Mariscos, Regionales, Edición Especial)
- **Responsive Design**: Mobile-friendly interface optimized for all devices
- **Contact Form**: Send inquiries, special requests, or partnership proposals

### Admin Features
- **Product Management**: Add, edit, and delete products from the catalog
- **Product Details**: Manage pricing, descriptions, categories, and images
- **User Management**: View and manage customer profiles

## 🛠 Technologies

### Backend
- **PHP 7.x**: Server-side rendering and business logic
- **MySQL/MySQLi**: Database management with prepared statements
- **Session Management**: User authentication and cart persistence

### Frontend
- **HTML5**: Semantic markup
- **CSS3**: Modern styling with custom CSS variables
- **JavaScript/jQuery**: Interactive features and dynamic behavior
- **Font Awesome 4.7**: Icon library
- **Google Fonts**: Playfair Display & Inter typefaces

### Security
- **Password Hashing**: `password_hash()` with bcrypt algorithm
- **Input Validation**: Server-side validation for forms
- **XSS Prevention**: Output escaping with `htmlspecialchars()`
- **SQL Injection Prevention**: MySQLi prepared statements
- **Email Header Injection Prevention**: Input sanitization in contact form
- **Session Security**: Session regeneration on login

## 📁 Project Structure

```
tamales-tolito-e-store/
├── README.md                           # This file
├── .gitignore                          # Git ignore rules (protects db.php)
├── index.php                           # Home page
├── anuncios.php                        # Product catalog & search (main shop page)
├── contacto.php                        # Contact form for inquiries
├── carrito.php                         # Shopping cart
├── favoritos.php                       # Favorites list
├── nosotros.php                        # About us page
├── perfill.php                         # Login page
├── perfils.php                         # Registration page
├── uporfile.php                        # User profile & admin panel
├── css/
│   ├── normalize.css                   # CSS reset
│   └── styles.css                      # Main stylesheet
├── img/                                # Images and assets
│   ├── tolito2.png                     # Logo
│   ├── ojitos.png                      # Favicon
│   ├── barras.svg                      # Mobile menu icon
│   └── [product images]
├── includes/
│   ├── templades/                      # HTML templates
│   │   ├── header.php                  # Navigation bar (non-logged-in)
│   │   ├── headerloget.php             # Navigation bar (logged-in)
│   │   └── footer.php                  # Footer template
│   └── fuctions/                       # PHP functions & handlers
│       ├── db.php                      # Database connection (⚠️ IGNORED in git)
│       ├── login.php                   # Login handler
│       ├── registro.php                # Registration handler
│       ├── carritof.php                # Cart add/remove handler
│       ├── favf.php                    # Favorites add/remove handler
│       ├── alta.php                    # Product upload handler
│       ├── eliminardebase.php          # Product deletion handler
│       └── Ecorreo.php                 # Contact form email handler
└── .claude/
    └── launch.json                     # Development server configuration

```

## 🚀 Setup Instructions

### Prerequisites

- **PHP 7.4+**: Available from [php.net](https://www.php.net/downloads)
- **MySQL 5.7+**: Available from [mysql.com](https://www.mysql.com/downloads/)
- **Web Browser**: Chrome, Firefox, Safari, or Edge (latest versions)
- **Git** (optional): For version control

### Local Development Setup

1. **Clone the Repository**
   ```bash
   git clone https://github.com/yourusername/tamales-tolito.git
   cd tamales-tolito-e-store
   ```

2. **Set Up the Database**

   Create a new MySQL database and user:
   ```sql
   CREATE DATABASE tolito_db;
   CREATE USER 'tolito_user'@'localhost' IDENTIFIED BY 'your_password_here';
   GRANT ALL PRIVILEGES ON tolito_db.* TO 'tolito_user'@'localhost';
   FLUSH PRIVILEGES;
   ```

   Create the required tables:
   ```sql
   USE tolito_db;

   -- Users table
   CREATE TABLE usuarios (
       id_usuario INT AUTO_INCREMENT PRIMARY KEY,
       usuario VARCHAR(50) UNIQUE NOT NULL,
       correo VARCHAR(100) UNIQUE NOT NULL,
       pass VARCHAR(255) NOT NULL,
       imgp VARCHAR(255),
       telefono VARCHAR(20),
       direccion TEXT,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );

   -- Products table
   CREATE TABLE productos (
       id_producto INT AUTO_INCREMENT PRIMARY KEY,
       nombre VARCHAR(100) NOT NULL,
       descripcion TEXT,
       precio DECIMAL(10, 2) NOT NULL,
       categoria VARCHAR(50),
       imagen LONGBLOB,
       stock INT DEFAULT 0,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );

   -- Orders table (optional - for future implementation)
   CREATE TABLE pedidos (
       id_pedido INT AUTO_INCREMENT PRIMARY KEY,
       id_usuario INT NOT NULL,
       fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
       estado VARCHAR(20) DEFAULT 'pendiente',
       total DECIMAL(10, 2) NOT NULL,
       FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
   );
   ```

3. **Configure Database Connection**

   Create `includes/fuctions/db.php`:
   ```php
   <?php
   // Database credentials
   $servidor = "localhost";
   $usuario = "tolito_user";
   $password = "your_password_here";
   $database = "tolito_db";

   // Create connection
   $conn = new mysqli($servidor, $usuario, $password, $database);

   // Check connection
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }

   // Set charset to utf8
   $conn->set_charset("utf8");
   ?>
   ```

   ⚠️ **IMPORTANT**: This file is in `.gitignore` and should NEVER be committed to version control!

4. **Start the PHP Development Server**

   Option A - Using PHP built-in server:
   ```bash
   php -S localhost:8080
   ```

   Option B - Using the launch configuration:
   ```bash
   # This requires Claude Code or compatible tool
   # Configuration is in .claude/launch.json
   ```

5. **Access the Application**

   Open your browser and navigate to:
   ```
   http://localhost:8080
   ```

## 📖 Usage

### For Customers

1. **Create an Account**
   - Click "Registrarse" (Register)
   - Fill in username, email, and password
   - Password will be securely hashed with bcrypt
   - Click "Crear Cuenta"

2. **Login**
   - Click "Iniciar sesión" (Login)
   - Enter your credentials
   - Session will be created with regenerated ID for security

3. **Browse Products**
   - Visit the "Tienda" (Shop) section
   - Use the search bar to find specific tamales
   - Filter by category using the category buttons
   - Each product shows price, description, and availability

4. **Shopping**
   - Select quantity and click "Agregar al Carrito" (Add to Cart)
   - Click heart icon to add to "Favoritos" (Favorites)
   - View cart total with all items
   - Remove items as needed

5. **Contact Business**
   - Go to "Contacto" (Contact) section
   - Fill out the form with your inquiry
   - Specify if you're buying or interested in becoming a distributor
   - Message will be sent via email

### For Administrators

1. **Access Admin Panel**
   - Login to your account
   - Click profile icon
   - Navigate to "Agregar Producto" (Add Product) section

2. **Add Products**
   - Enter product name, description, and price
   - Select category
   - Upload product image
   - Click "Agregar Producto"

3. **Delete Products**
   - View all products in profile
   - Click "Eliminar" (Delete) button next to product
   - Product will be removed from catalog

## 🔒 Security

### Implemented Security Measures

1. **Password Security**
   - Passwords hashed with bcrypt using `password_hash()`
   - Verified with `password_verify()` during login
   - Never stored or transmitted in plaintext

2. **Session Management**
   - `session_start()` called at beginning of all protected pages
   - Session ID regenerated on login with `session_regenerate_id(true)`
   - Prevents session fixation attacks

3. **Input Validation & Sanitization**
   - All user input validated on server-side
   - Email validation with `filter_var()`
   - Contact form sanitized to prevent email header injection
   - SQL injection prevention with MySQLi prepared statements

4. **Output Encoding**
   - All dynamic output escaped with `htmlspecialchars()`
   - Prevents XSS (Cross-Site Scripting) attacks
   - Applies to usernames, product names, descriptions

5. **Prepared Statements**
   - All database queries use parameterized statements
   - Prevents SQL injection attacks
   - Example:
     ```php
     $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
     $stmt->bind_param("s", $usuario);
     $stmt->execute();
     ```

6. **Credential Protection**
   - Database credentials excluded from git via `.gitignore`
   - Sensitive file: `includes/fuctions/db.php`

### Security Recommendations

- ⚠️ **For Production**: Migrate database credentials to `.env` file
- ⚠️ **For Production**: Use HTTPS/SSL encryption for all connections
- ⚠️ **For Production**: Implement CSRF tokens for all forms
- ⚠️ **For Production**: Add rate limiting to prevent brute-force attacks
- ⚠️ **For Production**: Implement 2FA for admin accounts
- ⚠️ **For Production**: Add logging and monitoring

## ⚠️ Known Limitations

### Current Implementation

1. **Static Product Catalog**
   - Products are hard-coded in PHP array for demo purposes
   - Database integration for products is ready but demo uses static array
   - To use database products, modify `anuncios.php` to query database

2. **Session-Only Cart & Favorites**
   - Cart and favorites stored in `$_SESSION` only
   - Lost when session expires (default 24 minutes of inactivity)
   - To persist, implement database storage in cart/favorites handlers

3. **No Real Payment Processing**
   - System collects order information only
   - No payment gateway integration (Stripe, PayPal, etc.)
   - Orders marked as "pendiente" (pending) for manual processing

4. **No Order Tracking**
   - Customers cannot view order history
   - No order status updates
   - Manual email confirmations required

5. **Image Storage**
   - Product images stored as LONGBLOB in database (less efficient)
   - Recommended: Store as files and reference by path

6. **Limited Admin Features**
   - No comprehensive admin dashboard
   - Product management requires direct form submission
   - No bulk operations or reporting

### Browser Compatibility

- Works with all modern browsers (2020+)
- Requires JavaScript enabled for best experience
- Mobile responsive design supports all screen sizes

## 🎯 Recent Improvements

### Security Fixes

✅ **Password Hashing**: Enabled `password_hash()` with bcrypt (was plain-text)
✅ **Session Typo**: Fixed critical `$_SESSIOM` → `$_SESSION` typo
✅ **XSS Protection**: Added `htmlspecialchars()` to all dynamic output
✅ **SQL Injection**: Converted all queries to prepared statements
✅ **Email Security**: Added sanitization to prevent header injection
✅ **Credential Protection**: Created `.gitignore` to prevent accidental commits

### Bug Fixes

✅ **Function Typo**: Fixed `mysqul_real_escape_string()` → proper prepared statements
✅ **Table Reference**: Fixed product table reference in `alta.php`
✅ **Cart Total**: Fixed calculation (was outside loop, only counted last item)
✅ **Cart Persistence**: Replaced JavaScript alerts with HTTP redirects
✅ **Delete Functionality**: Fixed SQL query in `eliminardebase.php`
✅ **Button Types**: Fixed all `sumbit` → `submit` typos

### Feature Implementations

✅ **Search Functionality**: Implemented real full-text search (was UI-only)
✅ **Category Filtering**: Added working category filters
✅ **Product Catalog**: Created 42-item demo catalog with diverse options
✅ **Flash Messages**: Replaced alerts with proper success/error feedback
✅ **Code Refactoring**: Removed 300+ lines of code duplication in `anuncios.php`

## 🤝 Contributing

### How to Contribute

1. Create a feature branch:
   ```bash
   git checkout -b feature/your-feature-name
   ```

2. Make your changes and test thoroughly

3. Commit with clear messages:
   ```bash
   git commit -m "Add feature: description of changes"
   ```

4. Push to your fork and create a Pull Request

### Development Guidelines

- Follow PSR-2 PHP coding standards
- Test all changes locally before committing
- Add comments to complex logic
- Update this README if adding significant features
- Ensure no credentials are committed to git

## 📞 Support & Contact

For issues, feature requests, or questions:

- **Email**: contact@tamolestolito.com
- **Website**: www.tamalestolito.com
- **Contact Form**: Available in the application at `/contacto.php`

## 📝 License

This project is proprietary software for Tamales Tolito Inc. All rights reserved.

---

**Last Updated**: March 2026
**Version**: 1.0 (Stable)
**PHP Version**: 7.4+
**MySQL Version**: 5.7+
