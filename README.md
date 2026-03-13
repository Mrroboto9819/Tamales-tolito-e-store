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

---

# 中文版本 / CHINESE VERSION

# 🌮 Tamales Tolito - 电子商务平台

一个功能完整的在线销售正宗玉米粉蒸肉的电子商务平台。采用 PHP、MySQL 和现代网络技术构建，提供无缝购物体验。

## 📋 目录

- [概述](#概述)
- [功能特性](#功能特性)
- [技术栈](#技术栈)
- [项目结构](#项目结构)
- [设置说明](#设置说明)
- [使用方法](#使用方法)
- [安全性](#安全性)
- [已知限制](#已知限制)
- [最近改进](#最近改进)
- [贡献指南](#贡献指南)

## 📖 概述

Tamales Tolito 是一个专门销售高品质手工玉米粉蒸肉的电子商务平台。该平台允许客户：
- 浏览和搜索多样化的玉米粉蒸肉产品
- 创建账户并管理个人资料
- 将产品添加到购物车和收藏夹
- 提交带有订单详情的订单
- 联系企业获取特殊请求或合作机会

该平台还包括用于管理产品和处理订单的管理面板。

## ✨ 功能特性

### 客户功能
- **用户认证**：采用 bcrypt 密码哈希的安全注册和登录
- **产品目录**：浏览 42+ 种玉米粉蒸肉产品，支持搜索和分类筛选
- **购物车**：添加/删除商品，会话存储持久化
- **收藏夹**：收藏喜爱的产品以便快速访问
- **高级搜索**：在产品名称、描述和分类中全文搜索
- **分类筛选**：按类型筛选产品（咸味、甜味、海鲜、地方特色、限定版）
- **响应式设计**：针对所有设备优化的移动友好界面
- **联系表单**：发送咨询、特殊请求或合作提议

### 管理员功能
- **产品管理**：从目录中添加、编辑和删除产品
- **产品详情**：管理定价、描述、分类和图片
- **用户管理**：查看和管理客户资料

## 🛠 技术栈

### 后端
- **PHP 7.x**：服务器端渲染和业务逻辑
- **MySQL/MySQLi**：使用预处理语句的数据库管理
- **会话管理**：用户认证和购物车持久化

### 前端
- **HTML5**：语义化标记
- **CSS3**：现代样式设计，带自定义 CSS 变量
- **JavaScript/jQuery**：交互式功能和动态行为
- **Font Awesome 4.7**：图标库
- **Google Fonts**：Playfair Display 和 Inter 字体

### 安全性
- **密码哈希**：使用 bcrypt 算法的 `password_hash()`
- **输入验证**：表单的服务器端验证
- **XSS 防护**：使用 `htmlspecialchars()` 的输出转义
- **SQL 注入防护**：MySQLi 预处理语句
- **电子邮件头注入防护**：联系表单输入清理
- **会话安全**：登录时重新生成会话 ID

## 📁 项目结构

```
tamales-tolito-e-store/
├── README.md                           # 本文件
├── .gitignore                          # Git 忽略规则（保护 db.php）
├── index.php                           # 首页
├── anuncios.php                        # 产品目录和搜索（主要店铺页面）
├── contacto.php                        # 咨询联系表单
├── carrito.php                         # 购物车
├── favoritos.php                       # 收藏夹
├── nosotros.php                        # 关于我们页面
├── perfill.php                         # 登录页面
├── perfils.php                         # 注册页面
├── uporfile.php                        # 用户资料和管理面板
├── css/
│   ├── normalize.css                   # CSS 重置
│   └── styles.css                      # 主要样式表
├── img/                                # 图片和资源
│   ├── tolito2.png                     # 徽标
│   ├── ojitos.png                      # 网站图标
│   ├── barras.svg                      # 移动菜单图标
│   └── [产品图片]
├── includes/
│   ├── templades/                      # HTML 模板
│   │   ├── header.php                  # 导航栏（未登录）
│   │   ├── headerloget.php             # 导航栏（已登录）
│   │   └── footer.php                  # 页脚模板
│   └── fuctions/                       # PHP 函数和处理程序
│       ├── db.php                      # 数据库连接（⚠️ Git 中忽略）
│       ├── login.php                   # 登录处理程序
│       ├── registro.php                # 注册处理程序
│       ├── carritof.php                # 购物车添加/删除处理程序
│       ├── favf.php                    # 收藏夹添加/删除处理程序
│       ├── alta.php                    # 产品上传处理程序
│       ├── eliminardebase.php          # 产品删除处理程序
│       └── Ecorreo.php                 # 联系表单电子邮件处理程序
└── .claude/
    └── launch.json                     # 开发服务器配置

```

## 🚀 设置说明

### 前置要求

- **PHP 7.4+**：可从 [php.net](https://www.php.net/downloads) 获取
- **MySQL 5.7+**：可从 [mysql.com](https://www.mysql.com/downloads/) 获取
- **网络浏览器**：Chrome、Firefox、Safari 或 Edge（最新版本）
- **Git**（可选）：用于版本控制

### 本地开发设置

1. **克隆仓库**
   ```bash
   git clone https://github.com/yourusername/tamales-tolito.git
   cd tamales-tolito-e-store
   ```

2. **设置数据库**

   创建新的 MySQL 数据库和用户：
   ```sql
   CREATE DATABASE tolito_db;
   CREATE USER 'tolito_user'@'localhost' IDENTIFIED BY 'your_password_here';
   GRANT ALL PRIVILEGES ON tolito_db.* TO 'tolito_user'@'localhost';
   FLUSH PRIVILEGES;
   ```

   创建必要的表：
   ```sql
   USE tolito_db;

   -- 用户表
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

   -- 产品表
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

   -- 订单表（可选 - 用于未来实现）
   CREATE TABLE pedidos (
       id_pedido INT AUTO_INCREMENT PRIMARY KEY,
       id_usuario INT NOT NULL,
       fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
       estado VARCHAR(20) DEFAULT 'pendiente',
       total DECIMAL(10, 2) NOT NULL,
       FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
   );
   ```

3. **配置数据库连接**

   创建 `includes/fuctions/db.php`：
   ```php
   <?php
   // 数据库凭证
   $servidor = "localhost";
   $usuario = "tolito_user";
   $password = "your_password_here";
   $database = "tolito_db";

   // 创建连接
   $conn = new mysqli($servidor, $usuario, $password, $database);

   // 检查连接
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }

   // 设置字符集为 utf8
   $conn->set_charset("utf8");
   ?>
   ```

   ⚠️ **重要**：此文件在 `.gitignore` 中，绝不应该提交到版本控制！

4. **启动 PHP 开发服务器**

   选项 A - 使用 PHP 内置服务器：
   ```bash
   php -S localhost:8080
   ```

   选项 B - 使用启动配置：
   ```bash
   # 这需要 Claude Code 或兼容工具
   # 配置在 .claude/launch.json 中
   ```

5. **访问应用程序**

   打开浏览器并导航到：
   ```
   http://localhost:8080
   ```

## 📖 使用方法

### 对于客户

1. **创建账户**
   - 点击"Registrarse"（注册）
   - 填写用户名、电子邮件和密码
   - 密码将使用 bcrypt 安全哈希
   - 点击"Crear Cuenta"

2. **登录**
   - 点击"Iniciar sesión"（登录）
   - 输入您的凭证
   - 系统将创建带有重新生成 ID 的会话以提高安全性

3. **浏览产品**
   - 访问"Tienda"（商店）部分
   - 使用搜索栏查找特定玉米粉蒸肉
   - 使用分类按钮按类型筛选
   - 每个产品显示价格、描述和可用性

4. **购物**
   - 选择数量并点击"Agregar al Carrito"（加入购物车）
   - 点击心形图标添加到"Favoritos"（收藏夹）
   - 查看包含所有商品的购物车总计
   - 根据需要删除商品

5. **联系企业**
   - 转到"Contacto"（联系）部分
   - 填写表单以提交您的咨询
   - 指定您是购买者还是有兴趣成为经销商
   - 消息将通过电子邮件发送

### 对于管理员

1. **访问管理面板**
   - 登录您的账户
   - 点击个人资料图标
   - 导航到"Agregar Producto"（添加产品）部分

2. **添加产品**
   - 输入产品名称、描述和价格
   - 选择分类
   - 上传产品图片
   - 点击"Agregar Producto"

3. **删除产品**
   - 在个人资料中查看所有产品
   - 点击产品旁的"Eliminar"（删除）按钮
   - 产品将从目录中删除

## 🔒 安全性

### 实施的安全措施

1. **密码安全**
   - 密码使用 `password_hash()` 通过 bcrypt 哈希
   - 登录期间使用 `password_verify()` 验证
   - 从不以纯文本形式存储或传输

2. **会话管理**
   - 在所有受保护页面的开头调用 `session_start()`
   - 登录时使用 `session_regenerate_id(true)` 重新生成会话 ID
   - 防止会话固定攻击

3. **输入验证和清理**
   - 所有用户输入在服务器端验证
   - 使用 `filter_var()` 进行电子邮件验证
   - 联系表单清理以防止电子邮件头注入
   - 使用 MySQLi 预处理语句防止 SQL 注入

4. **输出编码**
   - 使用 `htmlspecialchars()` 转义所有动态输出
   - 防止 XSS（跨站脚本）攻击
   - 适用于用户名、产品名称、描述

5. **预处理语句**
   - 所有数据库查询使用参数化语句
   - 防止 SQL 注入攻击
   - 示例：
     ```php
     $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
     $stmt->bind_param("s", $usuario);
     $stmt->execute();
     ```

6. **凭证保护**
   - 数据库凭证通过 `.gitignore` 从 git 中排除
   - 敏感文件：`includes/fuctions/db.php`

### 安全建议

- ⚠️ **生产环境**：将数据库凭证迁移到 `.env` 文件
- ⚠️ **生产环境**：为所有连接使用 HTTPS/SSL 加密
- ⚠️ **生产环境**：为所有表单实施 CSRF 令牌
- ⚠️ **生产环境**：添加速率限制以防止暴力攻击
- ⚠️ **生产环境**：为管理员账户实施 2FA
- ⚠️ **生产环境**：添加日志和监控

## ⚠️ 已知限制

### 当前实现

1. **静态产品目录**
   - 产品为演示目的硬编码在 PHP 数组中
   - 产品数据库集成已准备好但演示使用静态数组
   - 要使用数据库产品，请修改 `anuncios.php` 以查询数据库

2. **仅会话购物车和收藏夹**
   - 购物车和收藏夹仅存储在 `$_SESSION` 中
   - 会话过期时丢失（默认不活动 24 分钟后）
   - 要持久化，请在购物车/收藏夹处理程序中实施数据库存储

3. **无真实支付处理**
   - 系统仅收集订单信息
   - 无支付网关集成（Stripe、PayPal 等）
   - 订单标记为"pendiente"（待处理）以进行手动处理

4. **无订单跟踪**
   - 客户无法查看订单历史
   - 无订单状态更新
   - 需要手动电子邮件确认

5. **图片存储**
   - 产品图片作为 LONGBLOB 存储在数据库中（效率较低）
   - 推荐：将图片存储为文件并按路径引用

6. **有限的管理员功能**
   - 无综合管理面板
   - 产品管理需要直接表单提交
   - 无批量操作或报告

### 浏览器兼容性

- 支持所有现代浏览器（2020+）
- 需要启用 JavaScript 以获得最佳体验
- 响应式设计支持所有屏幕尺寸

## 🎯 最近改进

### 安全修复

✅ **密码哈希**：启用 `password_hash()` 使用 bcrypt（之前是纯文本）
✅ **会话拼写错误**：修复关键的 `$_SESSIOM` → `$_SESSION` 拼写错误
✅ **XSS 防护**：为所有动态输出添加 `htmlspecialchars()`
✅ **SQL 注入**：将所有查询转换为预处理语句
✅ **电子邮件安全**：添加清理以防止头注入
✅ **凭证保护**：创建 `.gitignore` 以防止意外提交

### 错误修复

✅ **函数拼写错误**：修复 `mysqul_real_escape_string()` → 正确的预处理语句
✅ **表引用**：修复 `alta.php` 中的产品表引用
✅ **购物车总计**：修复计算（之前在循环外，仅计算最后一项）
✅ **购物车持久化**：用 HTTP 重定向替换 JavaScript 警报
✅ **删除功能**：修复 `eliminardebase.php` 中的 SQL 查询
✅ **按钮类型**：修复所有 `sumbit` → `submit` 拼写错误

### 功能实现

✅ **搜索功能**：实现真实全文搜索（之前仅 UI）
✅ **分类筛选**：添加工作中的分类过滤器
✅ **产品目录**：创建包含各种选项的 42 项演示目录
✅ **闪现消息**：用适当的成功/错误反馈替换警报
✅ **代码重构**：删除 `anuncios.php` 中 300+ 行代码重复

## 🤝 贡献指南

### 如何贡献

1. 创建功能分支：
   ```bash
   git checkout -b feature/your-feature-name
   ```

2. 进行更改并充分测试

3. 提交清晰的消息：
   ```bash
   git commit -m "Add feature: description of changes"
   ```

4. 推送到您的分叉并创建拉取请求

### 开发指南

- 遵循 PSR-2 PHP 编码标准
- 在提交前在本地测试所有更改
- 为复杂逻辑添加注释
- 如果添加重要功能，请更新本 README
- 确保没有凭证提交到 git

## 📞 支持和联系

如有问题、功能请求或疑问：

- **电子邮件**：contact@tamolestolito.com
- **网站**：www.tamalestolito.com
- **联系表单**：应用程序中的 `/contacto.php`

## 📝 许可证

本项目是 Tamales Tolito Inc. 的专有软件。版权所有。

---

**最后更新**：2026 年 3 月
**版本**：1.0（稳定）
**PHP 版本**：7.4+
**MySQL 版本**：5.7+
