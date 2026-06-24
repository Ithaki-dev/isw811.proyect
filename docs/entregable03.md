# Entregable 03

Proyecto 1: Laravel From Scratch 2026

## Episodio 03: Manejo de datos

### Resumen breve
En este episodio se trabajo el manejo de datos en Laravel, enviando informacion desde la ruta hacia la vista principal. Se actualizo la ruta `/` para pasar un arreglo con los valores `greeting` y `name`, y en la vista `welcome.blade.php` se imprimieron esos datos dentro del componente `x-layout`.

Tambien se uso `request('person', 'Guest')` para obtener un parametro opcional desde la URL y mostrar un nombre personalizado cuando existe. Con esto se entendio como Laravel puede recibir, preparar y presentar datos de forma sencilla en Blade.

### Comandos utilizados
- `php artisan serve` para probar la aplicacion en local.
- `php artisan route:list` para verificar las rutas registradas.

### Archivos modificados o creados
- `routes/web.php`
- `resources/views/welcome.blade.php`
- `resources/views/components/layout.blade.php`
- `resources/views/components/card.blade.php`

### Evidencia
- [ ] Captura de la vista principal mostrando datos dinamicos.
- [ ] Captura de la URL con el parametro `person` para personalizar el nombre.
- [ ] Captura del componente layout recibiendo el contenido de la vista.

### Problemas encontrados y solucion
- Al pasar datos desde la ruta a la vista fue necesario mantener la estructura del arreglo con las mismas llaves que se usaban en Blade para evitar errores al imprimir los valores.
- Tambien se confirmo que `request('person', 'Guest')` devuelve un valor por defecto cuando el parametro no existe, lo que permite que la vista siga funcionando sin depender de la URL.

### Comentarios personales
Este episodio ayudo a entender que una vista en Laravel no solo muestra HTML, sino que tambien puede recibir datos y adaptarse a lo que llega desde la ruta o desde la solicitud del usuario. El uso de Blade facilita mucho esa separacion entre logica y presentacion.

## Apuntes para proximos episodios
Seguir agregando una seccion nueva por cada video, manteniendo el mismo formato: resumen, comandos, archivos, evidencia, problemas y comentarios.
