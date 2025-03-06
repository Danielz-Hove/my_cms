# Laravel CMS

A modern CMS built with Laravel, offering a streamlined content management experience through Filament and a dynamic frontend powered by Blade, Bootstrap, and jQuery. This CMS embraces modern web development practices, utilizing Filament's powerful tools for streamlined administration and Blade's expressive syntax for dynamic templating. The combination allows for the creation of performant and maintainable content-driven websites.

## Features

### Backend (Admin Panel):
- Powered by Filament for a rapid and user-friendly admin interface.
- Manage pages, images, and content with ease.

### Frontend:
- Built with Blade templates, Bootstrap for responsive design, and jQuery for interactive components.
- Dynamic page rendering.

### Showcase:
- Design demo page to present the frontend look and feel.

## Requirements
- PHP >= 8.1
- Composer
- MySQL or other compatible database
- Node.js and npm (if you plan to modify frontend assets)
- XAMPP

## Installation

### Clone the repository:
```sh
git clone https://github.com/Danielz-Hove/my_cms.git
cd my_cms
```
### Run Composer update
```sh
composer update
```
If you encounter errors, ensure your PHP version meets Filament's requirements.

### Configure your environment:
Copy `.env.example` to `.env`:
```sh
cp .env.example .env

```
Edit the `.env` file and configure your database connection (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`). Pay close attention to `APP_URL` - set it to your development or production URL.

### Generate application key:
```sh
php artisan key:generate
```

### Run database migrations and seed the database:
```sh
php artisan migrate
php artisan db:seed
```

### Create Storage Link:
```sh
php artisan storage:link
```



### Serve the application:
```sh
php artisan serve
```

## Usage

### Access Points:
- **Frontend:** Open your browser and go to the URL displayed by `php artisan serve` (usually [http://127.0.0.1:8000](http://127.0.0.1:8000)).
- **Admin Panel (Filament):** Navigate to `/admin` (e.g., [http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin)).
- **Showcase:** Navigate to `/show-case` (e.g., [http://127.0.0.1:8000/showcase](http://127.0.0.1:8000/showcase)).

### Default Credentials (Admin):
```plaintext
Email: admin@example.com
Password: 12345678
```

## License
This project is open-sourced software licensed under the MIT license. (Add a LICENSE file to your repository if you haven't already.)
