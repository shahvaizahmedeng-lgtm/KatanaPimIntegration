# Filament Authentication App

A Laravel application with Filament PHP admin panel featuring user authentication and post management.

## Features

- **User Authentication**: Secure login system with Filament admin panel
- **Post Management**: Create, edit, and delete posts with user relationships
- **Dashboard**: Statistics overview showing users and posts
- **Modern UI**: Beautiful and responsive admin interface

## Prerequisites

- PHP 8.1 or higher
- Composer
- SQLite (or MySQL/PostgreSQL)
- Node.js and NPM (for asset compilation)

## Installation

1. **Clone or navigate to the project directory:**
   ```bash
   cd filament-auth-app
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install --ignore-platform-req=ext-intl
   ```

3. **Copy environment file:**
   ```bash
   cp .env.example .env
   ```

4. **Generate application key:**
   ```bash
   php artisan key:generate
   ```

5. **Configure database:**
   - Edit `.env` file and set your database configuration
   - For SQLite (default): `DB_CONNECTION=sqlite`
   - For MySQL: Set `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`

6. **Run migrations:**
   ```bash
   php artisan migrate
   ```

7. **Seed the database with admin user:**
   ```bash
   php artisan db:seed --class=AdminUserSeeder
   ```

8. **Install and compile frontend assets:**
   ```bash
   npm install
   npm run build
   ```

9. **Start the development server:**
   ```bash
   php artisan serve
   ```

## Default Login Credentials

- **Email:** admin@example.com
- **Password:** password

## Accessing the Admin Panel

1. Start the Laravel development server:
   ```bash
   php artisan serve
   ```

2. Navigate to: `http://localhost:8000/admin`

3. Login with the credentials above

## Features Overview

### Dashboard
- View statistics about users and posts
- Quick overview of system activity

### User Management
- View all registered users
- User authentication and authorization

### Post Management
- Create new posts with title and content
- Edit existing posts
- Delete posts
- Associate posts with users
- Search and filter posts

## File Structure

```
app/
├── Filament/
│   ├── Resources/
│   │   └── PostResource.php          # Post management interface
│   └── Widgets/
│       └── StatsOverview.php         # Dashboard statistics
├── Models/
│   ├── User.php                      # User model with authentication
│   └── Post.php                      # Post model with relationships
└── Providers/
    └── Filament/
        └── AdminPanelProvider.php    # Filament admin panel configuration

database/
├── migrations/                       # Database migrations
└── seeders/
    └── AdminUserSeeder.php          # Admin user creation
```

## Customization

### Adding New Resources

To add a new resource (e.g., Categories):

```bash
php artisan make:filament-resource Category
php artisan make:model Category -m
```

### Creating Widgets

To create a new dashboard widget:

```bash
php artisan make:filament-widget MyWidget --stats-overview
```

### Styling

The admin panel uses Tailwind CSS. You can customize the appearance by modifying the Filament configuration files.

## Troubleshooting

### PHP intl Extension Warning
If you see warnings about the PHP intl extension, you can ignore them for development by using:
```bash
composer install --ignore-platform-req=ext-intl
```

### Database Issues
If you encounter database connection issues:
1. Check your `.env` file configuration
2. Ensure the database exists
3. Run `php artisan migrate:fresh` to reset the database

### Permission Issues
Make sure the `storage` and `bootstrap/cache` directories are writable:
```bash
chmod -R 775 storage bootstrap/cache
```

## Security

- Change the default admin password after first login
- Use strong passwords in production
- Configure proper database credentials
- Set up HTTPS in production

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
