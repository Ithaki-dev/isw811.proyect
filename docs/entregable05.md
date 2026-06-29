# Entregable 05

Proyecto 1: Laravel From Scratch 2026

## Episodio 05: Forms

### Resumen breve
En este episodio aprendimos a utilizar forms en Laravel para enviar informacion desde una vista hacia una ruta. Se practico la creacion de un formulario con `method="POST"`, el uso de `@csrf` para proteger la peticion y la captura del valor enviado con `request('idea')`.

Tambien se trabajo el flujo completo de envio y almacenamiento de datos de forma sencilla, guardando las ideas recibidas en session para luego mostrarlas en pantalla. Con esto se entendio como Laravel facilita la interaccion entre el usuario y la aplicacion sin necesidad de escribir demasiada logica adicional.

### Comandos utilizados
- `php artisan serve` para probar la aplicacion en local.
- `php artisan route:list` para verificar las rutas registradas.

### Archivos modificados o creados
- `routes/web.php`
- `resources/views/ideas.blade.php`

### Evidencia
````carousel
![Captura del formulario de ideas](docs/img/ideas.png)
<!-- slide -->
![Captura de la lista de routas](docs/img/webs.png)
````

### Problemas encontrados y solucion
- Al mostrar las ideas almacenadas se identifico que los datos se estaban guardando como cadenas de texto en session, por lo que en la vista era necesario imprimir cada elemento directamente y no intentar acceder a una propiedad como si fuera un objeto.
- Tambien fue importante incluir `@csrf` en el formulario para evitar errores de seguridad al enviar la peticion POST.

### Comentarios personales
Este episodio ayudo a comprender mejor como funcionan los forms en Laravel y como se conectan con las rutas para recibir datos del usuario. El uso de session para guardar la informacion hizo mas claro el flujo completo entre formulario, backend y vista.

## Apuntes para proximos episodios
Seguir agregando una seccion nueva por cada video, manteniendo el mismo formato: resumen, comandos, archivos, evidencia, problemas y comentarios.
