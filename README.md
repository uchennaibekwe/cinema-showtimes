## Cinema Showtimes
This is a simple movie system showing the showtime for selected movies in the various cinema locations available

## Installation
1. Rename ".env.example" folder to ".env" and edit its content to match your local environment
2. Run `php artisan key:generate` to generate application key
3. Run `composer install` to install composer dependencies
4. Run `npm install` and `npm run dev` to install and compile asset files for the ui
5. Run `php artisan migrate` to create tables
6. Run `php artisan module:seed Cinema` to seed the 'cinema' table with three cinema locations
7. Run `php artisan serve` to access the application at `http://localhost:8080`
