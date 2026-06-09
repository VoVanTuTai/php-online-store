# Song Tai Shop - PHP Online Store

A PHP and MySQL online store project built while learning web application development. The project focuses on practical e-commerce workflows, CRUD screens, authentication, cart/order flow, and admin management.

## Tech Stack

- PHP
- MySQL
- HTML/CSS
- Bootstrap
- JavaScript
- jQuery

## Features

- Product catalog and product detail pages
- Category-based product browsing
- User registration, login, and logout
- Shopping cart and checkout flow
- Order status tracking
- Article/blog pages
- Admin product management
- Admin order processing
- Admin statistics page

## Project Structure

```text
admin/          Admin pages for products, orders, articles, and statistics
class_models/   PHP classes for users, products, articles, admin, and control logic
config/         Database configuration
css/            Custom styles and Bootstrap CSS
html/           Customer-facing pages
images_sanpham/ Product images and UI assets
images_baiviet/ Article images
js/             JavaScript and library files
database/       Database export placeholder
```

## Local Setup

1. Place the project in your local PHP server directory, for example:

```text
htdocs/php-online-store
```

2. Import the MySQL database.

Place the exported SQL file at:

```text
database/songtai_shop.sql
```

3. Create local database config:

```bash
cp config/config.example.php config/config.php
```

4. Update `config/config.php` with your local MySQL credentials.

5. Open the customer site:

```text
http://localhost/php-online-store/html/home.php
```

6. Open the admin area:

```text
http://localhost/php-online-store/admin/admin.php
```

## Notes

This repository does not commit `config/config.php` because it contains local database credentials. Use `config/config.example.php` as the template.

## Branch Workflow

This repository follows a lightweight Git Flow with `main`, `develop`, `feature/*`, `release/*`, and `hotfix/*` branches. See [docs/git-flow.md](docs/git-flow.md).
