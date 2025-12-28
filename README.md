<div align="center">

# 💄 Cosmetics Store Management System

### A Full-Stack PHP Web Application for Cosmetics Inventory Management

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://mysql.com)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/HTML)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/CSS)

---

*A robust, secure, and feature-rich inventory management system designed for cosmetics retail operations*

[Features](#-features) • [Tech Stack](#-tech-stack) • [Architecture](#-architecture) • [Installation](#-installation) • [Usage](#-usage) • [API Reference](#-api-reference)

</div>

---

## 📋 Table of Contents

- [Overview](#-overview)
- [Features](#-features)
- [Tech Stack](#-tech-stack)
- [Architecture](#-architecture)
- [Database Schema](#-database-schema)
- [Installation](#-installation)
- [Configuration](#-configuration)
- [Usage](#-usage)
- [API Reference](#-api-reference)
- [Security](#-security)
- [Project Structure](#-project-structure)
- [Contributing](#-contributing)
- [License](#-license)

---

## 🎯 Overview

The **Cosmetics Store Management System** is a comprehensive web-based inventory management solution built with PHP and MySQL. It provides a complete suite of tools for managing cosmetics products, categories, pricing, and user authentication with real-time inventory tracking capabilities.

This application follows **Object-Oriented Programming (OOP)** principles and implements the **MVC-like architecture** pattern, ensuring maintainable, scalable, and secure code.

---

## ✨ Features

### 🔐 Authentication & Authorization
- **Secure User Login** — SHA-256 password hashing for robust security
- **Session Management** — Persistent user sessions with proper state handling
- **Email Validation** — Built-in email format verification
- **User Profiles** — Support for user details including pronouns

### 📦 Inventory Management
- **Full CRUD Operations** — Create, Read, Update, Delete for all entities
- **Cosmetics Items** — Manage individual products with detailed attributes
- **Category Management** — Organize products by cosmetics types
- **Pricing System** — Track both wholesale and list prices

### 📊 Real-Time Dashboard
- **Live Inventory Stats** — AJAX-powered real-time updates every 5 seconds
- **Total Categories Counter** — Dynamic category count display
- **Total Items Counter** — Real-time product count
- **Price Aggregation** — Automatic total list price calculation

### 🔍 Search & Navigation
- **Item Search** — Quick lookup by Cosmetics ID
- **Category Search** — Find categories by Type ID
- **Intuitive Navigation** — User-friendly sidebar navigation

### 🛡️ Security Features
- **Prepared Statements** — SQL injection prevention via MySQLi prepared statements
- **Input Sanitization** — XSS protection with `htmlspecialchars()`
- **Error Handling** — Custom error, exception, and shutdown handlers
- **Secure Password Storage** — SHA-256 cryptographic hashing

---

## 🛠️ Tech Stack

### Backend
| Technology | Purpose |
|------------|---------|
| ![PHP](https://img.shields.io/badge/PHP%208.x-777BB4?style=flat-square&logo=php&logoColor=white) | Server-side scripting & business logic |
| ![MySQL](https://img.shields.io/badge/MySQL%208.0-4479A1?style=flat-square&logo=mysql&logoColor=white) | Relational database management |
| ![MySQLi](https://img.shields.io/badge/MySQLi-00758F?style=flat-square&logo=mysql&logoColor=white) | Database connectivity with prepared statements |

### Frontend
| Technology | Purpose |
|------------|---------|
| ![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat-square&logo=html5&logoColor=white) | Semantic markup structure |
| ![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat-square&logo=css3&logoColor=white) | Responsive styling & layout |
| ![JavaScript](https://img.shields.io/badge/JavaScript%20ES6-F7DF1E?style=flat-square&logo=javascript&logoColor=black) | Client-side interactivity & AJAX |
| ![XML](https://img.shields.io/badge/XML-FF6600?style=flat-square&logo=xml&logoColor=white) | Real-time data exchange format |

### Development Tools
| Tool | Purpose |
|------|---------|
| 🔧 REST Client | HTTP request testing (.http files) |
| 🗄️ SQL Scripts | Database schema & seed data |

---

## 🏗️ Architecture

```
┌─────────────────────────────────────────────────────────────────┐
│                        CLIENT BROWSER                           │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────────────────┐  │
│  │   HTML5     │  │   CSS3      │  │   JavaScript (AJAX)     │  │
│  └─────────────┘  └─────────────┘  └─────────────────────────┘  │
└─────────────────────────────────────────────────────────────────┘
                              │
                              ▼
┌─────────────────────────────────────────────────────────────────┐
│                     PHP APPLICATION LAYER                        │
│  ┌─────────────────────────────────────────────────────────┐    │
│  │                    index.php (Router)                    │    │
│  └─────────────────────────────────────────────────────────┘    │
│                              │                                   │
│  ┌──────────────┐  ┌──────────────┐  ┌──────────────────────┐   │
│  │  Item Class  │  │Category Class│  │  Include Templates   │   │
│  │ (cosmetics)  │  │(cosmeticstype)│  │   (.inc.php files)  │   │
│  └──────────────┘  └──────────────┘  └──────────────────────┘   │
│                              │                                   │
│  ┌─────────────────────────────────────────────────────────┐    │
│  │              database.php (Connection Layer)             │    │
│  └─────────────────────────────────────────────────────────┘    │
└─────────────────────────────────────────────────────────────────┘
                              │
                              ▼
┌─────────────────────────────────────────────────────────────────┐
│                       MySQL DATABASE                             │
│  ┌───────────────┐  ┌───────────────┐  ┌───────────────────┐    │
│  │   Cosmetics   │  │CosmeticsTypes │  │CosmeticsManagers  │    │
│  │    (Items)    │  │ (Categories)  │  │     (Users)       │    │
│  └───────────────┘  └───────────────┘  └───────────────────┘    │
└─────────────────────────────────────────────────────────────────┘
```

---

## 🗄️ Database Schema

### Entity Relationship Diagram

```
┌──────────────────────────────┐       ┌──────────────────────────────┐
│     CosmeticsManagers        │       │        CosmeticsTypes        │
├──────────────────────────────┤       ├──────────────────────────────┤
│ PK CosmeticsManagerID (INT)  │       │ PK CosmeticsTypeID (INT)     │
│    emailAddress (VARCHAR)    │       │    CosmeticsTypeCode (VARCHAR)│
│    password (VARCHAR/SHA256) │       │    CosmeticsTypeName (VARCHAR)│
│    pronouns (VARCHAR)        │       └──────────────────────────────┘
│    firstName (VARCHAR)       │                     │
│    lastName (VARCHAR)        │                     │ 1:N
│    DateTimeCreated (TIMESTAMP)│                    │
│    DateTimeUpdated (TIMESTAMP)│                    ▼
└──────────────────────────────┘       ┌──────────────────────────────┐
                                       │         Cosmetics            │
                                       ├──────────────────────────────┤
                                       │ PK CosmeticsID (INT)         │
                                       │    CosmeticsCode (VARCHAR)   │
                                       │    CosmeticsName (VARCHAR)   │
                                       │    CosmeticsDescription (TEXT)│
                                       │ FK CosmeticsTypeID (INT)     │
                                       │    CosmeticsWholesalePrice   │
                                       │    CosmeticsListPrice        │
                                       └──────────────────────────────┘
```

### Tables Description

| Table | Description |
|-------|-------------|
| `CosmeticsManagers` | Stores user authentication data with SHA-256 hashed passwords |
| `CosmeticsTypes` | Product categories/types with unique codes and names |
| `Cosmetics` | Individual product items with pricing and descriptions |

---

## 🚀 Installation

### Prerequisites

- **PHP** >= 7.4 (PHP 8.x recommended)
- **MySQL** >= 5.7 or **MariaDB** >= 10.3
- **Web Server** (Apache/Nginx with PHP support)
- **Browser** with JavaScript enabled

### Step-by-Step Installation

1. **Clone the Repository**
   ```bash
   git clone https://github.com/yourusername/cosmetics-store.git
   cd cosmetics-store
   ```

2. **Configure Database Connection**
   
   Edit `website/database.php` with your database credentials:
   ```php
   $host = 'your_host';
   $port = 3306;
   $dbname = 'your_database';
   $username = 'your_username';
   $password = 'your_password';
   ```

3. **Initialize the Database**
   
   Execute the SQL scripts in order:
   ```bash
   mysql -u your_username -p your_database < scripts/CosmeticsManagersStatements.sql
   mysql -u your_username -p your_database < scripts/categories.sql
   mysql -u your_username -p your_database < scripts/items.sql
   ```

4. **Deploy to Web Server**
   
   Copy the `website/` directory contents to your web server's document root:
   ```bash
   cp -r website/* /var/www/html/
   ```

5. **Access the Application**
   
   Navigate to `http://localhost/index.php` in your browser.

---

## ⚙️ Configuration

### Environment Configuration (`config.php`)

The application includes comprehensive error handling configuration:

```php
// Error Reporting (Development)
ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);

// Custom Error Handlers
set_error_handler(...)      // Handles PHP errors
set_exception_handler(...)   // Handles uncaught exceptions
register_shutdown_function(...) // Handles fatal errors
```

### Production Settings

For production deployment, modify `config.php`:
- Set `display_errors` to `0`
- Enable the `statuscode500.php` redirect for graceful error handling
- Configure proper logging paths

---

## 📖 Usage

### Default Login Credentials

| Email | Password | User |
|-------|----------|------|
| `Rahym@cosmetics.com` | `Password` | Rahym Ahmed |
| `Wire@cosmetics.com` | `Password1` | Wire Post |
| `Megan@cosmetics.com` | `Password2` | Megan Fox |

### Core Operations

#### Managing Cosmetics Types (Categories)
1. Navigate to **Types → List Types** to view all categories
2. Click **Add New Type** to create a new category
3. Search by Type ID using the sidebar form

#### Managing Cosmetics Items
1. Navigate to **Items → List Items** to view all products
2. Click **Add New Item** to add a product
3. Search by Cosmetics ID using the sidebar form
4. Edit or delete items from the list view

#### Real-Time Dashboard
- The sidebar displays live inventory statistics
- Data refreshes automatically every 5 seconds via AJAX
- View total categories, items, and aggregate list prices

---

## 📡 API Reference

### Real-Time Data Endpoint

**GET** `/realtime.php`

Returns XML-formatted inventory statistics:

```xml
<?xml version="1.0"?>
<inventory>
    <categories>5</categories>
    <items>25</items>
    <listpricetotal>15000.00</listpricetotal>
</inventory>
```

### Internal Class Methods

#### `Item` Class (`cosmetics.php`)

| Method | Description | Return Type |
|--------|-------------|-------------|
| `saveItem()` | Inserts a new item into the database | `bool` |
| `getItems()` | Retrieves all cosmetics items | `array\|null` |
| `findItem($id)` | Finds an item by CosmeticsID | `Item\|null` |
| `updateItem()` | Updates an existing item | `bool` |
| `removeItem()` | Deletes an item from the database | `bool` |
| `getItemsByCategory($typeId)` | Gets items filtered by type | `array\|null` |
| `getTotalItems()` | Returns total item count | `int\|null` |
| `getTotalListPrice()` | Returns sum of all list prices | `float\|null` |

#### `Category` Class (`cosmeticstype.php`)

| Method | Description | Return Type |
|--------|-------------|-------------|
| `saveCategory()` | Inserts a new category | `bool` |
| `getCategories()` | Retrieves all categories | `array\|null` |
| `findCategory($id)` | Finds a category by TypeID | `Category\|null` |
| `updateCategory()` | Updates an existing category | `bool` |
| `removeCategory()` | Deletes a category | `bool` |
| `getTotalCategories()` | Returns total category count | `int\|null` |

---

## 🔒 Security

### Implemented Security Measures

| Security Feature | Implementation |
|-----------------|----------------|
| 🔐 **Password Hashing** | SHA-256 cryptographic hashing |
| 💉 **SQL Injection Prevention** | MySQLi prepared statements with parameterized queries |
| 🛡️ **XSS Protection** | `htmlspecialchars()` for output encoding |
| 🔑 **Session Security** | PHP native session management |
| ✅ **Input Validation** | Email validation with `FILTER_VALIDATE_EMAIL` |
| ⚠️ **Error Handling** | Custom handlers prevent information disclosure |

### Security Best Practices

```php
// Prepared Statement Example
$stmt = $db->prepare("SELECT * FROM Cosmetics WHERE CosmeticsID = ?");
$stmt->bind_param("i", $CosmeticsID);
$stmt->execute();

// Input Sanitization Example
$emailAddress = htmlspecialchars($_POST['emailAddress']);
```

---

## 📁 Project Structure

```
rk975-IT202-Website/
├── 📁 scripts/
│   ├── 📄 categories.sql              # Category seed data
│   ├── 📄 CosmeticsManagersStatements.sql  # User table schema
│   ├── 📄 crudcosmetics.http          # HTTP request tests
│   ├── 📄 crudcosmeticsTypes.http     # Category API tests
│   └── 📄 items.sql                   # Product seed data
│
├── 📁 website/
│   ├── 📁 images/                     # Static assets
│   │   ├── 🖼️ cream.png
│   │   ├── 🖼️ lotionproducts.png
│   │   ├── 🖼️ makeup.png
│   │   ├── 🖼️ products.png
│   │   └── 🖼️ skincare.png
│   │
│   ├── 📄 index.php                   # Main entry point & router
│   ├── 📄 config.php                  # Error handling configuration
│   ├── 📄 database.php                # Database connection layer
│   │
│   ├── 📄 cosmetics.php               # Item class (OOP model)
│   ├── 📄 cosmeticstype.php           # Category class (OOP model)
│   │
│   ├── 📄 header.inc.php              # Header template
│   ├── 📄 nav.inc.php                 # Navigation sidebar
│   ├── 📄 main.inc.php                # Main content & login form
│   ├── 📄 aside.inc.php               # Real-time stats sidebar
│   ├── 📄 footer.inc.php              # Footer template
│   │
│   ├── 📄 addcosmetics.inc.php        # Add item form handler
│   ├── 📄 changecosmetics.inc.php     # Edit item handler
│   ├── 📄 listitems.inc.php           # List all items
│   ├── 📄 newcosmetic.inc.php         # New item form
│   ├── 📄 updatecosmetic.inc.php      # Update item processor
│   ├── 📄 removeitem.inc.php          # Delete item handler
│   │
│   ├── 📄 addcosmeticstype.inc.php    # Add category handler
│   ├── 📄 changecosmeticstype.inc.php # Edit category handler
│   ├── 📄 listcosmeticstypes.inc.php  # List all categories
│   ├── 📄 newcosmetictype.inc.php     # New category form
│   ├── 📄 displaycosmeticstype.inc.php # Display category details
│   ├── 📄 removecosmeticstype.inc.php # Delete category handler
│   │
│   ├── 📄 validate.inc.php            # Login validation
│   ├── 📄 logout.inc.php              # Session termination
│   │
│   ├── 📄 realtime.php                # AJAX XML endpoint
│   ├── 📄 realtime.js                 # Client-side AJAX handler
│   │
│   ├── 📄 ih_styles.css               # Main stylesheet
│   └── 📄 statuscode500.php           # Error page
│
└── 📄 README.md                       # Project documentation
```

---

## 🧪 Testing

### HTTP Request Testing

Use the provided `.http` files with REST Client extensions:

```bash
# Test CRUD operations for cosmetics
scripts/crudcosmetics.http

# Test CRUD operations for categories  
scripts/crudcosmeticsTypes.http
```

### Sample Test Requests

```http
# Create a new cosmetic item
POST http://localhost:3000/addcosmetics.test.php
Content-Type: application/x-www-form-urlencoded

CosmeticsID=200
&CosmeticsCode=THG
&CosmeticsName=Toleriane Hydrating Gentle Cleanser
&CosmeticsDescription=A daily face wash formulated with ceramides
&CosmeticsTypeID=100
&CosmeticsWholesalePrice=23.00
&CosmeticsListPrice=45.00
```

---

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. **Fork** the repository
2. **Create** a feature branch (`git checkout -b feature/AmazingFeature`)
3. **Commit** your changes (`git commit -m 'Add some AmazingFeature'`)
4. **Push** to the branch (`git push origin feature/AmazingFeature`)
5. **Open** a Pull Request

---

## 📄 License

This project is developed as part of **IT202 - Internet Applications** coursework at **NJIT**.

---

## 👨‍💻 Author

**Rayyan Khan** — *Full-Stack Development*

---

<div align="center">

### ⭐ Star this repository if you found it helpful!

Made with ❤️ and PHP

</div>

