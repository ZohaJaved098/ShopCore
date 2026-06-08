# 🛍️ ShopCore (Laravel Project)

A full-stack Laravel application with products, blogs, roles, authentication, and contact system.

---

## 🚀 Tech Stack

- Laravel 12
- PHP 8.2+
- MySQL
- Tailwind CSS

---

## ⚙️ Installation Guide

### 1. Clone the repository

```bash
git clone <https://github.com/ZohaJaved098/ShopCore.git>
cd shopcore
```

### 2. Install dependencies

```bash
composer install
npm install
npm run build
```

### 3. Environment setup

```bash
cp .env.example .env
php artisan key:generate
```

Update `.env` with DB credentials:

```
DB_DATABASE=your_db_name
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Run migrations + seed database

```bash
php artisan migrate:fresh --seed
```

### 5. Storage setup

```bash
php artisan storage:link
```

### 6. Start server

```bash
php artisan serve
```

---

## 🔐 Demo Accounts

### Tester Admin

Email: tester@gmail.com  
Password: testerAdmin123!

---

## 🧠 Features

- Authentication system
- Role-based access (admin/manager/blogger/user)
- Products with images
- Blog system with tags
- Contact form (auth required)
- Featured products & blogs
- Complete cart and wishlist system.
- Favorites Blogs and Authors

---

## 📸 Seed Data

Includes:

- Admin users
- Sample products with images
- Sample blogs with tags
- Predefined roles

---

## 🧹 Reset Project

```bash
php artisan migrate:fresh --seed
php artisan storage:link
```

---

## 💡 Notes

- Images stored in: storage/app/public/seed-images
- Uses Blade components
- Clean role-based structure

---

## ❤️ Author

Built with Laravel 🚀
