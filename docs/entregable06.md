# Entregable 06

Proyecto 1: Laravel From Scratch 2026

## Episodio 06: Conexion a BD y modelos

### Resumen breve
En este episodio aprendimos a conectar la aplicacion con la base de datos y a trabajar con modelos en Laravel. Se reviso el modelo `Idea`, la migracion de la tabla `ideas` y la forma en que Eloquent permite consultar, crear y mostrar registros sin tener que escribir SQL manualmente en cada parte del flujo.

Tambien se practico el uso de los modelos en las rutas para obtener las ideas guardadas con `Idea::query()->get()` y crear nuevos registros con `Idea::create()`. Con esto quedo mas claro como Laravel separa la logica de datos de la vista y facilita el trabajo con informacion persistente.

### Comandos utilizados
- `vagrant up` para levantar la maquina virtual donde corre la aplicacion.
- `vagrant ssh` para entrar a la maquina virtual.
- `php artisan make:model Idea` para crear el modelo utilizado en el ejercicio.
- `php artisan migrate` para ejecutar las migraciones de la base de datos.
- `php artisan serve` para probar la aplicacion en local cuando ya estaba configurada.

### Archivos modificados o creados
- `app/Models/Idea.php`
- `database/migrations/2026_06_26_034930_create_ideas_table.php`
- `database/migrations/2026_06_26_043541_add_state_to_ideas_table.php`
- `routes/web.php`
- `resources/views/ideas.blade.php`

### Evidencia
- [ ] Captura del modelo `Idea`.
- [ ] Captura de la migracion ejecutada con `php artisan migrate`.
- [ ] Captura de la aplicacion mostrando las ideas obtenidas desde la base de datos.

### Problemas encontrados y solucion
- Al trabajar con datos desde la base de datos fue importante usar el modelo `Idea` en lugar de guardar solo valores en session, porque asi los registros quedan persistidos y disponibles despues de refrescar la aplicacion.
- Tambien se identifico que la vista debe recibir una coleccion de modelos para poder recorrerla correctamente con `@foreach` y mostrar el atributo `idea` de cada registro.
- Para levantar el proyecto en la maquina virtual fue necesario usar `vagrant up` y luego entrar con `vagrant ssh`, ya que ese es el entorno donde corre la aplicacion.

### Comentarios personales
Este episodio ayudo a entender mejor la diferencia entre datos temporales y datos persistentes. El uso de modelos y migraciones hace que Laravel sea mas ordenado para trabajar con base de datos, y Eloquent simplifica mucho el acceso a la informacion.

## Apuntes para proximos episodios
Seguir agregando una seccion nueva por cada video, manteniendo el mismo formato: resumen, comandos, archivos, evidencia, problemas y comentarios.
