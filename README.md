<h1 align="center">⚡ Nazrul CRUD Package</h1>

<p align="center">
  <strong>A Modern Laravel CRUD Generator Package with Bootstrap 5 UI</strong><br>
  Generate complete CRUD modules with models, controllers, views, migrations & routes with one command.
</p>

<p align="center">
  <a href="#"><img src="https://img.shields.io/badge/Laravel-12.x-ff2d20?logo=laravel" alt="Laravel Version"></a>
  <a href="#"><img src="https://img.shields.io/badge/PHP-8.2+-777BB4?logo=php" alt="PHP Version"></a>
  <a href="https://github.com/nazrulislam-CSE/laravel-nazrulcrud"><img src="https://img.shields.io/github/license/nazrulislam-CSE/laravel-nazrulcrud?color=green" alt="License"></a>
  <a href="https://github.com/nazrulislam-CSE/laravel-nazrulcrud"><img src="https://img.shields.io/github/stars/nazrulislam-CSE/laravel-nazrulcrud?style=social" alt="GitHub Stars"></a>
</p>

---

## 📌 About Nazrul CRUD Package

**Nazrul CRUD** is a powerful and beautifully designed CRUD generator for Laravel.  
It helps developers generate fully functional CRUD modules within seconds — including:

- Models  
- Controllers  
- Migrations  
- Routes  
- Bootstrap 5 Views  
- Image Upload Support  
- Search & Filters  
- Form Validation  
- SweetAlert Notifications  

It is the perfect package for rapid admin panel development.

---

## 🎯 Features

- ✅ One-command CRUD generation  
- ✅ Beautiful **Bootstrap 5** responsive UI  
- ✅ Auto-generated Models, Controllers, Routes, Views  
- ✅ Image upload with preview  
- ✅ Search + Filter functionality  
- ✅ Form validation (client + server)  
- ✅ SweetAlert success/error notifications  
- ✅ Clean code structure  
- ✅ Ready dashboard & statistics support  
- ✅ Lightweight & blazing fast  

---

## 🧪 Tech Stack & Requirements

- **PHP:** 8.2+  
- **Laravel:** 12.x  
- **Frontend:** Bootstrap 5  
- **Database:** MySQL / MariaDB / SQLite  
- **Tools:** Composer, Artisan CLI  

---

## 🔧 Installation Guide

Follow the commands below:

```bash
# Step 1: Add repository to composer
composer config repositories.nazrulcrud vcs https://github.com/nazrulislam-CSE/laravel-nazrulcrud

# Step 2: Install package
composer require nazrulcrud/crud:dev-main

# Step 3: Publish migrations
php artisan vendor:publish --tag=crud-migrations

# Step 4: Run migrations
php artisan migrate

# Step 5: Check migration status
php artisan migrate:status

# Step 6: Create images directory
mkdir -p public/images
chmod 755 public/images
