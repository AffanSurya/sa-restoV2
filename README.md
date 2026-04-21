# SA-RestoV2: Restaurant Management System

<p align="center">
  <strong>Modern restaurant management application with admin dashboard and RESTful API</strong>
</p>

## 📋 Table of Contents

- [About the Application](#about-the-application)
- [Key Features](#key-features)
- [Tech Stack](#tech-stack)
- [System Requirements](#system-requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [API Documentation](#api-documentation)
- [Database Schema](#database-schema)
- [Testing](#testing)
- [Project Structure](#project-structure)
- [Troubleshooting](#troubleshooting)
- [Contributing](#contributing)
- [License](#license)

---

## 📱 About the Application

**SA-RestoV2** is a comprehensive restaurant management system designed to simplify restaurant operations for both administrators and customers. This application provides:

1. **Admin Web Dashboard** - For managing menu items, orders, and reports
2. **RESTful API** - For integration with mobile applications or separate frontend
3. **Authentication System** - JWT for API and session-based for web
4. **Role-Based Access Control** - Differentiate access between admin and regular users

This application is ideal for small to medium-sized restaurants that need an efficient and structured ordering system.

---

## ✨ Key Features

### For Admin

- ✅ **Menu Item Management** - CRUD menu with categories, prices, descriptions, and images
- ✅ **Order Management** - View all orders and order details
- ✅ **Dashboard** - Summary of restaurant information
- ✅ **Status Tracking** - Monitor order status and menu availability

### For Customers/Users

- ✅ **Registration & Login** - Account registration and secure authentication
- ✅ **Browse Menu** - View available menu items with complete details
- ✅ **Order Management** - Create and manage orders
- ✅ **Order Tracking** - Track order status

---

## 🛠️ Tech Stack

| Component          | Technology                |
| ------------------ | ------------------------- |
| Backend            | Laravel 11                |
| PHP Version        | ^8.2                      |
| Database           | MySQL / PostgreSQL        |
| Authentication API | JWT (tymon/jwt-auth ^2.1) |
| Authentication Web | Laravel Sanctum           |
| Testing            | Pest PHP ^2.34            |
| Frontend Build     | Vite                      |
| Linting            | Laravel Pint              |

---

## 📦 System Requirements

Before starting, make sure your system has:

- **PHP** >= 8.2
- **Composer** >= 2.0
- **Node.js** >= 16 (for frontend assets)
- **MySQL** >= 5.7 or **PostgreSQL** >= 9.6
- **Git** for version control

---

## 🚀 Installation

### 1. Clone Repository

```bash
git clone <repository-url>
cd sa-restoV2
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node.js Dependencies

```bash
npm install
```

### 4. Setup Environment File

```bash
cp .env.example .env
```

Edit the `.env` file and configure accordingly:

```env
APP_NAME="SA-RestoV2"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sa_resto_v2
DB_USERNAME=root
DB_PASSWORD=

JWT_SECRET=your-secret-key-here
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Generate JWT Secret

```bash
php artisan jwt:secret
```

### 7. Create Database

```bash
mysql -u root -p -e "CREATE DATABASE sa_resto_v2;"
```

### 8. Run Migrations

```bash
php artisan migrate
```

### 9. Run Seeding (Optional)

```bash
php artisan db:seed
```

### 10. Build Frontend Assets

```bash
npm run build
```

### 11. Start Development Server

```bash
php artisan serve
```

The application will run at `http://localhost:8000`

---

## ⚙️ Configuration

### JWT Configuration

File: `config/jwt.php` - JWT authentication configuration for API

### Database Configuration

File: `config/database.php` - Database connection settings

### Auth Configuration

File: `config/auth.php` - Authentication guards configuration

### Custom Middleware

```
app/Http/Middleware/AdminMiddleware.php - Admin role validation
```

---

## 💻 Usage

### Development Mode

```bash
# Start development server
php artisan serve

# Build assets with watch mode
npm run dev
```

### Production Mode

```bash
# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Build production assets
npm run build
```

### Database Commands

```bash
# Run migrations
php artisan migrate

# Rollback last migration
php artisan migrate:rollback

# Reset database
php artisan migrate:refresh

# Seed database
php artisan db:seed
```

---

## 📚 API Documentation

### Authentication Endpoints

#### Register

```
POST /api/register
Content-Type: application/json

{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123",
  "password_confirmation": "password123"
}
```

#### Login

```
POST /api/login
Content-Type: application/json

{
  "email": "john@example.com",
  "password": "password123"
}

Response:
{
  "access_token": "eyJhbGc...",
  "token_type": "Bearer"
}
```

#### Logout

```
POST /api/logout
Authorization: Bearer {token}
```

### Menu Items Endpoints

#### Get Top Menu Items (Public)

```
GET /api/top-menu-items
```

#### Get All Menu Items (Authenticated)

```
GET /api/menuItem1
Authorization: Bearer {token}
```

#### Create Menu Item (Admin Only)

```
POST /api/menuItem1/store
Authorization: Bearer {token}
Content-Type: application/json

{
  "name": "Fried Rice",
  "description": "Special fried rice",
  "price": 50000,
  "category": "main",
  "image": "image-url",
  "status": "available"
}
```

#### Update Menu Item (Admin Only)

```
PUT /api/menuItem1/update/{id}
Authorization: Bearer {token}
```

#### Delete Menu Item (Admin Only)

```
DELETE /api/menuItem1/delete/{id}
Authorization: Bearer {token}
```

### Order Endpoints

#### Create Order (Authenticated)

```
POST /api/order/store
Authorization: Bearer {token}
Content-Type: application/json

{
  "total_price": 150000,
  "table_number": 5,
  "status": "pending"
}
```

#### Update Order (Authenticated)

```
PUT /api/order/update/{order}
Authorization: Bearer {token}
```

#### Get All Orders (Admin Only)

```
GET /api/order
Authorization: Bearer {token}
```

#### Get Order Detail (Admin Only)

```
GET /api/order/show/{order}
Authorization: Bearer {token}
```

### Order Items Endpoints

#### Add Item to Order (Authenticated)

```
POST /api/orderItem/store
Authorization: Bearer {token}
Content-Type: application/json

{
  "order_id": 1,
  "menu_item_id": 5,
  "quantity": 2,
  "notes": "Less spicy"
}
```

---

## 🗄️ Database Schema

### Users Table

```sql
- id: INT PRIMARY KEY
- name: VARCHAR
- email: VARCHAR UNIQUE
- password: VARCHAR
- role: VARCHAR (user, admin)
- created_at, updated_at: TIMESTAMP
```

### Menu Items Table

```sql
- id: INT PRIMARY KEY
- name: VARCHAR
- description: TEXT
- price: INT
- category: VARCHAR
- image: VARCHAR
- status: VARCHAR (available, unavailable)
- created_at, updated_at: TIMESTAMP
```

### Orders Table

```sql
- id: INT PRIMARY KEY
- user_id: INT (FK Users)
- total_price: INT
- table_number: INT
- status: VARCHAR (pending, completed, cancelled)
- created_at, updated_at: TIMESTAMP
```

### Order Items Table

```sql
- id: INT PRIMARY KEY
- order_id: INT (FK Orders)
- menu_item_id: INT (FK Menu Items)
- quantity: INT
- notes: TEXT
- created_at, updated_at: TIMESTAMP
```

---

## 🧪 Testing

### Run All Tests

```bash
php artisan test
```

### Run Specific Tests

```bash
php artisan test tests/Feature/MenuItem1Test.php
```

### Generate Coverage Report

```bash
php artisan test --coverage
```

Test files are located in:

- `tests/Feature/` - Feature tests
- `tests/Unit/` - Unit tests

---

## 📁 Project Structure

```
sa-restoV2/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Api/              # API Controllers
│   │   │   ├── HomeController.php
│   │   │   ├── LoginController.php
│   │   │   └── RegisterController.php
│   │   ├── Middleware/
│   │   │   └── AdminMiddleware.php
│   │   └── Resources/            # API Resources
│   ├── Models/
│   │   ├── User.php
│   │   ├── MenuItem1.php
│   │   ├── Order.php
│   │   └── OrderItem.php
│   └── Providers/
├── config/                       # Application configuration
├── database/
│   ├── migrations/              # Database migrations
│   ├── factories/               # Model factories
│   └── seeders/                 # Database seeders
├── resources/
│   ├── views/                   # Blade templates
│   ├── css/
│   └── js/
├── routes/
│   ├── web.php                  # Web routes
│   ├── api.php                  # API routes
│   └── console.php
├── storage/                     # Log, cache, sessions
├── tests/                       # Test files
├── public/                      # Public assets
├── bootstrap/
├── .env.example                 # Environment example
├── artisan                      # Laravel CLI
├── composer.json
├── package.json
├── phpunit.xml
└── vite.config.js
```

---

## 🔧 Troubleshooting

### Error: "SQLSTATE[HY000] [2002] Connection refused"

- Make sure MySQL is running
- Check DB configuration in `.env`

### Error: "InvalidArgumentException : Unable to locate factory"

- Run: `php artisan tinker` and then create the factory

### Error: "Class 'Tymon\JwtAuth\...' not found"

```bash
composer install
php artisan jwt:secret
```

### Assets not building

```bash
npm install
npm run build
```

### Permission Denied on storage/ and bootstrap/cache/

```bash
chmod -R 775 storage bootstrap/cache
```

---

## 🤝 Contributing

To contribute to this project:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

---

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## 📧 Support

For questions or support, please:

- Open an issue in the repository
- Contact the development team

---

**Made with ❤️ for easier restaurant management**
