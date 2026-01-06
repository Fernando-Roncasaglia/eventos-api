# Eventos API

Sistema Laravel para controle de estoque e movimentações em eventos.

## Instalação

```bash
git clone https://github.com/seuusuario/eventos-api.git
cd eventos-api
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
