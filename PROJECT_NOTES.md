# Portfolio — Laravel project notes

Quick reference so you can talk about this project confidently in an interview.

## What the app does

A single-page portfolio site, served from a Laravel backend. Project data is stored in SQLite and rendered through Blade templates. Includes a working contact form with server-side validation that persists submissions to the database.

## File map

### Routes — `routes/web.php`
Maps URLs to controller methods. Two routes:
- `GET /` → `PortfolioController@index` (home page)
- `POST /contact` → `ContactController@store` (form submission)

### Controllers — `app/Http/Controllers/`
- **`Controller.php`** — abstract base class. Empty by design (Laravel 11+ pattern, since global middleware moved to bootstrap config).
- **`PortfolioController.php`** — fetches projects from the DB, sorts by `sort_order`, passes them to the view.
- **`ContactController.php`** — handles form submissions. Note the `StoreContactRequest` parameter — that triggers automatic validation before the method body runs.

### Form Request — `app/Http/Requests/StoreContactRequest.php`
Encapsulates validation rules. If validation fails, Laravel auto-redirects back with errors flashed to the session — no manual error handling in the controller. Standard Laravel pattern that keeps controllers thin.

### Models — `app/Models/`
- **`Project.php`** — Eloquent model for the `projects` table. The `$fillable` array is a security guard: only those fields can be mass-assigned via `Project::create([...])`.
- **`ContactMessage.php`** — Eloquent model for `contact_messages`. Stores submitter's IP address for traceability.

### Migrations — `database/migrations/`
Schema definitions. Each migration's `up()` creates a table; `down()` drops it. Run with `php artisan migrate`.

### Seeder — `database/seeders/ProjectSeeder.php`
Populates the `projects` table with the three featured projects. Run with `php artisan db:seed`. Idempotent — wipes and re-inserts each run.

### Views — `resources/views/`
- **`layouts/app.blade.php`** — base HTML layout. Defines the `<head>`, loads fonts and Vite assets, exposes `@yield('content')` for child views.
- **`portfolio/index.blade.php`** — the home page. Extends the layout and includes the section partials.
- **`partials/*.blade.php`** — each major section (hero, about, skills, etc.) is its own partial, kept small and focused. The `projects` partial uses `@forelse` to iterate over the collection passed from the controller.

### Frontend — `resources/css/`, `resources/js/`
- **`app.css`** — all styling, plain CSS with custom properties for theming.
- **`app.js`** — keeps Laravel's default `bootstrap.js` import (sets up axios with CSRF) and adds an IntersectionObserver-based scroll reveal.

Vite (configured in `vite.config.js`, comes with Laravel) handles dev hot-reload and production builds.

## Common commands

```bash
# Run dev server (auto-rebuilds CSS/JS on save)
npm run dev

# Build production assets
npm run build

# Apply migrations and seed the DB from scratch
php artisan migrate:fresh --seed

# Just seed the projects (without wiping the DB)
php artisan db:seed --class=ProjectSeeder

# View all routes
php artisan route:list

# Tinker — REPL for poking at models
php artisan tinker
# Then in tinker: App\Models\Project::all()  or  App\Models\ContactMessage::count()
```

## Things you can talk about in an interview

- **MVC separation** — routes don't contain logic, controllers don't contain validation, models don't contain HTML.
- **Form Requests** — Laravel's pattern for moving validation out of controllers.
- **Eloquent ORM** — `Project::query()->orderBy(...)->get()` is generating SQL under the hood.
- **CSRF protection** — every form needs `@csrf`; Laravel rejects requests without a valid token. Defense against cross-site request forgery.
- **Mass assignment protection** — `$fillable` on the model means you can't accidentally let a user set fields they shouldn't (e.g. an `is_admin` flag).
- **Blade template inheritance** — `@extends` + `@yield` keeps shared structure DRY.
- **Vite** — modern bundler, replaced Mix in Laravel 9+, gives you HMR in dev and hashed asset filenames in prod.

## Honest disclaimer (for interviews)

If asked, be honest: this is your first Laravel project. You built it specifically to learn the stack and demonstrate you can pick up a new framework. Better to say that confidently than to overclaim Laravel experience.
