# Entregable 04

Proyecto 1: Laravel From Scratch 2026

## Episodio 04: Blade Directives

### Resumen breve
En este episodio aprendimos sobre Blade directives y su uso para controlar la salida de informacion directamente desde las vistas. Se revisaron directivas como `@if` y `@unless`, que permiten mostrar contenido de forma condicional segun el estado de los datos.

Tambien se hablo por encima de directivas importantes como `@auth` y `@guest`, que sirven para adaptar una vista segun el estado de autenticacion del usuario. En la vista principal se practico el uso de una lista de tareas con `@foreach` y un mensaje alternativo cuando no hay elementos disponibles.

### Comandos utilizados
- `php artisan serve` para probar la aplicacion en local.
- `php artisan route:list` para verificar las rutas registradas.

### Archivos modificados o creados
- `routes/web.php`
- `resources/views/welcome.blade.php`

### Evidencia
- [ ] Captura de la vista con ejemplos de directivas Blade.
- [ ] Captura de referencia a las directivas de ejemplo: [docs/img/directivas.png](docs/img/directivas.png)

### Problemas encontrados y solucion
- Al trabajar con directivas condicionales fue importante revisar que la variable `tasks` estuviera disponible desde la ruta para evitar errores al evaluar `count($tasks)`.
- Tambien se entendio que `@unless` funciona como el caso contrario de `@if`, por lo que resulta util para mostrar mensajes alternativos cuando no hay datos.

### Comentarios personales
Este episodio ayudo a entender que Blade ofrece una forma muy limpia de escribir condiciones, ciclos y estados de autenticacion sin mezclar demasiada logica dentro del HTML. Las directivas hacen que la vista sea mas legible y facil de mantener.

## Apuntes para proximos episodios
Seguir agregando una seccion nueva por cada video, manteniendo el mismo formato: resumen, comandos, archivos, evidencia, problemas y comentarios.
