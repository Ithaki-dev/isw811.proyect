# ISW811 - Laravel From Scratch 2026

Proyecto académico del curso ISW811 Aplicaciones Web con Software Libre, documentado a partir del curso Laravel From Scratch 2026 de Laracasts.

## Requisitos

- PHP 8.2 o superior.
- Composer.
- Node.js y npm.
- Base de datos compatible con Laravel.

## Instalación local

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
npm run dev
php artisan serve
```

## Comandos útiles

```bash
php artisan test
php artisan queue:work
php artisan storage:link
npm run build
```

## Documentación del avance

La evidencia y el resumen de cada episodio se registran en la carpeta [docs/](docs/). El archivo principal de avance es [docs/entregable01.md](docs/entregable01.md).

## Notas

- No incluir credenciales reales, tokens privados ni secretos en archivos de configuración o documentación.
- Si el proyecto se mueve a otro entorno, repetir la instalación local y revisar los permisos de `storage/` y `bootstrap/cache/`.
