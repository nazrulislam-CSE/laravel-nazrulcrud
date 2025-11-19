# Nazrul CRUD Package

A beautiful Bootstrap CRUD package for Laravel with one-click installation.

![CRUD Package](https://via.placeholder.com/800x400?text=Nazrul+CRUD+Package)

## Features

- ✅ Complete CRUD operations
- ✅ Bootstrap 5 Design
- ✅ Search & Filter functionality
- ✅ Image upload with preview
- ✅ Responsive table design
- ✅ One-click installation
- ✅ Statistics dashboard
- ✅ Form validation
- ✅ Sweet alerts

## Requirements

- PHP 8.2 or higher
- Laravel 12.0 or higher
- Bootstrap 5
- MySQL/SQLite/PostgreSQL

## Installation

### Method 1: Simple Installation
```bash
# Install package
composer require nazrulcrud/crud:@dev
php artisan nazrulcrud:install

# Publish and run migrations
php artisan vendor:publish --provider="NazrulCrud\Crud\CrudServiceProvider" --tag=crud-migrations
php artisan migrate

# Create images directory
mkdir public/images
chmod 755 public/images
