# Entregable 07

Proyecto 1: Laravel From Scratch 2026

## Episodio 07: Desarrollo del CRUD

### Resumen breve
En este episodio aprendimos a implementar un **CRUD (Create, Read, Update, Delete)** utilizando rutas y el manejo de datos en Laravel. Se revisaron los métodos necesarios para crear, leer, actualizar y eliminar ideas, así como la interacción entre controladores y vistas.

### Comandos utilizados
- `vagrant up` para levantar la máquina virtual donde corre la aplicación.
- `vagrant ssh` para entrar a la máquina virtual.
- `php artisan make:model Idea -mcrf` para crear el modelo `Idea` junto con su controlador y archivos de migración, vistas y rutas.
- `php artisan migrate` para ejecutar las migraciones de la base de datos.
- `php artisan serve` para probar la aplicación en local cuando ya estaba configurada.

### Archivos modificados o creados
- `app/Models/Idea.php`
- `database/migrations/2026_07_xx_034931_create_ideas_table.php`
- `routes/web.php`
- `resources/views/ideas/index.blade.php`
- `resources/views/ideas/edit.blade.php`

### Evidencia
- Captura de la aplicación mostrando las ideas obtenidas desde la base de datos: ![Listado de ideas](docs/img/ideas_list.png)
- Captura de la vista para editar una idea: ![Vista de edición](docs/img/edit_ideas.png)
- Captura de las rutas definidas en `web.php`: ![Rutas](docs/img/crud.png)

### Problemas encontrados y soluciones
- Al intentar crear un nuevo registro, se encontró que el formulario de edición no estaba vinculado correctamente a los campos del modelo. Se solucionó utilizando `{{ old('idea') }}` para mantener el valor en caso de error.
- Al trabajar con rutas para la eliminación de ideas, se notó que el navegador solicitaba confirmación antes de enviar el formulario DELETE. Se implementó un botón con `onclick="return confirm('¿Estás seguro de eliminar esta idea?')"` para mejorar la experiencia del usuario.

### Comentarios personales
Este episodio proporcionó una comprensión más profunda de cómo Laravel permite manejar operaciones CRUD de manera eficiente y sencilla utilizando sus capacidades de rutas, controladores y vistas. La integración entre Eloquent y las vistas simplifica significativamente el desarrollo del front-end.

## Apuntes para próximos episodios
Continuar trabajando en la aplicación implementando nuevas funcionalidades como **autenticación de usuarios**, manejo de sesiones, y posiblemente integrar una base de datos más compleja.