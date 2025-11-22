<p align="center">
  <img src="https://i.imgur.com/ig23nHS.png" alt="U-Track Logo" width="200">
</p>


# U-Track

Short documentation for the U-Track application.

This README provides a concise overview of the project, the main features and entities, and instructions to set up the application and the database locally.

## Purpose

U-Track is a lightweight inventory tracking application focused on medicines and supplies. It helps teams track stock quantities, record inventory activity (create/update/delete), and monitor expiry dates.

## Main Features

- Inventory management (create / edit / delete medicines)
- Stock tracking and low-stock alerts
- Expiry date monitoring and restock suggestions
- Inventory activity logs (audit trail for changes)
- Simple reports and pagination for activity logs

## Main Entities

- `Medicine` — represents a product or medicine. Key fields: `name`, `category_id`, `stock_quantity`, `expiry_date`, `price`.
- `Category` — groups medicines. Key fields: `name`, `description`.
- `InventoryLog` — audit entries for inventory changes. Key fields: `user`, `action`, `item_name`, `item_id`, `changes` (JSON).
- `User` — application users. Key fields: `username`, `email`, `password`, `role`.

## Requirements

- PHP 8.x (compatible with your Laravel version)
- Composer
- Node.js + npm (for frontend assets)
- A database supported by Laravel (e.g. MySQL, MariaDB, SQLite)

## Quick Setup (Windows / PowerShell)

1. Clone repository and install dependencies

```powershell
git clone <repo-url>
cd u-track
composer install
npm install
```

2. Environment

- Copy the example environment file and set your database credentials:

```powershell
cp .env.example .env
```

3. Create storage link (serves uploaded files)

```powershell
php artisan storage:link
```

4. Run migrations and seeders

```powershell
php artisan migrate --seed
```

This will create the database schema and seed sample categories, medicines and a default user.

5. Build frontend assets (development)

```powershell
npm run dev
```

6. Run the local development server

```powershell
php artisan serve
```

## Notes about the database and seeders

- Migrations: `database/migrations`
- Seeders: `database/seeders` (there are seeders for categories, medicines, and users)
- `InventoryLog.changes` is stored as JSON. When updating records the controller stores `['old'=>..., 'new'=>...]` so the app can display what changed.

## Common troubleshooting

- Image not found: run `php artisan storage:link` and verify `storage/app/public/images` contains the file.
- Migrations fail: verify your `.env` DB settings and that the database is reachable.
- Permission issues on Windows/WSL: ensure PHP has access to the project files.

## Where to look in the code

- Controllers: `app/Http/Controllers` (see `DashboardController`, `InventoryController`)
- Models: `app/Models` (`Medicine`, `Category`, `InventoryLog`, `User`)
- Views: `resources/views` and reusable components at `resources/views/components`
