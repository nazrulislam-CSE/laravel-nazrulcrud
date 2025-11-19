# Nazrul CRUD - Laravel CRUD Generator Package

<section>
        <h1>Nazrul CRUD – Laravel CRUD Generator Package</h1>
        <p>A beautiful and powerful Laravel CRUD generator with Bootstrap 5 UI.</p>

        <div class="badge">
            <img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel">
            <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php">
            <img src="https://img.shields.io/badge/Bootstrap-5.x-7952B3?style=for-the-badge&logo=bootstrap">
            <img src="https://img.shields.io/badge/License-MIT-green?style=for-the-badge">
        </div>
    </section>

A powerful, beautiful, and intuitive CRUD generator package for Laravel that automatically creates complete admin panels with Bootstrap 5 UI. Save hours of development time with one command!

✨ Features

🚀 Core Features

- ✅ One-Command CRUD Generation - Generate complete CRUD operations with single command
- ✅ Beautiful Bootstrap 5 UI - Modern, responsive, and professional interface
- ✅ Automatic Code Generation - Models, Controllers, Migrations, Views, Routes
- ✅ Image Upload with Preview - Drag & drop image upload with preview functionality
- ✅ Advanced Search & Filters - Smart search with multiple filter options
- ✅ Form Validation - Built-in client and server side validation
- ✅ SweetAlert Notifications - Beautiful alert notifications
- ✅ Statistics Dashboard - Beautiful charts and statistics

## Requirements

- PHP 8.2 or higher
- Laravel 12.0 or higher
- Bootstrap 5
- MySQL/SQLite/PostgreSQL

## Installation


### Method 1: Simple Installation
```bash

# 1.Install package
composer require nazrulcrud/crud:dev-main

# 2. Publish
php artisan vendor:publish --provider="NazrulCrud\\Crud\\CrudServiceProvider" --tag="crud-migrations"

# 3. Migrations Run
php artisan migrate

# 4. Check Status
php artisan migrate:status

# 5. Create images directory
mkdir public/images
chmod 755 public/images
