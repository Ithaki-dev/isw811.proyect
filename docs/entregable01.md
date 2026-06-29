# Entregable 01

Proyecto 1: Laravel From Scratch 2026

## Episodio 01: Routing 101

### Resumen breve
En este primer episodio se revisaron las bases del enrutamiento en Laravel. Se modificó la vista de inicio para personalizar la página principal, se creó la ruta `/about` como ejemplo y se agregó la ruta `/contact` como tarea práctica para reforzar la relación entre rutas y vistas.

### Comandos utilizados
- `php artisan serve` para probar la aplicación en local.
- `php artisan route:list` para verificar las rutas registradas.

### Archivos modificados o creados
- `routes/web.php`
- `resources/views/welcome.blade.php`
- `resources/views/about.blade.php`
- `resources/views/contact.blade.php`

### Evidencia
````carousel
![Captura de la página principal personalizada](docs/img/routes.png)
<!-- slide -->
![Captura de la vista /about](docs/img/about.png)
<!-- slide -->
![Captura de la vista /contact](docs/img/contact.png)
````

### Problemas encontrados y solución
- La ruta `/contact` no tenía vista asociada al revisar el proyecto, así que se creó `resources/views/contact.blade.php` para mantener coherencia entre la documentación y el comportamiento de la aplicación.

### Comentarios personales
Este episodio ayudó a entender que en Laravel una ruta no solo apunta a una URL, sino a una respuesta concreta, normalmente una vista o un controlador. También quedó claro que documentar desde el inicio facilita mucho el seguimiento del curso.

## Apuntes para próximos episodios
Ir agregando una sección nueva por cada video, manteniendo el mismo formato: resumen, comandos, archivos, evidencia, problemas y comentarios.