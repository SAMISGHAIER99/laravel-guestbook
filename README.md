# Laravel Guestbook

Piccola app in Laravel che permette di inserire, visualizzare, modificare ed eliminare messaggi (CRUD).

## Features
- CRUD Messaggi (Create / Read / Update / Delete)
- Validazione input
- Flash messages (success/error)
- Database SQLite

## Tech Stack
- Laravel
- PHP
- Blade
- SQLite

## Setup (local)
```bash
git clone https://github.com/SAMISGHAIER99/laravel-guestbook.git
cd laravel-guestbook
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
