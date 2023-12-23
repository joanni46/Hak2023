# Main Service

## deploy:
- .env.example -> .env
- docker-compose run --rm composer install
- docker-compose up -d
- docker-compose run --rm php artisan laravel.test migrate --seed

## postman: todo

## uml diagram: todo
