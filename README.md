# Better Process Management Website

Laravel 10 based website rewrite for betterprocessmanagement.com

## Features

- Responsive, mobile-first design
- Static pages: Home, About Us, Services, Contact
- Contact form with email and database storage
- User authentication (sign-in) via Laravel Fortify
- Admin panel (Filament) for content management
- Demonstration gallery for projects
- Modern UI with Tailwind CSS (via Filament)

## Requirements

- PHP 8.1 or higher
- Composer
- Node.js & npm (for asset compilation)
- MySQL 8.0+ or SQLite (for local dev)

## Installation

1. Clone or extract the project into your web server directory.

2. Install PHP dependencies:
   ```bash
   composer install --no-dev --optimize-autoloader
   ```
   For local development, include dev dependencies.

3. Copy `.env.example` to `.env` and configure:
   - Set `APP_KEY` (run `php artisan key:generate`)
   - Set database connection details
   - Set mail configuration (SMTP)

4. Run database migrations:
   ```bash
   php artisan migrate
   ```

5. (Optional) Seed initial data:
   ```bash
   php artisan db:seed
   ```

6. Install Fortify:
   ```bash
   composer require laravel/fortify
   php artisan vendor:publish --provider="Laravel\\Fortify\\FortifyServiceProvider"
   php artisan migrate
   ```

7. Install Filament:
   ```bash
   composer require filament/filament
   php artisan filament:install
   ```
   This will publish assets and create an admin user.

8. Build frontend assets (if using Vite):
   ```bash
   npm install
   npm run build
   ```
   For development: `npm run dev`.

9. Configure your web server to point to the `public` directory.

10. Access:
    - Public site: `/`
    - Admin panel: `/admin` (or as set in `.env` `FILAMENT_PATH`)
    - Login: `/login`

## Project Structure

- `app/` - Application code (Models, Controllers)
- `config/` - Configuration files
- `database/` - Migrations, seeders, factories
- `public/` - Web root
- `resources/` - Views, language files, assets
- `routes/` - Route definitions
- `storage/` - Logs, cache, uploaded files
- `tests/` - Test suites

## Pages

- `/` - Home
- `/aboutus` - About Us
- `/services` - Services
- `/contact` - Contact (with form)
- `/gallery` - Demonstration gallery

## Admin Features

Filament admin panel (`/admin`) provides:

- Content editing for static pages (home, about, services, contact)
- Gallery management (CRUD)
- Contact form submissions review
- User management (admin users)

## Development Notes

- Uses custom responsive CSS in `public/css/app.css`. No frontend build required for public pages.
- Filament uses its own Tailwind CSS setup through its package.
- Authentication handled by Fortify (routes and actions). Login/register views in `resources/views/auth`.
- Gallery items stored in `gallery_items` table with image uploads to `storage/app/public/gallery`.
- Contact form submissions saved to `contacts` table and emailed to `info@betterprocessmanagement.com`.

## License

Proprietary - All rights reserved.
