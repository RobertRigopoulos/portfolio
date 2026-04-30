# Portfolio

Personal portfolio site for Robert Rigopoulos — junior software developer based in Liverpool. Built in Laravel as my first project in the framework, to learn it properly while shipping something I'd actually use.

## Stack

- Laravel 13 / PHP 8.4
- SQLite
- Blade templates
- Vite
- Plain CSS

## Architecture notes

A few deliberate choices worth flagging:

- **Project data lives in the database**, seeded via `ProjectSeeder` and fetched through `PortfolioController`. Means I can add or edit projects without touching markup.
- **Section partials** under `resources/views/partials/`. Keeps the main `index.blade.php` readable and each section editable in isolation.
- **Plain CSS** with custom properties for theming. No framework — for a one-page site this size, hand-rolled CSS was simpler than configuring Tailwind.

## Local setup

Requires PHP 8.2+, Composer, Node.js.

```bash
git clone https://github.com/RobertRigopoulos/portfolio.git
cd portfolio
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm run build
php artisan serve
```

Then visit `http://127.0.0.1:8000`.

For development with hot-reload assets, run `npm run dev` in a separate terminal.

## Caveats

This is my first Laravel project. I built it to learn the framework while applying for junior dev roles, so the patterns here are taken straight from the Laravel docs and a handful of best-practice guides. If you spot something I could've done better, I'd genuinely like to know — robert.rigopoulos@gmail.com.
