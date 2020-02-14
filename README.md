# trabalhofinal
Projeto e-co

Front como compilar:
npm install
ionic serve

Back como compilar:
composer install
cp .env.example .env
criar BD no php/myadmin
copiar o nome do bd para o arquivo .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan passport:install --force
php artisan serve
