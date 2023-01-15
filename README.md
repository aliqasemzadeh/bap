✔️ Base Admin Panel
======================
>  Easy way to create Admin Panel.
> 
## 🔌 Requirements

- PHP version: >= 8.0
- Composer
- Node.js


## 🧰 Built with

- Laravel 9
- Livewire
- Bootstrap 5
- Tabler.io
- SweetAlert2
- spatie/laravel-permission


## 🧾 Installation

1. `git clone https://github.com/aliqasemzadeh/bap BaseAdminPanel`
2. `cd BaseAdminPanel`
3. Install dependencies:

   `composer install`

   `npm install`

4. `cp .env.example .env`
5. `php artisan key:generate`
6. Set your `.env` with credentials to your database server (`DB_*` settings) and your domain config (`APP_URL`).
7. `php artisan migrate --seed`
8. Build frontend with `npm run production` for production.
9. Run your server `php artisan serve`.
10. Username:info@bap.local/Password:P@ssw0rd321
